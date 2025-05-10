<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = "entidad"; // Nombre de la tabla en la base de datos

    // datos que se pueden llenar
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];
}
