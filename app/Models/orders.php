<?php

use App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends model
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
        return $this->hasMany(Models\Process::class, 'ot', 'id');
    }
}
