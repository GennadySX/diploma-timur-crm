<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //

    protected $fillable = [
      'user_f_id',
      'user_s_id',
      'chat'
    ];



}
