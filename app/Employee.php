<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['user_id', 'company_id', 'role_id', 'department_id'];


    public function role()
    {
        return $this->hasOne(Role::class, 'role_id');
    }

    public function company() {
        return $this->hasOne(Company::class, 'company_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'department_id');
    }


    public function user() {
        return $this->hasOne(User::class, 'user_id');
    }


}
