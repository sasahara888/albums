<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    public function edit($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // ユーザ編集ビューを表示
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 認証済みユーザのアルバムの場合は削除
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        // 更新した情報を取得しなおし
        $user = User::findOrFail($id);
        
        // 前のURLへリダイレクト
        return view('users.show', [
           'user' => $user, 
        ]);
    }
}
