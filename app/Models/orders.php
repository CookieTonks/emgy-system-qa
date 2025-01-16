<?php

use App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class orders extends Model
{
    use HasFactory;

    // En el modelo Order
    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'empresa', 'id');
    }

    public function Procesos()
    {
        return $this->hasMany(Models\Process::class, 'ot', 'id');
    }
}
