<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['user_id', 'company_id', 'role_id', 'department_id', 'password'];


    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
