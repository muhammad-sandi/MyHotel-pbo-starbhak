<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasUmumController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::get();
        return view('fasilitasumum', compact('fasilitas'));
    }
}
