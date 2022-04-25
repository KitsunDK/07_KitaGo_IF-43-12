<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Refund;
use App\Models\Booking;

class RefundController extends Controller
{
    public function refund(Request $request, $id)
    {
        return view('kgweb.refund', [
            'title' => 'Refund Paket',
            'method' => 'POST',
            'action' => "kgweb/$id/refundBook",
            'idBook' => $request->idBook,
            'date' => date('d/m/Y'),
        ]);
    }

    public function refundBook(Request $request, $id)
    {
        Booking::destroy($id);
        $user = session('user');
        $data = new Refund;
            $data->idUser = $request->idUser;
            $data->dateRefund = date('Y-m-d');
            $data->alasan = $request->alasan;
        $data->save();
        $idUser = $user -> id;
        return view('kgweb.refundmsg');
    }
}
