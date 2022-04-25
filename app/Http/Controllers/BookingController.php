<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function book(Request $request, $id)
    {
        $dataB = Booking::get();
        foreach ($dataB as $d) {
            if ($d -> idCustomer == $request -> idCustomer && $d -> idPaket == $request -> idPaket){
                return redirect("/kgweb/paket/$id/viewPaket")->with('msg', "You have already booked this package!");
            }
        }
        $data = new Booking;
            $data->idCustomer = $request->idCustomer;
            $data->idPaket = $request->idPaket;
            $data->tanggalBooking = date('d/m/Y');
        return view('kgweb.booking', [
            'title' => 'Booking Paket',
            'method' => 'POST',
            'action' => "kgweb/$id/booking",
            'data' => $data,
        ]);
    }

    public function booking(Request $request, $id)
    {
        $data = new Booking;
            $data->idCustomer = $request->idCustomer;
            $data->idPaket = $request->idPaket;
            $data->tanggalBooking = date('Y-m-d');
        $data->save();
        return view('kgweb.paymentmsg');
    }
}
