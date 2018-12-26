<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marker extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'latitude', 'longitude', 'name', 'address'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
