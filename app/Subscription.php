<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //

    protected $fillable = [
        'start',
        'expired',
        'company_id',
        'tariff_id'
    ];
}
