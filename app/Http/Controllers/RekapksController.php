<?php

namespace App\Http\Controllers;

use App\Exports\KasSosialExport;
use App\Kasos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapksController extends Controller
{
    public function index()
    {
        $title = 'Rekap Kas Sosial';
        $data = Kasos::orderBy('tgl','asc')->get();
        return view('rekap_ks.index',compact('title','data'));
    }

    public function filter(Request $request)
    {
        $title = 'Rekap Kas Sosial';
        $dari = $request->dari;
        $sampai= $request->sampai;

        $data = Kasos::whereDate('tgl','>=',$dari)->whereDate('tgl','<=',$sampai)->orderBy('tgl','desc')->get();
        return view('rekap_ks.index',compact('title','data'));
    }

    public function export() 
    {
        return Excel::download(new KasSosialExport , 'Rekap_kas_sosial.xlsx');
    }
}
