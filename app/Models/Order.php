<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relación con Empresas
    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'empresa', 'id');
    }

    // Relación con Procesos
    public function procesos()
    {
        return $this->hasMany(Process::class, 'ot', 'id');
    }
}
