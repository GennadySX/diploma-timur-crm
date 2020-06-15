<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //

    protected $fillable = ['file_id', 'model_id', 'model_morph'];
}
