<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
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

    public function filter(array $request){

        $result =  $this->leftJoin('users', 'clients.user_id', '=', 'users.id')
        ->select('users.name','clients.*')
        ->where(function ($query) use($request){
            if(isset($request['cpf']))
            {
                $query->Where('cpf', $request['cpf']);
            }
            if(isset($request['name']))
            {
                $query->Where('name', 'LIKE', '%'.$request['name'].'%');
            }
        })
        ->with('user','addresse')
        ->orderBy('name', 'asc')
        ->paginate(20);
        return $result;
    }
}
