<?php

namespace App\Exports;

use App\Kas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KasMesjidExport implements FromView
{
    public function view(): View
    {
        return view('rekap_km.export', [
            'export' => Kas::all()
        ]);
    }
}
