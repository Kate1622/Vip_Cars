<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ='cliente';
    protected $primaryKey='idCliente';
    public $timestamps= false;
    protected $fillable=[
        'nombre',
        'apellidos',
        'numeroDocumento',
        'telefono',
        'email'
    ];
    protected $guarded=[];
}
