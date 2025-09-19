<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>@yield('title','Admin')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body, html { height: 100%; margin: 0; }

    /* Background Slider */
    .bg-slider {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }
    .bg-slider img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .bg-slider img.active {
      opacity: 1;
    }

    .content {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body>
  <!-- Background Slider -->
  <div class="bg-slider">
    <img src="{{ asset('storage/vanvaso1.webp') }}" class="active">
    <img src="{{ asset('storage/vanvaso2') }}">
    <img src="{{ asset('storage/vanvaso3.jpg') }}">
  </div>

  <div class="content">
    @yield('content')
  </div>

  <script>
    let images = document.querySelectorAll('.bg-slider img');
    let i = 0;
    setInterval(() => {
      images[i].classList.remove('active');
      i = (i + 1) % images.length;
      images[i].classList.add('active');
    }, 2000);
  </script>
</body>
</html>
