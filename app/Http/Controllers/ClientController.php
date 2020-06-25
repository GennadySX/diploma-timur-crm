<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        return $this->pager('client', 'Клиенты компании', false);
    }

     public function create(Request $request, Client $client)
    {
        return $client->fill($request->all())->save() ?
                $this->json(['client' => Client::where('id', $client->id)->first()], 200)
            : $this->json(['err' => 'Информация о клиенте не создана при неизвеной ошибки'], 200, false);

    }


    public function list()
    {
        return $this->json(['client'=> Client::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Client $client)
    {
        $dd = $client->where('id', $id)->delete();

      return  $dd ?
            back()
          : $this->json(['err' => 'Информация о клиенте не удалена при неизвестной ошибке'], 200, false);
    }
}
