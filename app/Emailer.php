<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailer extends Model
{
    //

    protected $fillable = [
        'sender_id',
        'name',
        'email',
        'subject',
        'message',
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

}
