<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $title = 'User';
        $data = Pengguna::find(Auth::id());
        return view('pengguna.index',compact('title','data'));
    }

    public function update (Request $request)
    {
        $data = Pengguna::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;
        $file = $request->file('photo');
        if($file){
            $file->move('profile', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }

        $data->save();

        \Session::flash('sukses','Data berhasil ubah');

        return redirect()->back();

    }

    public function updatepassword(Request $request)
    {
        $this->validate($request,[
            'oldpassword' =>'required',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

        $ubahPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $ubahPassword))
        {
                $user = Pengguna::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back();
        }
    }
}
