<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    // En el modelo Usuario
    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente', 'id'); // 'cliente' es el nombre del campo en usuarios y 'id' es el campo de cliente
    }
}
