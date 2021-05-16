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
}
