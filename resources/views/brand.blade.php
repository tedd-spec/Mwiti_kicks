<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bania Kicks - Sneaker Brands</title>
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
        .brand-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            transition: 0.3s;
            background-color: #f9f9f9;
            cursor: pointer;
        }
        .brand-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: scale(1.03);
        }
        .brand-logo {
            max-height: 80px;
            margin-bottom: 10px;
        }
        /* Modal theming */
        .modal-content {
            background-color: #111;
            color: #fff;
            border-radius: 15px;
        }
        .modal-header {
            border-bottom: 1px solid #444;
        }
        .btn-close {
            filter: invert(1);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="p-3 d-flex justify-content-between align-items-center border-bottom">
        <h1 class="fs-4 fw-bold">Mwiti Kicks</h1>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="btn btn-outline-dark d-flex align-items-center">
            <i class="bi bi-house me-1"></i> Home</a>
        </div>
    </nav>

    <!-- Brands Section -->
    <section class="container my-5">
        <h2 class="mb-4 fw-bold">Top Sneaker Brands</h2>
        <div class="row g-4">
            @foreach (['Nike', 'Adidas', 'Jordan', 'Balenciaga', 'New Balance', 'Louis Vuitton', 'Timberland', 'Gucci'] as $brand)
                <div class="col-md-3 col-sm-6">
                    <div class="brand-card text-center" data-brand="{{ $brand }}">
                        <img src="/images/brands/{{ strtolower($brand) }}.png" class="brand-logo" alt="{{ $brand }}">
                        <h5>{{ $brand }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Brand Info Modal -->
    <div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0">
            <h5 class="modal-title" id="brandModalLabel">Brand Title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body border-top">
            <p id="brandDescription">Brand description goes here...</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 border-top">
        <small>&copy; {{ date('Y') }} Bania Kicks. Luxury in Every Step.</small>
    </footer>

    <!-- Bootstrap + Modal Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const brandSummaries = {
            Nike: "Nike is a global sportswear giant known for innovation, performance, and iconic designs. Founded in 1964 as Blue Ribbon Sports and rebranded as Nike in 1971, it revolutionized sneakers with technologies like Air Max and Flyknit. Nike collaborates with athletes and designers, producing legendary lines like Air Force 1, Air Max, and Vaporfly. The Swoosh logo and “Just Do It” slogan define its bold, empowering image.",
            Adidas: "Founded in Germany in 1949, Adidas combines athletic performance with urban style. Famous for its three-stripe logo, Adidas created classics like the Superstar and Stan Smith, and modern icons like UltraBoost and NMD. The brand invests heavily in sustainability and innovation with Boost technology and Primeknit. Collaborations with artists like Kanye West (Yeezy) further its cultural impact.",
            Jordan: " Launched in 1984 by Nike, the Jordan Brand revolutionized sneaker culture through its partnership with Michael Jordan. The Air Jordan 1 sparked a movement that continues across generations. Combining performance basketball tech with streetwear appeal, Jordans remain a staple of both courts and collections. The brand represents excellence, individuality, and legacy.",
            Balenciaga: "Founded in 1917, Balenciaga is a renowned luxury fashion brand based in Paris, France. The company was established by Cristóbal Balenciaga, a Spanish designer who gained recognition for his innovative and sculptural designs. Initially specializing in haute couture, Balenciaga expanded its product range over the years to include ready-to-wear clothing, shoes, handbags, and accessories.  The brand is known for its modern, streetwear-inspired aesthetic combined with expert craftsmanship and attention to detail. Balenciaga competes with other high-end fashion houses such as Gucci, Louis Vuitton, and Chanel, establishing itself as a leading player in the market. Over the years, Balenciaga has achieved significant milestones.",
            NewBalance: "New Balance, founded in 1906, is an American footwear brand known for its commitment to quality and performance. Initially producing arch supports, it evolved into a leading athletic shoe manufacturer. New Balance emphasizes comfort, fit, and innovation, with iconic models like the 990 series and 574. The brand is recognized for its Made in USA ethos and community involvement.",
            Timberland: "Timberland, founded in 1952, is an American footwear and apparel brand known for its rugged outdoor style. The iconic yellow boot, introduced in 1973, symbolizes durability and craftsmanship. Timberland combines functionality with fashion, appealing to both outdoor enthusiasts and urban consumers. The brand emphasizes sustainability, using eco-friendly materials and practices in its products.",
            Gucci: "Gucci, founded in Florence in 1921, is a luxury fashion house known for its craftsmanship, innovation, and iconic designs. Under the creative direction of Alessandro Michele, Gucci has redefined modern luxury with bold aesthetics and eclectic styles. The brand sneakers, like the Ace and Rhyton, blend high fashion with streetwear influences, making them highly sought after by collectors and fashion enthusiasts.",
            LouisVuitton: "Louis Vuitton, founded in 1854 in Paris, is one of the worlds most iconic luxury fashion houses. Known for its craftsmanship, monogram canvas, and travel heritage, the brand expanded into sneakers with designs that blend opulence, streetwear, and innovation. Under designers like Virgil Abloh, LV sneakers such as the LV Trainer and Run Away have become symbols of prestige and modern culture. Louis Vuitton redefines what luxury sneakers mean—fusing haute couture aesthetics with urban flair—making them a top choice for fashion-forward collectors seeking status and originality in every step."
        };

        document.querySelectorAll('.brand-card').forEach(card => {
            card.addEventListener('click', () => {
                const brand = card.getAttribute('data-brand');
                document.getElementById('brandModalLabel').textContent = brand;
                document.getElementById('brandDescription').textContent = brandSummaries[brand] || "No description available.";
                new bootstrap.Modal(document.getElementById('brandModal')).show();
            });
        });
    </script>
</body>
</html>
