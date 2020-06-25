<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
      'firstName',
      'lastName',
      'middleName',
      'avatar',
      'company',
      'phone',
      'description',
      'email'
    ];
}
