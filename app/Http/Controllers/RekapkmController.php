<?php

namespace App\Http\Controllers;

use App\Kas;
use App\Exports\KasMesjidExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapkmController extends Controller
{
    public function index()
    {
        $title = 'Rekap Data Kas Mesjid';
        $data = Kas::orderBy('tgl_masuk','asc')->get();
        return view('rekap_km.index',compact('title','data'));
    }

    public function filter(Request $request)
    {
        $title = 'Rekap Data Kas Mesjid';
        $dari = $request->dari;
        $sampai = $request->sampai;

        $data = Kas::whereDate('tgl_masuk','>=',$dari)->whereDate('tgl_masuk','<=',$sampai)->orderBy('tgl_masuk','desc')->get();
        return view('rekap_km.index',compact('data','title'));
    }

    public function export() 
    {
        return Excel::download(new KasMesjidExport , 'Rekap_kas_mesjid.xlsx');
    }
}
