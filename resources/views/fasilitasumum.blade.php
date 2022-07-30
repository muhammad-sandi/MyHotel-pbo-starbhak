@extends('layout.navbar')

@section('navbar')

<section class="container d-flex pt-5">
    @foreach($fasilitas as $fs)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ $fs->gambar_fasilitas }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $fs->nama_fasilitas }}</h5>
          <p class="card-text">{{ $fs->keterangan }}</p>
        </div>
    </div>
    @endforeach
</section>

@endsection