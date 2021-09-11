<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Client\StoreClientRequest;
use App\Http\Requests\Api\Client\UpdateClientRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request){

        if(substr($request->get('cep'),0 ,2) != 69){
            abort(403 ,'Cadastro somente para o Amazonas');
        }

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
        ]);
        $request['user_id']= $user->id;

        $client = Client::create($request->all());

        $client->setAddresse($request->all());

        return response()->json(null, 202);
    }

    public function show($id){

        $client = User::find($id)->client->load('addresse', 'user');
        $this->authorize('client', $client);
        return response()->json($client);
    }

    public function edit(Client $cliente){
        $cliente->load('addresse', 'user');
        $this->authorize('client', $cliente);
        return response()->json($cliente);
    }

    public function update(UpdateClientRequest $request, Client $cliente)
    {
        $this->authorize('client', $cliente);
        $cliente->update($request->all());
        $cliente->user->update($request->all());
        $cliente->addresse->update($request->all());

        return response()->json(null, 200);
    }
}
