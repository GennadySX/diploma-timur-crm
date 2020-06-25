<?php

namespace App\Http\Controllers;

use App\Emailer;
use App\Mail\Mailer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function list() {
        return $this->json(['list' => Emailer::where('sender_id', Auth::id())->with('user')->orderBy('created_at', 'desc')->get()]);
    }


    public function create(Request $request, Emailer $emailer)
    {
        if ($emailer->fill([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'sender_id' => Auth::id(),
            ])->save() && $emailer->id) {
            Mail::send(new Mailer($request->message, $request->subject, $request->email));
            return $this->json(['send' => true, 'email' => Emailer::where('id', $emailer->id)->first()]);
        }
        return  $this->json(['err' => 'email not sent'], 204, false);
    }


}
