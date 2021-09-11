<?php

namespace App\Http\Controllers\Api\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Http\Requests\Api\Admin\StoreClientRequest;
use App\Http\Requests\Api\Admin\UpdateClientRequest;
use Illuminate\Support\Facades\Hash;

class AdminClientsController extends Controller
{
    public function __construct(){
        $this->middleware('role:Administrador');
    }

    public function index(Request $params, Client $client){
        $clients = $client->filter($params->all());
        return response()->json($clients);
    }

    public function show(Client $client){
        $client->load('addresse', 'user');
        return response()->json($client);
    }

    public function destroy(Client $client){
        $user = $client->user;
        $client->delete();
        $user->delete();
        return response()->json(null, 200);
    }

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

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());
        $client->user->update($request->all());
        $client->addresse->update($request->all());

        return response()->json(null, 200);
    }
}
