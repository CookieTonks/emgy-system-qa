<?php

namespace App\Exports;

use App\Models\production;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Produccion implements FromView, WithTitle
{
    public function view(): View
    {
        return view('modulos.exportaciones.production', [
            'Produccion' => production::all()
        ]);
    }

    public function title(): string
    {
        return 'PRODUCCION';
    }
}
