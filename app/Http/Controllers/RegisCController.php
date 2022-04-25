<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class RegisCController extends Controller
{
    public function index()
    {
        $data = Customer::get();
        return view('kgweb.regisC', ['list' => $data]);
    }

    public function create()
    {
        error_log('Test.');
        return view('kgweb.regisC', [
            'title' => 'Registrasi Traveller',
            'method' => 'POST',
            'action' => 'kgweb/loginC'
        ]);
    }

    public function store(Request $request)
    {
        if ($request -> usernameC == null || $request -> passwordC == null || $request -> nama_lengkap == null || $request -> emailC == null
        || $request -> birthDate == null || $request -> telpNumbC == null) {
            return redirect('/kgweb/regisC')->with('msg', 'Silahkan isi data yang masih kosong');
        } else {
            $customers = Customer::get();
            foreach ($customers as $c) {
                if ($c -> usernameC == $request -> usernameC) {
                    return redirect('/kgweb/regisC')->with('msg', 'Username tersebut sudah diambil!');
                } else if ($c -> emailC == $request -> emailC) {
                    return redirect('/kgweb/regisC')->with('msg', 'Email tersebut sudah terdaftar!');
                }
            }
            $data = new Customer;
                $data->id = $request->id;
                $data->nama_lengkap = $request->nama_lengkap;
                $data->emailC = $request->emailC;
                $data->birthDate = $request->birthDate;
                $data->telpNumbC = $request->telpNumbC;
                $data->usernameC = $request->usernameC;
                $data->passwordC = Hash::make($request->passwordC);
            $data->save();
            return redirect('/kgweb/login');
        }
    }
}
