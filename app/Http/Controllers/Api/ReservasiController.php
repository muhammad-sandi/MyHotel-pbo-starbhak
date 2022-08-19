<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReservasiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get Kamars
        $Reservasis = Reservasi::latest()->paginate(5);

        //return collection of kamars as a resource
        return new ReservasiResource(true, 'List Data Kamar', $Reservasis);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe'     => 'required',
            'harga_kamar'    => 'required',
            'name'    => 'required',
            'jumlah_kamar'   => 'required',
            'checkin'   => 'required',
            'checkout'   => 'required',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('gambar_kamar');
        // $image->storeAs('public/kamars', $image->hashName());

        //create kamar
        $Reservasi = Reservasi::create([
            'tipe'     => $request->tipe,
            'harga_kamar'    => $request->harga_kamar,
            'name'   =>$request->name,
            'jumlah_kamar'   => $request->jumlah_kamar,
            'checkin'   => $request->checkin,
            'checkout'   => $request->checkout,

        ]);

        //return response
        return new ReservasiResource(true, 'Data Kamar Berhasil Ditambahkan!', $Reservasi);
    }

    /**
     * show
     *
     * @param  mixed $kamar
     * @return void
     */
    public function show(Reservasi $Reservasi)
    {
        //return single kamar as a resource
        return new ReservasiResource(true, 'Data Kamar Ditemukan!', $Reservasi);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kamar
     * @return void
     */
    public function update(Request $request, Reservasi $Reservasi)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe'     => 'required',
            'harga_kamar'    => 'required',
            'name'    => 'required',
            'jumlah_kamar'   => 'required',
            'checkin'   => 'required',
            'checkout'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('gambar_kamar')) {

            // //upload image
            // $image = $request->file('gambar_kamar');
            // $image->storeAs('public/kamars', $image->hashName());

            // //delete old image
            // Storage::delete('public/kamars/'.$kamar->image);

            //update kamar with new image
            // $kamar->update([
            //     'tipe'     => $request->tipe,
            //     'harga_kamar'    => $request->harga_kamar,
            //     'name'   =>$request->name,
            //     'jumlah_kamar'   => $request->jumlah_kamar,
            //     'checkin'   => $request->checkin,
            //     'checkout'   => $request->checkout,
            // ]);

        } else {

            //update kamar without image
            $Reservasi->update([
                'tipe'     => $request->tipe,
                'harga_kamar'    => $request->harga_kamar,
                'name'   =>$request->name,
                'jumlah_kamar'   => $request->jumlah_kamar,
                'checkin'   => $request->checkin,
                'checkout'   => $request->checkout,
            ]);
        }

        //return response
        return new ReservasiResource(true, 'Data Kamar Berhasil Diubah!', $Reservasi);
    }

    /**
     * destroy
     *
     * @param  mixed $kamar
     * @return void
     */
    public function destroy(Reservasi $Reservasi)
    {
        // //delete image
        // Storage::delete('public/reservasi'.$kamar->image);

        //delete kamar
        $Reservasi->delete();

        //return response
        return new ReservasiResource(true, 'Data Kamar Berhasil Dihapus!', null);
    }
}