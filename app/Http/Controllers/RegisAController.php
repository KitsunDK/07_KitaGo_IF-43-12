<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PenyediaJasa;

class RegisAController extends Controller
{
    public function index()
    {
        $data = PenyediaJasa::get();
        return view('kgweb.regisA', ['list' => $data]);
    }

    public function create()
    {
        error_log('Test.');
        return view('kgweb.regisA', [
            'title' => 'Registrasi Agen',
            'method' => 'POST',
            'action' => 'kgweb/loginA'
        ]);
    }

    public function store(Request $request)
    {
        if ($request -> usernameP == null || $request -> passwordP == null || $request -> nama_penyedia_jasa == null || $request -> emailP == null
        || $request -> alamat == null || $request -> telpNumbP == null) {
            return redirect('/kgweb/regisA')->with('msg', 'Silahkan isi data yang masih kosong');
        } else {
            $pjs = PenyediaJasa::get();
            foreach ($pjs as $p) {
                if ($p -> usernameP == $request -> usernameP) {
                    return redirect('/kgweb/regisA')->with('msg', 'Username sudah diambil!');
                } else if ($p -> emailP == $request -> emailP) {
                    return redirect('/kgweb/regisA')->with('msg', 'Email tersebut sudah terdaftar!');
                }
            }
            $data = new PenyediaJasa;
                $data->id = $request->id;
                $data->nama_penyedia_jasa = $request->nama_penyedia_jasa;
                $data->emailP = $request->emailP;
                $data->alamat = $request->alamat;
                $data->telpNumbP = $request->telpNumbP;
                $data->usernameP = $request->usernameP;
                $data->passwordP = Hash::make($request->passwordP);
            $data->save();
            return redirect('/kgweb/login');
        }
    }
}
