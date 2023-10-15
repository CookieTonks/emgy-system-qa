<?php

namespace App\Exports;

use App\Models\inspections;
use App\Models\materiales;
use App\Models\production;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Compras implements FromView, WithTitle
{
    public function view(): View
    {


        $materiales = materiales::all();

        return view('modulos.exportaciones.compras', [
            'materiales' => $materiales
        ]);
    }

    public function title(): string
    {
        return 'Materiales';
    }
}
