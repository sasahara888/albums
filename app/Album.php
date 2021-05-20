<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name', 'date', 'memo'
    ];
    
    /**
     * このアルバムを所有するユーザ。
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このアルバムに関係するモデルの件数をロードする
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('albumitems');
    }
    
    /**
     * このアルバムが保持するアイテム
     */
    public function albumitems()
    {
        return $this->hasMany(AlbumItem::class);
    }
}
