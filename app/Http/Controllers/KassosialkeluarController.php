<?php

namespace App\Http\Controllers;

use App\Kasos;
use Illuminate\Http\Request;

class KassosialkeluarController extends Controller
{
    public function index()
    {
        $title = 'Data Kas Sosial';
        $data = Kasos::where('jenis',['keluar'])->get();
        return view('kas_sosial_keluar.index',compact('title','data'));
    }

    public function add()
    {
        $title = 'Tambah Data Pengeluaran Kas Sosial';
        return view('kas_sosial_keluar.add',compact('title'));
    }

    public function store(Request $request)
    {
        $data = new Kasos();
        $data->keluar = $request->keluar;
        $data->uraian = $request->uraian;
        $data->tgl = $request->tgl;
        $data->jenis = $request->jenis;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect('kas_sosial_keluar');
    }

    public function edit($id)
    {
        $title = 'Edit Pemasukan Kas Sosial';
        $dt = Kasos::find($id);
        return view('kas_sosial_keluar.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $data = Kasos::find($id);
        $data->keluar = $request->keluar;
        $data->uraian = $request->uraian;
        $data->tgl = $request->tgl;
        $data->jenis = $request->jenis;
        $data->save();

        \Session::flash('sukses','Data berhasil diubah');

        return redirect('kas_sosial_keluar');
    }

    public function delete($id)
    {
        Kasos::find($id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');

        return redirect()->back();
    }
}
