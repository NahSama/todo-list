<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function userSend() {
        return $this->belongsTo('App\User', 'user_id_from', 'id');
    }

    public function userGet(){
        return $this->belongsTo('App\User', 'user_id_to', 'id');
    }
}
