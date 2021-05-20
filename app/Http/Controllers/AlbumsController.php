<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            
            $albums = $user->albums()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'albums' => $albums,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function create()
    {
        $album = new \App\Album;
        
        // アルバム作成ビューを表示
        return view('albums.create', [
            'album' => $album,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
           'name' => 'required|max:100',
           'date' => 'required',
           'memo' => 'max:255',
        ]);
        
        // 認証済みユーザのアルバムとして作成
        $request->user()->albums()->create([
           'name' => $request->name,
           'date' => $request->date,
           'memo' => $request->memo,
        ]);
        
        return redirect('/');
    }
    
    public function show($id)
    {
        // idの値でアルバムを検索して取得
        $album = \App\Album::findOrFail($id);
        
        // アルバムに含まれるアイテムを取得
        $albumItems = $album->albumitems()->orderBy('created_at', 'asc')->paginate(10);
        
        // アルバム詳細ビューを表示
        return view('albums.show', [
           'album' => $album, 
           'albumitems' => $albumItems,
        ]);
    }
    
    public function edit($id)
    {
        // idの値でアルバムを検索して取得
        $album = \App\Album::findOrFail($id);
        
        // メッセージ編集ビューを表示
        return view('albums.edit', [
            'album' => $album,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // idの値でアルバムを検索して取得
        $album = \App\Album::findOrFail($id);
        
        // 認証済みユーザのアルバムの場合は削除
        if (\Auth::id() == $album->user_id) {
            $album->name = $request->name;
            $album->date = $request->date;
            $album->memo = $request->memo;
            
            $album->save();
        }
        
        // 前のURLへリダイレクト
        return view('albums.show', [
           'album' => $album, 
        ]);
    }
    
    public function destroy($id)
    {
        // idの値でアルバムを検索して取得
        $album = \App\Album::findOrFail($id);
        
        // 認証済みユーザのアルバムの場合は削除
        if (\Auth::id() == $album->user_id) {
            $album->delete();
        }
        
        // 前のURLへリダイレクト
        return redirect('/');
    }
}
