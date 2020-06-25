<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Profiler;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */


    public function homedata()
    {
        return $this->json(['homedata' => 'isDataHome']);
    }


    public function index()
    {
        return $this->pager( 'profile', 'Главная', true);
    }

    public function about() {
        return $this->pager('about', 'Информация по работе', false);
    }

}
