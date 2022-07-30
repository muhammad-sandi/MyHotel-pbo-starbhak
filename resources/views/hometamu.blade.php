@extends('layout.navbar')

@section('navbar')

<!-- Hero Image -->
<section id="hero">
    <div class="container">
      <div class="row">

        <!-- Col Text -->
        <div class="col-md-6 mt-5">
          <h2 class="fw-bold display-3 text-primary">Fresh, quiet<br>and peaceful</h2>
          <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque <br> doloremque beatae ex accusantium at voluptatum eum, provident consectetur corrupti blanditiis est ipsa fugiat sequi numquam <br> debitis odio molestiae dolorem.</p>
          <button type="button" class="btn btn-transparent border border-white text-white">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>Join Now</button>
        </div>
        <!-- Col Image -->
        <div class="col-md-6 mt-5">
          <img src="https://images.unsplash.com/photo-1574643156929-51fa098b0394?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" class="img-fluid ms-5 rounded-top">
        </div>
      </div>
    </div>
  </section>
  <section class="container pt-5">
    <form action="/pesankamar" method="POST">
        @csrf
        @method('POST')
        <div class="d-flex justify-content-between gap-4">
            <div class="form-group w-100">
                <label for="exampleInputEmail1">Checkin</label>
                <input type="date" class="form-control" name="checkin">
            </div>
            <div class="form-group w-100">
                <label for="exampleInputPassword1">Checkout</label>
                <input type="date" class="form-control"  name="checkout">
            </div>
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Jumlah Kamar</label>
            <input type="text" class="form-control" name="pilihjumlahkamar">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">No Handphone</label>
            <input type="text" class="form-control" name="nohandphone">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Nama Tamu</label>
            <input type="text" class="form-control" name="namatamu">
        </div>
        <div class="form-group mt-4">
            <label for="exampleInputPassword1">Tipe Kamar</label>
            <input type="text" class="form-control" name="tipekamar">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
  </section>

@endsection