<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Paket;
use App\Models\Penginapan;
use App\Models\Wisata;
use App\Models\Rating;

class PaketController extends Controller
{
    public function index()
    {
        $data = Paket::get();
        return view('kgweb.paket', ['list' => $data]);
    }

    public function createPaket()
    {
        return view('kgweb.paket', [
            'title' => 'Create Package',
            'method' => 'POST',
            'action' => 'kgweb/paket/inputPaket'
        ]);
    }

    public function inputPaket(Request $request)
    {
        if ($request -> namaPaket == null || $request -> harga == null || $request -> idPenginapan == null || $request -> idWisata == null) {
            return redirect('/kgweb/paket/createPaket')->with('msg', 'Silahkan isi data yang masih kosong');
        } else {
            if ($request -> deskripsi == null) {
                $request -> deskripsi = "";
            }
            $data = new Paket;
                $data->id = $request->id;
                $data->deskripsi = $request->deskripsi;
                $data->namaPaket = $request->namaPaket;
                $data->harga = $request->harga;
                $data->idPenginapan = $request->idPenginapan;
                $data->idWisata = $request->idWisata;
                $data->idJasa = $request->idJasa;
            $data->save();
            $paket = Paket::get();
            Session::put('paket', $paket);
            return redirect('/kgweb');
        }
    }

    public function editPaket($id)
    {
        return view('kgweb.paket', [
            'title' => 'Edit Package',
            'method' => 'PUT',
            'action' => "kgweb/paket/$id/updatePaket",
            'data' => Paket::find($id)
        ]);  
    }

    public function updatePaket(Request $request, $id)
    {
        if ($request -> namaPaket == null || $request -> harga == null || $request -> idPenginapan == null || $request -> idWisata == null) {
            return redirect("/kgweb/paket/$id/editPaket")->with('msg', 'Silahkan isi data yang masih kosong');
        } else {
            if ($request -> deskripsi == null) {
                $request -> deskripsi = "";
            }
            $data = Paket::find($id);
                $data->id = $request->id;
                $data->deskripsi = $request->deskripsi;
                $data->namaPaket = $request->namaPaket;
                $data->harga = $request->harga;
                $data->idPenginapan = $request->idPenginapan;
                $data->idWisata = $request->idWisata;
                $data->idJasa = $request->idJasa;
            $data->save();
            $paket = Paket::get();
            Session::put('paket', $paket);
            return redirect('/kgweb');
        }
    }

    public function deletePaket($id)
    {
        $ratings = Rating::get();
        foreach ($ratings as $r) {
            if ($r -> idPaket == $id) {
                Rating::destroy($r -> id);
            }
        }
        Paket::destroy($id);
        $paket = Paket::get();
        $rating = Rating::get();
        Session::put('rating', $rating);
        Session::put('paket', $paket);
        return redirect('/kgweb');
    }

    public function viewPaket($id)
    {
        $paket = Paket::find($id);
        $wisata = Wisata::get();
        $penginapan = Penginapan::get();
        return view('kgweb.viewpaket', ['wisatas' => $wisata, 'penginapans' => $penginapan, 'paket' => $paket]);
    }
}
