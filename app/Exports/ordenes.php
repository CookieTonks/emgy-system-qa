<?php

namespace App\Exports;

use App\Models\orders;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Ordenes implements FromView, WithTitle
{
    public function view(): View
    {
        return view('modulos.exportaciones.ordenes', [
            'Ordenes' => orders::all()
        ]);
    }

    public function title(): string
    {
        return 'Ordenes';
    }
}
