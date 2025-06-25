<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Arrivals - Mwiti Kicks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { font-family: 'Raleway', sans-serif; background-color: #fff; color: #000; }
        .sneaker-card { border: 1px solid #eee; border-radius: 10px; background: #fafafa; transition: 0.3s; }
        .sneaker-card:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .sneaker-image { width: 100%; height: 220px; object-fit: cover; }
    </style>
</head>
<body>

<nav class="p-3 d-flex justify-content-between align-items-center border-bottom">
    <h1 class="fs-4 fw-bold">Mwiti Kicks</h1>
    <a href="{{ route('home') }}" class="btn btn-outline-dark d-flex align-items-center">
            <i class="bi bi-house me-1"></i> Home
        </a>
 <a href="#" class="btn btn-outline-dark position-relative" data-bs-toggle="modal" data-bs-target="#wishlistModal">
    <i class="bi bi-heart-fill"></i>
    @if(session()->has('wishlist') && count(session('wishlist')) > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark text-white">
            {{ count(session('wishlist')) }}
        </span>
    @endif
    Wishlist
</a>
</nav>

<section class="container my-5">
    <h2 class="mb-4 fw-bold">New Arrivals</h2>
    <div class="row g-4">
        @foreach ($sneakers as $sneaker)
            <div class="col-md-3 col-sm-6">
                <div class="sneaker-card p-2">
                    <img src="{{ asset($sneaker->image_url) }}" class="sneaker-image" alt="{{ $sneaker->title }}">
                    <div class="p-2">
                        <h6 class="fw-bold">{{ $sneaker->title }}</h6>
                           <p class="text-muted mb-1">KES {{ number_format($sneaker->price) }}</p>
                        <button class="btn btn-dark btn-sm mt-2" 
               data-bs-toggle="modal" 
               data-bs-target="#orderModal" 
               data-title="{{ $sneaker->title }}"
               data-size="{{ $sneaker->size }}"
                data-price="{{ $sneaker->price }}"
                data-image="{{ asset($sneaker->image_url) }}">
                    Order Now
               </button>

 <form action="{{ route('wishlist.add') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="product_id" value="{{ $sneaker->id }}">
    <input type="hidden" name="title" value="{{ $sneaker->title }}">
    <input type="hidden" name="image_url" value="{{ $sneaker->image_url }}">
    <input type="hidden" name="price" value="{{ $sneaker->price }}">
    <button class="btn btn-outline-secondary btn-sm">Add to Wishlist</button>
</form>

@if(session('wishlist_added') && session('last_added') == $sneaker->id)
    <div class="alert alert-success mt-2 py-1 px-2 small">
        Added to Wishlist ( {{ count(session('wishlist')) }})
    </div>
@endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
       <form id="whatsappOrderForm" class="modal-content border-0" style="background-color: #fff; color: #000;">
            @csrf

            <!-- Header -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-uppercase fw-bold">Order Sneaker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-0">
                <div class="text-center mb-4">
                    <img id="sneakerImage" src="" alt="Sneaker" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                </div>

                <input type="hidden" name="sneaker_name" id="sneakerName">
                <input type="hidden" name="price" id="sneakerPrice">


                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <select name="color" class="form-select border-dark rounded-1" required>
                        <option>Black</option>
                        <option>White</option>
                        <option>Red</option>
                        <option>Brown</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <select name="size" id="sneakerSize" class="form-select border-dark rounded-1" required>
                        <option>40</option>
                        <option>41</option>
                        <option>42</option>
                        <option>43</option>
                        <option>44</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" min="1" max="5" class="form-control border-dark rounded-1" required>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label"> Name</label>
                    <input type="text" name="name" class="form-control border-dark rounded-1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Delivery Location</label>
                    <input type="text" name="location" class="form-control border-dark rounded-1" required>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 pt-0">
              <button type="button" class="btn btn-dark w-100 rounded-1 fw-semibold" onclick="sendWhatsAppOrder()">Submit Order</button>
            </div>
        </form>
    </div>
</div>
<!-- Wishlist Modal -->
<div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header bg-white border-bottom">
                <h5 class="modal-title fw-bold" id="wishlistModalLabel">Your Wishlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body bg-light text-dark">
                @if(session()->has('wishlist') && count(session('wishlist')) > 0)
                    <ul class="list-group list-group-flush">
                        @foreach(session('wishlist') as $id => $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($item['image_url']) }}" alt="{{ $item['title'] }}" style="width: 60px; height: 60px; object-fit: cover;" class="me-3 rounded">
                                    <div>
                                        <div class="fw-semibold">{{ $item['title'] }}</div>
                                        <small class="text-muted">KES {{ $item['price'] }}</small>
                                    </div>
                                </div>
                                <div>
                                    <!-- Order Now Form -->
<button class="btn btn-dark btn-sm mt-2" 
        data-bs-toggle="modal" 
        data-bs-target="#orderModal" 
        data-title="{{ $sneaker->title }}"
        data-size="{{ $sneaker->size }}"
        data-price="{{ $sneaker->price }}"
        data-image="{{ asset($sneaker->image_url) }}">
    Order Now
</button>


                                    <!-- Remove from Wishlist -->
                                    <form action="{{ route('wishlist.remove', ['id' => $id]) }}" method="POST" class="d-inline ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Remove</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">Your wishlist is currently empty.</p>
                @endif
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 border-top">
    <small>&copy; {{ date('Y') }} Bania Kicks. Luxury in Every Step.</small>
</footer>

<!-- Bootstrap JS (for modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const orderModal = document.getElementById('orderModal');
    orderModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const title = button.getAttribute('data-title');
    const size = button.getAttribute('data-size');
    const image = button.getAttribute('data-image');
    const price = button.getAttribute('data-price');

    document.getElementById('sneakerName').value = title;
    document.getElementById('sneakerImage').src = image;
    document.getElementById('sneakerSize').value = size;
    document.getElementById('sneakerPrice').value = price;
});

</script>
<script>
    // New Arrivals - Order Modal data injection
    const orderModal = document.getElementById('orderModal');
    orderModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const title = button.getAttribute('data-title');
    const size = button.getAttribute('data-size');
    const image = button.getAttribute('data-image');
    const price = button.getAttribute('data-price');

    document.getElementById('sneakerName').value = title;
    document.getElementById('sneakerImage').src = image;
    document.getElementById('sneakerSize').value = size;
    document.getElementById('sneakerPrice').value = price;
});


    // Hide Wishlist Modal when Order Now is clicked
    document.querySelectorAll('.wishlist-order-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const wishlistModal = bootstrap.Modal.getInstance(document.getElementById('wishlistModal'));
            wishlistModal.hide();
        });
    });
</script>
<script>
    function sendWhatsAppOrder() {
        const name = document.querySelector('[name="name"]').value.trim();
        const location = document.querySelector('[name="location"]').value.trim();
        const color = document.querySelector('[name="color"]').value;
        const size = document.querySelector('[name="size"]').value;
        const quantity = document.querySelector('[name="quantity"]').value;
        const sneaker = document.getElementById('sneakerName').value;
        const price = document.getElementById('sneakerPrice').value;

        if (!name || !location || !quantity) {
            alert('Please fill out all required fields.');
            return;
        }

        const message = `Hey, I'm ${name}. I'm interested in the ${color} ${sneaker} (Size ${size}) - Qty: ${quantity}. Price per pair is KES ${price}. Please deliver to ${location}.`;

        const encodedMessage = encodeURIComponent(message);
        const phone = '254785857600';
        const waUrl = `https://wa.me/${phone}?text=${encodedMessage}`;

        window.open(waUrl, '_blank');
    }
</script>


</body>
</html>
