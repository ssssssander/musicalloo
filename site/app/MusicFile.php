<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusicFile extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['music_set_id', 'path'];

    public function musicSet() {
        return $this->belongsTo('App\MusicSet');
    }
}
