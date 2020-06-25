<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function chat()
    {
        return $this->pager('email', 'Чат', false);
    }


    public function help() {
        return $this->pager('help', 'Техническая поддержка', false);
    }
}
