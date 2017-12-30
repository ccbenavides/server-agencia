<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'rubro',
        'telefono'
    ];
}
