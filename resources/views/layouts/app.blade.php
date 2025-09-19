<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>@yield('title','Admin')</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f5f7f9; }
    .sidebar {
      width: 260px;
      min-height: 100vh;
      position: fixed;
      left: 0; top: 0; padding-top: 24px;
      background: #081229; color: #fff;
    }
    .sidebar .brand { padding: 12px 20px; font-size: 22px; font-weight:700; }
    .sidebar a { color: #dfe8f0; text-decoration: none; display:block; padding:12px 20px; }
    .sidebar a:hover { background: rgba(255,255,255,0.03); color: #fff; }
    .content { margin-left: 260px; padding: 32px; }
    .nav-icon { width: 20px; display:inline-block; margin-right:10px; }
  </style>
</head>
<body>

  @if(session('admin'))
    <div class="sidebar">
      <div class="text-center p-3">
    <img src="{{ asset('images/vanvaso.jpg') }}" 
         alt="Vanvaso Logo" 
         class="img-fluid rounded-circle mb-2" 
         style="max-width: 80px;">
    <h5 class="fw-bold m-0">VANVASO</h5>
    <small class="text-bold">Eco Living Resort</small>
    </div>

        <a href="{{ url('/dashboard') }}">🏠 Dashboard</a>
        <a href="{{ url('/rooms') }}">🛏️ Room Management</a>
        <a href="{{ url('/bookings') }}">📖 Booking Management</a>
        <a href="{{ url('/users') }}">👥 Users</a>
        <a href="{{ url('/services') }}">🛎️ Services</a>
        <a href="{{ url('/payments') }}">💳 Payments</a>
        <a href="{{ url('/reports') }}">📊 Reviews</a>
        <div style="position:absolute;bottom:20px;width:100%;padding-left:20px;">
            <a href="{{ url('/logout') }}" class="text-danger">Logout</a>
        </div>
        </div>
    @endif

  <div class="content">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
