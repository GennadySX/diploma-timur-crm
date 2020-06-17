<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
        public function __construct()
        {
            $this->middleware('auth');
        }

    public function update(Request $request, User $user)
    {
        return $user->update($request->all()) ?
            $this->json(['updated' => true, 'mess' => 'Данные пользователя обновились!' ], 202)
            : $this->json(['updated' => false, 'mess' => 'Данные не соответсвуют для обновления!' ], 204) ;
    }


    public function profile()
    {
        return $this->pager( 'profile', 'Профиль', true);

    }


    public function get()
    {
        return $this->json(['user' => Auth::user()]);
    }



    public function updateAvatar(Request $request, User $user)
    {
        if($request->hasFile('avatar')) {
            $filename = '/uploads/'.md5(Carbon::now()).'.jpg';
            Image::make($request->file('avatar'))
                ->save(public_path($filename));
            return
                ($user::where('id', Auth::id())->update(['avatar'=>$filename]))?
                    response()->json(['status'=>true, 'img' => $filename])
                    :response()->json(['status'=>false, 'mess'=> 'Что то пошло не так']);
        }
        return response()->json(['status'=>false, 'mess'=> 'Не найдена картинка!']);
    }



}
