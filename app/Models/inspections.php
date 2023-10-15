<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspections extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(orders::class, 'ot', 'id');
    }
}
