<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        //
    }

    public function employees ()
    {
        return $this->pager('employee', 'Сотрудники', false);
    }

    public function manager ()
    {
        return $this->pager('employee', 'Менеджеры', false);
    }

    public function list()
    {
        return $this->json(['list' => Employee::with('user','role', 'company','department')->take(3)->get()]);
    }


}
