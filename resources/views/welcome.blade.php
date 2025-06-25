<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mwiti Kicks - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />

    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #fff;
            color: #000;
        }
        .hero {
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 0 2px 8px rgba(0,0,0,0.7);
        }
        .nav-links a, .nav-links i {
            text-decoration: none;
            font-weight: 500;
            margin-right: 20px;
            color: #000;
        }
        .section-title {
            font-weight: 700;
            font-size: 2rem;
        }
        .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #000;
        }
        .about-section {
            background-color: #f8f9fa;
            padding: 40px 20px;
        }
        .testimonial-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .newsletter {
            background-color: #111;
            color: white;
            padding: 40px 20px;
        }
        .newsletter input[type="email"] {
            border-radius: 0;
            height: 50px;
        }
        .stats-section {
            background-color: #f0f0f0;
            padding: 40px 0;
        }
        .stats-section .stat {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="p-3 d-flex justify-content-between align-items-center border-bottom">
    <h1 class="fs-4 fw-bold">Mwiti Kicks</h1>
    <div class="nav-links d-flex align-items-center">
        <a href="{{ route('brands') }}">Brands</a>
        <a href="{{ route('new.arrivals') }}">New Arrivals</a>
        <a href="{{ route('collections') }}">Collections</a>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero text-center">
    <div>
        <h1 class="display-4 fw-bold">Step Into Luxury</h1>
        <p class="lead">Premium Sneakers for the Bold</p>
        <a href="{{ route('new.arrivals') }}" class="btn btn-light px-4 py-2 mt-3">Shop Now</a>
    </div>
</div>
<section class="container mt-5">
    <form action="{{ route('search') }}" method="GET" class="input-group mb-4">
        <input type="text" name="query" class="form-control" placeholder="Search sneakers..." aria-label="Search sneakers">
        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
    </form>
</section>
<!-- Discover Section -->
<section class="container my-5">
    <h2 class="section-title mb-4 text-center">Discover More</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <a href="{{ route('brands') }}">
                <img src="/images/brand.jpg" class="img-fluid mb-2" alt="Brands">
                <p>Explore Brands</p>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('collections') }}">
                <img src="/images/collection-sneakers.jpg" class="img-fluid mb-2" alt="Collections">
                <p>Our Collections</p>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('new.arrivals') }}">
                <img src="/images/new-arrivals.jpg" class="img-fluid mb-2" alt="New Arrivals">
                <p>New Arrivals</p>
            </a>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="container my-5">
    <h2 class="section-title mb-4 text-center">What Our Customers Say</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="testimonial-card">
                <p>"Absolutely love my new kicks! The quality is top-notch and they arrived so  quickly."</p>
                <p class="text-muted">- Jane Doe</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">      
                <p>"Bania Kicks has the best selection of sneakers. I found exactly what I was looking for!"</p>
                <p class="text-muted">- John Smith</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">
                <p>"Fast delivery and amazing customer service. Will definitely shop here again!"</p>
                <p class="text-muted">- Sarah Lee</p>
            </div>
        </div>
    </div>
</section>  

<!-- Stats Section -->
<section class="stats-section text-center">
    <div class="container">
        <h2 class="section-title mb-4">Since 2023</h2>
        <div class="row">
            <div class="col-md-4">
                <p class="stat">8,450+</p>
                <p>Orders Delivered</p>
            </div>
            <div class="col-md-4">
                <p class="stat">5,900+</p>
                <p>Happy Customers</p>
            </div>
            <div class="col-md-4">
                <p class="stat">24hr</p>
                <p>Fast Nationwide Delivery</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="newsletter text-center">
    <h2 class="mb-4">Join Our Newsletter</h2>
    <form class="row justify-content-center" action="#" method="post">
        <div class="col-md-6 col-sm-8">
            <input type="email" name="email" class="form-control mb-3" placeholder="Enter your email..." required>
        </div>
        <div class="col-md-2 col-sm-4">
            <button class="btn btn-light w-100" type="submit">Subscribe</button>
        </div>
    </form>
    <p class="mt-3 text-muted">Get exclusive offers and early access to new drops!</p>
</section>

<!-- About Us -->
<section class="about-section text-center">
    <h2 class="section-title">About Us</h2>
    <p class="mt-3">Bania Kicks is your go-to destination for luxurious sneakers that blend style and comfort. Located in Nairobi, Kenya.</p>
    <p><strong>Call us:</strong> <a href="tel:+254757060870">0757 060 870</a></p>
    <div class="social-icons mt-3">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4 border-top">
    <div class="container">
        <p class="mb-1 small">&copy; {{ date('Y') }} Bania Kicks. All rights reserved.</p>
        <p class="small">
            <strong>Shipping Policy:</strong> All orders are processed within 24 hours and delivered nationwide within 1–2 days. <br>
            <strong>Ordering Policy:</strong> Orders can be placed 24/7. Payment via M-Pesa or card. No cash on delivery. <br>
            <strong>We emphasize fast, secure, and trackable delivery.</strong>
        </p>
    </div>
</footer>

</body>
</html>
