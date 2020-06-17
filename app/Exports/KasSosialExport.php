<?php

namespace App\Exports;

use App\Kasos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KasSosialExport implements FromView
{
    public function view(): View
    {
        return view('rekap_ks.export', [
            'export' => Kasos::all()
        ]);
    }
}
