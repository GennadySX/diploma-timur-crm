<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function update(Request $request, User $user)
    {
        return $user->update($request->all()) ?
            $this->json(['updated' => true, 'mess' => 'Данные пользователя обновились!' ], 202)
            : $this->json(['updated' => false, 'mess' => 'Данные не соответсвуют для обновления!' ], 204) ;
    }

}
