    @extends('fornt/layout')
    @section('page_title','Product')
    @section('product_select','active')
    @section('container')

    <style>
        .custom-image {
            display: block;
            margin: 0 auto;
            width: 220%;
            max-height: 600px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px #888888;
        }

        h2 {
            padding-bottom: 50px;
        }

        .name {
            text-align: center;
            margin: 0 !important;
            text-transform: uppercase;
        }

        #success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #3cbeee;
            color: #FFFFFF;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none; /* Hide initially */
        }

        @media (max-width: 768px) {
            .custom-image {
                width: 100%;
                max-height: 400px;
            }
        }
    </style>

    <!-- Main Page Section -->
    <section class="main" id="pages">
        <div id="success-message">Product successfully added to cart!</div>

        <!-- Title -->
        <div class="page-title overlay" style="background: url('{{asset('fornt/assets/images/img/slider-bg.jpg')}}'); background-size: cover;">
            <h2>Product Detail</h2>
        </div>
    </section>

    <!-- Product Details Section -->
    <section id="about">
        <div class="container main-content">
            <div class="col-md-12">
                <h2 class="name">{{$product->name}}</h2>
                
                <div class="product-detail" style="display: flex; gap: 50%; align-items: center; margin-left:10%;">

                    <!-- Product Image -->
                    <div>
                        <p>
                            <img src="{{ asset('admin/assets/media/product/' . $product->image) }}" alt="Product Image" class="custom-image">
                        </p>
                    </div>

                    <!-- Product Form -->
                    <div>
                        <form action="" method="POST" class="add-to-cart" style="margin-bottom: 20px;">
                            @csrf
                            <label for="quantity" style="font-size:20px;"><strong>Quantity:</strong></label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="quantity-input" style="width: 60px; text-align: center; margin-left: 10px;" oninput="updatePrice()"><br><br>
                            <p style="font-size:20px;"><strong>Price per Unit:</strong> ₹ <span id="unit-price">{{$product->price}}</span></p>
                            <p><strong style="font-size:20px;">Total Price:</strong> ₹ <span id="total-price" style="font-size:20px;">{{$product->price}}</span></p>
                            <input type="hidden" id="base-price" value="{{$product->price}}">
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px; display: block;" id="add-to-cart-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <p>{{$product->description}}</p>
            </div>
        </div>
    </section>

    <script>
        // Update total price based on quantity
        function updatePrice() {
            const basePrice = parseFloat(document.getElementById('base-price').value); 
            const quantity = parseInt(document.getElementById('quantity').value) || 1; 
            const totalPrice = (basePrice * quantity).toFixed(2); 
            document.getElementById('total-price').textContent = totalPrice; 
        }

        // Handle Add to Cart button click
        document.getElementById('add-to-cart-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Show the success message
            document.getElementById('success-message').style.display = 'block';

            // Hide the success message after 3 seconds
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 3000);

            // Here you can add logic to actually add the product to the cart, for example using AJAX
            // You can also send the form data to the backend to add the product to the session/cart
        });
    </script>

    @endsection
