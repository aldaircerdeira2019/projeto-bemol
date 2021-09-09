<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Client\StoreClientRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request){

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
}
