<?php

namespace App\Exports;

use App\Models\inspections;
use App\Models\production;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class Calidad implements FromView, WithTitle
{
    public function view(): View
    {
        //  $ordenes = production::with('order')->get();

        // return view('modulos.exportaciones.calidad', [
        //     'ordenes' => production::all()
        // ]);


        $ordenes = inspections::with('order')->get();

        return view('modulos.exportaciones.calidad', [
            'ordenes' => $ordenes
        ]);
    }

    public function title(): string
    {
        return 'Calidad';
    }
}
