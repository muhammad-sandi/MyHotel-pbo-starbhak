@extends('layout.navbar')

@section('navbar')

<section class="container pt-5 d-flex">
    @foreach($kamars as $kamar)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ $kamar->gambar_kamar }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $kamar->tipe }}</h5>
          <p class="card-text">Rp. {{ number_format($kamar->harga_kamar) }}</p>
        </div>
    </div>
    @endforeach
</section>

@endsection