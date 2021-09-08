<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'birth',
        'phone',
        'user_id'
    ];

    public function addresse() : HasOne
    {
        return $this->hasOne(Addresse::class);
    }

    public function setBirthAttribute($value) {
        $date = str_replace("/", "-", $value);
        $this->attributes['birth'] = date('Y-m-d', strtotime($date));
    }

    public function setAddresse(array $address) : void
    {
        $this->addresse()->delete();
        $this->addresse()->create($address);
    }
}
