<?php

namespace App\Http\Controllers\Api\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

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
}