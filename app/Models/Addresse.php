<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'complemento',
        'numero',
        'localidade',
        'uf',
        'client_id'
    ];
}
