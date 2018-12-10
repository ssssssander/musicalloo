<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusicSet extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'name'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function musicFile() {
        return $this->hasMany('App\MusicFile');
    }
}
