<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function list()
    {
            return $this->json(['list' => Tasks::with('team')->get()]);
    }

    public function myTask ()
    {
        return $this->pager('task', 'Задачи', true);
    }

    public function income()
    {
        return $this->pager('report', 'Доходы', false);
    }

    public function expense()
    {
        return $this->pager('report', 'Расходы', false);
    }
}
