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
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destory($id)
    {
        // idの値でアルバムを検索して取得
        $album = \App\Album::findOrFail($id);
        
        // 認証済みユーザのアルバムの場合は削除
        if (\Auth::id() == $album->user_id) {
            $album->delete();
        }
        
        // 前のURLへリダイレクト
        return back();
    }
}
