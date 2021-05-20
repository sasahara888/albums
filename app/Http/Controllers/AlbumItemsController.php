<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class AlbumItemsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::user()) {
            
            $album = \App\Album::findOrFail(request('album'));
            
            $albumitems = $album->$albumitem()->orderBy('created_at', 'desc')->paginate(10);
            
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
        
        $albumitem = new \App\AlbumItem;
        $albumitem->album_id = $request->album_id;
        $albumitem->file_path = $request->file_path;
        $albumitem->memo = $request->memo;
        $albumitem->save();

        return view('albums.show', [
            'album' => $albumitem->album,
        ]);
    }
}
