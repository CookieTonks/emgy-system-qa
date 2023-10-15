<?php

namespace App\Exports;

use App\Models\dibujos;
use App\Models\orders;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Ingenieria implements FromView, WithTitle
{
    public function view(): View
    {
        return view('modulos.exportaciones.ingenieria', [
            'ingenierias' => dibujos::all()
        ]);
    }

    public function title(): string
    {
        return 'Ingenieria';
    }
}
