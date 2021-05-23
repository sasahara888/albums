<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Storage;

class AlbumItemsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::user()) {
            
            $album = \App\Album::findOrFail(request('album'));
            
            $albumitems = $album->$albumitem()->orderBy('created_at', 'desc')->paginate(9);
            
            $data = [
                'album' => $album,
                'albumitems' => $albumitems,
            ];
        }
    }
    
    public function create()
    {
        $albumitem = new \App\AlbumItem;
        
        $albumitem->album_id = request('album');
        
        // アイテムビューを表示
        return view('albumitems.create', [
            'albumitem' => $albumitem,
        ]);
        
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
           'memo' => 'max:255', 
        ]);
        
        // 拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("cover_image")->getClientOriginalName();
        
        // ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        // 拡張子を取得
        $extension = $request->file("cover_image")->getClientOriginalExtension();
        
        // 保存のファイル名を構築
        $filenameToStore = $filename."_".time().".".$extension;
        
        $path = $request->file("cover_image")->storeAs("public/album_covers", $filenameToStore);
        
        $albumitem = new \App\AlbumItem;
        $albumitem->album_id = $request->album_id;
        $albumitem->file_path = $filenameToStore;
        $albumitem->memo = $request->memo;
        $albumitem->save();

        // アルバムに含まれるアイテムを取得
        $album = \App\Album::findOrFail($albumitem->album_id);
        $albumitems = $album->albumitems()->orderBy('created_at', 'asc')->paginate(9);
        
        return view('albums.show', [
            'album' => $album,
            'albumitems' => $albumitems,
        ]);
    }
    
    public function destroy($id)
    {
        // idの値でアルバムを検索して取得
        $albumitem = \App\AlbumItem::findOrFail($id);
        
        Storage::delete('public/album_covers/' .$albumitem->file_path);
        
        $albumitem->delete();
        
        // アルバムに含まれるアイテムを取得
        $album = \App\Album::findOrFail($albumitem->album_id);
        $albumitems = $album->albumitems()->orderBy('created_at', 'asc')->paginate(9);
        
        return view('albums.show', [
            'album' => $album,
            'albumitems' => $albumitems,
        ]);
    }
}
