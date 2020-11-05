<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $fillable = ['content', 'perlki_id', "user_id"];
    public function perelki()
    {
        return $this->belongsTo('App\perlki');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }

}
