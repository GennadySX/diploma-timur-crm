<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    //

    protected $fillable = [
        'company_id',
        'creator_id',
        'department_id',
        'task_id',
        'task_status',
        'description',
        'executor_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

}
