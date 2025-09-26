<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanvaso Hotel</title>
    <link rel="icon" type="image/png" href="images/vanvaso.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="manifest" href="manifest.json">

    <style>

        {
            "name": "Vanvaso Hotel",
            "short_name": "Vanvaso",
            "start_url": "/",
            "display": "standalone",
            "background_color": "#ffffff",
            "theme_color": "#000000",
            "icons": [
                {
                "src": "images/favicon.png",
                "sizes": "192x192",
                "type": "image/png"
                },
                {
                "src": "images/favicon.png",
                "sizes": "512x512",
                "type": "image/png"
                }
            ]
            }

        /* Navbar */
        .navbar {
            background-color: rgba(0,0,0,0.3);
        }


        /* Hero Section */
        .hero {
            position: relative;
            background-image: url('images/hero1.png'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .hero::before {
            content: "";
            position: absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
            z-index:1;
        }
        .hero-content {
            position: relative;
            z-index:2;
            text-align: center;
        }

        .cta-button {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }

        /* Featured Rooms */
        .property-card {
            position: relative;
            background-size: cover;
            background-position: center;
            height: 300px;
            color: white;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .property-card::before {
            content:"";
            position:absolute;
            top:0; left:0; width:100%; height:100%;
            background: rgba(0,0,0,0.4);
        }
        .property-card h3, .property-card a {
            position: absolute;
            z-index:2;
            left: 15px;
        }
        .property-card h3 { bottom: 50px; }
        .property-card a { bottom: 15px; background-color: #28a745; padding: 5px 15px; border-radius: 5px; color:white; text-decoration:none; }

        /* Amenities */
        .amenities i { font-size: 2.5rem; color: #007bff; }

        /* Testimonials */
        .testimonial-card { padding: 20px; border-radius: 10px; background-color: #f8f9fa; }
        .testimonial-card img { width:50px; height:50px; object-fit:cover; }

        /* Footer */
        footer { background-color:#222; color:white; padding:20px 0; text-align:center; }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Vanvaso</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#amenities">Amenities</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Slider -->
<section id="hero" class="position-relative">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner" style="height:100vh;">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <img src="images/hero1.png" class="d-block w-100" style="height:100vh; object-fit:cover;" alt="Slide 1">
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <img src="images/hero2.png" class="d-block w-100" style="height:100vh; object-fit:cover;" alt="Slide 2">
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <img src="images/hero3.png" class="d-block w-100" style="height:100vh; object-fit:cover;" alt="Slide 3">
      </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Keep your hero text intact -->
  <div class="hero-content position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index:2;">
      <h1 class="display-4">Welcome to Vanvaso</h1>
      <p class="lead">Luxury • Comfort • Memorable Stays</p>
      <a href="{{ route('bookings.create') }}" class="cta-button">Book Your Room</a>
  </div>
  
  <!-- Optional gradient overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.2)); z-index:1;"></div>
</section>


<!-- Featured Rooms -->
<section class="py-5" id="rooms">
    <div class="container">
        <h2 class="mb-4 text-center">Featured Rooms</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/deluxe.jpg');">
                    <h3>Deluxe Room</h3>
                    <a href="{{ route('bookings.create') }}">Book Now</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/suite.jpg');">
                    <h3>Suite</h3>
                    <a href="{{ route('bookings.create') }}">Book Now</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/villa.jpg');">
                    <h3>Villa</h3>
                    <a href="{{ route('bookings.create') }}">Book Now</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/standard.jpg');">
                    <h3>Standard</h3>
                    <a href="{{ route('bookings.create') }}">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- services -->
<!-- Featured Rooms -->
<section class="py-5" id="services">
    <div class="container">
        <h2 class="mb-4 text-center">Our Services</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/sw.jpg');">
                    <h3>Swimming Pool</h3>  
                    <a href="{{ route('bookings.create') }}">Book Now</a>                  
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/yoga.jpg');">
                    <h3>Yoga & Meditation</h3>  
                    <a href="{{ route('bookings.create') }}">Book Now</a>                 
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/kids.jpg');">
                    <h3>Kids’ Play Zone</h3>  
                    <a href="{{ route('bookings.create') }}">Book Now</a>                  
                </div>
            </div>
            <div class="col-md-3">
                <div class="property-card" style="background-image: url('../images/adv.jpg');">
                    <h3>Adventure Activities</h3>      
                    <a href="{{ route('bookings.create') }}">Book Now</a>              
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Amenities -->
<section class="py-5 bg-light" id="amenities">
    <div class="container">
        <h2 class="mb-4 text-center">Our Amenities</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-3">
                <i class="bi bi-wifi"></i>
                <h5>Free WiFi</h5>
            </div>
            <div class="col-md-3 mb-3">
                <i class="bi bi-droplet"></i>
                <h5>Swimming Pool</h5>
            </div>
            <div class="col-md-3 mb-3">
                <i class="bi bi-flower1"></i>
                <h5>Spa & Wellness</h5>
            </div>
            <div class="col-md-3 mb-3">
                <i class="bi bi-cup-hot"></i>
                <h5>Restaurant</h5>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5" id="testimonials">
    <div class="container">
        <h2 class="mb-4 text-center">What Our Guests Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card text-center">
                    <p>“Amazing stay! Very clean and cozy rooms.”</p>
                    <img src="../images/avatar1.jpg" class="rounded-circle mb-2" alt="Guest">
                    <h6>John Doe</h6>
                    <small>5/5 Stars</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card text-center">
                    <p>“Excellent service and beautiful environment.”</p>
                    <img src="../images/avatar2.jpg" class="rounded-circle mb-2" alt="Guest">
                    <h6>Jane Smith</h6>
                    <small>4.8/5 Stars</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card text-center">
                    <p>“Would highly recommend Vanvaso for a weekend getaway!”</p>
                    <img src="../images/avatar3.jpg" class="rounded-circle mb-2" alt="Guest">
                    <h6>Mark Wilson</h6>
                    <small>5/5 Stars</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact">
    <div class="container">
        <p>&copy; 2025 Vanvaso Hotel. All Rights Reserved.</p>
        <p>Email: contact@vanvaso.com | Phone: +91-1234567890</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
