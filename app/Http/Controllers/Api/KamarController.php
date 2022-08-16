<?php

namespace App\Http\Controllers\Api;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KamarResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get Kamars
        $kamars = Kamar::latest()->paginate(5);

        //return collection of kamars as a resource
        return new KamarResource(true, 'List Data Kamar', $kamars);
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
            'jumlah_kamar'   => 'required',
            'gambar_kamar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('gambar_kamar');
        $image->storeAs('public/kamars', $image->hashName());

        //create kamar
        $kamar = Kamar::create([
            'tipe'     => $request->tipe,
            'harga_kamar'    => $request->harga_kamar,
            'jumlah_kamar'   => $request->jumlah_kamar,
            'gambar_kamar'   => $image->hashName(),

        ]);

        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Ditambahkan!', $kamar);
    }

    /**
     * show
     *
     * @param  mixed $kamar
     * @return void
     */
    public function show(Kamar $kamar)
    {
        //return single kamar as a resource
        return new KamarResource(true, 'Data Kamar Ditemukan!', $kamar);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kamar
     * @return void
     */
    public function update(Request $request, Kamar $kamar)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe'     => 'required',
            'harga_kamar'    => 'required',
            'jumlah_kamar'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('gambar_kamar')) {

            //upload image
            $image = $request->file('gambar_kamar');
            $image->storeAs('public/kamars', $image->hashName());

            //delete old image
            Storage::delete('public/kamars/'.$kamar->image);

            //update kamar with new image
            $kamar->update([
                'tipe'     => $request->tipe,
                'harga_kamar'    => $request->harga_kamar,
                'jumlah_kamar'   => $request->jumlah_kamar,
                'gambar_kamar'   => $image->hashName(),
            ]);

        } else {

            //update kamar without image
            $kamar->update([
                'tipe'     => $request->tipe,
                'harga_kamar'    => $request->harga_kamar,
                'jumlah_kamar'   => $request->jumlah_kamar,
            ]);
        }

        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Diubah!', $kamar);
    }

    /**
     * destroy
     *
     * @param  mixed $kamar
     * @return void
     */
    public function destroy(Kamar $kamar)
    {
        //delete image
        Storage::delete('public/kamars'.$kamar->image);

        //delete kamar
        $kamar->delete();

        //return response
        return new KamarResource(true, 'Data Kamar Berhasil Dihapus!', null);
    }
}