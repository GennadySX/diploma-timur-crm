<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    //
    protected $fillable = [
        'name',
        'cost',
        'description',
        'permissions'
    ];
}
