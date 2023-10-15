<?php

namespace App\Exports;

use App\Models\salidas_embarques;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Embarques implements FromView, WithTitle
{
    public function view(): View
    {
        return view('modulos.exportaciones.embarques', [
            'embarques' => salidas_embarques::all()
        ]);
    }

    public function title(): string
    {
        return 'embarques';
    }
}
