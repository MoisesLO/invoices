<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

  protected $fillable = [
    'codigo', 'nombre'
  ];

  public function productos()
  {
    return $this->hasMany(Producto::class);
  }
}
