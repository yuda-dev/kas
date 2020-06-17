<?php

namespace App\Http\Controllers;

use App\Kasos;
use Illuminate\Http\Request;

class KassosialmasukController extends Controller
{
    public function index()
    {
        $title = 'Data Kas Sosial';
        $data = Kasos::where('jenis',['masuk'])->get();
        return view('kas_sosial_masuk.index',compact('title','data'));
    }

    public function add()
    {
        $title = 'Tambah Data Kas Sosial';
        return view('kas_sosial_masuk.add',compact('title'));
    }

    public function store(Request $request)
    {
        $data = new Kasos();
        $data->masuk = $request->masuk;
        $data->uraian = $request->uraian;
        $data->tgl = $request->tgl;
        $data->jenis = $request->jenis;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect('kas_sosial_masuk');
    }

    public function edit($id)
    {
        $title = 'Edit Pemasukan Kas Sosial';
        $dt = Kasos::find($id);
        return view('kas_sosial_masuk.edit',compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $data = Kasos::find($id);
        $data->masuk = $request->masuk;
        $data->uraian = $request->uraian;
        $data->tgl = $request->tgl;
        $data->jenis = $request->jenis;
        $data->save();

        \Session::flash('sukses','Data berhasil diubah');

        return redirect('kas_sosial_masuk');
    }

    public function delete($id)
    {
        Kasos::find($id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');

        return redirect()->back();
    }
}
