<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    public function user() {
        return $this->belongsTo('App\user','user_id','id');
    }
}
