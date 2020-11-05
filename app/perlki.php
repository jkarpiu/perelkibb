<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perlki extends Model
{
    protected $fillable = ['name', 'desc', 'image', 'street', 'score', 'active', "user_id"];
    public function comments() {
        return $this->hasMany('App\comments');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
