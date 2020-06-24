<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $fillable = [
        'user_id',
        'model_type',
        'model_id',
        'type',
        'status',
        'name',
        'path',
    ];
}
