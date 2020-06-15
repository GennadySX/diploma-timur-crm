<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    protected $fillable = [
        'ceo_id',
        'name',
        'description',
        'image_id',
    ];


    public function avatar()
    {
        return $this->hasOne(Files::class, 'image_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class,'ceo_id');
    }




}







