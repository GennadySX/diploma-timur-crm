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
    ];


    public function team()
    {
            return $this->hasMany(UserTask::class, 'task_id', 'id')->with('user');
    }
}
