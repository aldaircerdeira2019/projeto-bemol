<?php

namespace App\Http\Controllers\Admin\Client;

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
}
