<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collections - Bania Kicks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #fff;
            color: #000;
        }
        .collection-block {
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            height: 300px;
            background-size: cover;
            background-position: center;
            transition: 0.4s;
        }
        .collection-block:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .collection-label {
            position: absolute;
            bottom: 0;
            background: rgba(0,0,0,0.6);
            color: white;
            width: 100%;
            padding: 1rem;
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="p-3 d-flex justify-content-between align-items-center border-bottom">
        <h1 class="fs-4 fw-bold">Bania Kicks</h1>
        <div class="nav-links">
             <a href="{{ route('home') }}" class="btn btn-outline-dark d-flex align-items-center">
            <i class="bi bi-house me-1"></i> Home
        </a>
        </div>
    </nav>

    <!-- Collections Section -->
    <section class="container my-5">
        <h2 class="mb-4 fw-bold">Curated Collections</h2>
        <div class="row g-4">
            @foreach ([
                ['title' => 'Street Essentials', 'image' => 'street.jpg'],
                ['title' => 'Luxury Drops', 'image' => 'luxury.jpg'],
                ['title' => 'Summer Heat', 'image' => 'summer.jpg'],
                ['title' => 'Limited Editions', 'image' => 'limited.jpg'],
            ] as $collection)
                <div class="col-md-6">
                    <div class="collection-block" style="background-image: url('/images/collections/{{ $collection['image'] }}')">
                        <div class="collection-label">
                            {{ $collection['title'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="text-center py-4 border-top">
        <small>&copy; {{ date('Y') }} Bania Kicks. Curated for Collectors.</small>
    </footer>

</body>
</html>
