<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    protected $fillable = [
        'name',
        'cost',
        'priority',
        'status',
        'expire_date',
        'description',
        'creator_id'
    ];


    public function team()
    {
            return $this->hasMany(UserTask::class, 'task_id', 'id')->with('user');
    }


    public function file()
    {
        return $this->morphMany(Files::class, 'model');
    }

}
