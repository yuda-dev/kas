<?php

namespace App\Http\Controllers;

use App\Kas;
use Illuminate\Http\Request;

class KasmesjidmasukController extends Controller
{
    public function index()
    {
        $title = 'Data Kas Mesjid';
        $data = Kas::where('jenis',['masuk'])->get();
        return view('kas_mesjid_masuk.index',compact('title','data'));
    }

    public function add()
    {
        $title = 'Data Kas Mesjid';
        return view('kas_mesjid_masuk.add',compact('title'));
    }

    public function store(Request $request)
    {
        $data = new Kas();
        $data->uraian = $request->uraian;
        $data->masuk = $request->masuk;
        $data->jenis = $request->jenis;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect('kas_mesjid_masuk');
    }

    public function edit($id)
    {
        $title = 'Edit Data Pemasukan Kas mesjid';
        $dt = Kas::find($id);
        return view('kas_mesjid_masuk.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $data = Kas::find($id);
        $data->uraian = $request->uraian;
        $data->masuk = $request->masuk;
        $data->jenis = $request->jenis;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->save();

        \Session::flash('sukses','Data berhasil diubah');

        return redirect('kas_mesjid_masuk');
    }

    public function delete($id)
    {
        Kas::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect('kas_mesjid_masuk');
    }
}
