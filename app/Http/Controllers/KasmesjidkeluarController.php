<?php

namespace App\Http\Controllers;

use App\Kas;
use Illuminate\Http\Request;

class KasmesjidkeluarController extends Controller
{
    public function index()
    {
        $title = 'Data Pengeluaran Kas Mesjid';
        $data = Kas::where('jenis',['keluar'])->get();
        return view('kas_mesjid_keluar.index',compact('title','data'));
    }

    public function add()
    {
        $title = 'Data Pengeluaran Kas Mesjid';
        return view('kas_mesjid_keluar.add',compact('title'));
    }

    public function store(Request $request)
    {
        $data = new Kas();
        $data->uraian = $request->uraian;
        $data->keluar = $request->keluar;
        $data->jenis = $request->jenis;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect('kas_mesjid_keluar');
    }

    public function edit($id)
    {
        $title = 'Edit Data Pemasukan Kas mesjid';
        $dt = Kas::find($id);
        return view('kas_mesjid_keluar.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $data = Kas::find($id);
        $data->uraian = $request->uraian;
        $data->masuk = $request->keluar;
        $data->jenis = $request->jenis;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->save();

        \Session::flash('sukses','Data berhasil diubah');

        return redirect('kas_mesjid_keluar');
    }

    public function delete($id)
    {
        Kas::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect('kas_mesjid_keluar');
    }
}
