<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumItem extends Model
{
    protected $fillable = ['file_path', 'memo'];
    
    /**
     * このアイテムを保持するアルバム
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
