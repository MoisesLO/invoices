<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['ruc', 'razon_social'];

    public function users(){
        return $this->hasMany(User::class);
    }
    //
}
