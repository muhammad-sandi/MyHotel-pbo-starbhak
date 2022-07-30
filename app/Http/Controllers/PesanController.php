<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function pesan(Request $req)
    {
        $req->validate([
            'checkin' => 'required',
            'checkout' => 'required',
            'pilihjumlahkamar' => 'required',
            'nohandphone' => 'required',
            'namatamu' => 'required',
            'tipekamar' => 'required',
        ]);

        $kamar = Kamar::where('id', $req->kamar)->first();
        if($req->pilihjumlahkamar > $kamar->jumlahkamar){
            // 
        } else {
            Reservasi::create([
                'checkin' => $req->checkin,
                'checkout' => $req->checkout,
                'jumlahkamar' => $req->pilihjumlahkamar,
                'nohandphone' => $req->nohandphone,
                'namatamu' => $req->namatamu,
                'tipekamar' => $req->tipekamar,
            ]);
        }
    }
}
