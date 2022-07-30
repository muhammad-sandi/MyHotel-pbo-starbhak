<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="#">My<span class="text-primary">Hotel</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active fw-semibold" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="/kamar">Kamar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="/fasilitasumum">Fasilitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="/home">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  </body>
</html>

@yield('navbar')