<?php

namespace App\Exports;

use App\Models\orders;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Facturacion implements FromView, WithTitle
{
    public function view(): View
    {
        return view('modulos.exportaciones.ordenes', [
            'Ordenes' => Orders::where('estatus', '=', 'FACTURADA')->get()
        ]);
    }

    public function title(): string
    {
        return 'Facturacion';
    }
}
