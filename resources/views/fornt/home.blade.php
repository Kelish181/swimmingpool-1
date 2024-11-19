@extends('fornt/layout')
@section('page_title','home')
@section('home_select','active')
@section('container')
<!-- ===== Main Section - Slider ===== -->
<style>
    .product-price{
        font-size:20px ;
        
    }
    .add-to-cart {
    background-color: #ff6f61;  /* Primary color for the button */
    color: #fff;                /* Text color */
    font-size: 16px;            /* Font size */
    font-weight: bold;          /* Bold text */
    padding: 10px 20px;         /* Padding around the text */
    border: none;               /* Remove border */
    border-radius: 5px;         /* Rounded corners */
    cursor: pointer;            /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition for hover */
}

.add-to-cart:hover {
    background-color: #e55b4d;  /* Darker color on hover */
}

.add-to-cart:active {
    background-color: #cc5044;  /* Slightly darker when clicked */
}

.product-item {
    margin-bottom: 30px;
}

.blog-post {
    padding: 0px; /* Reduce padding */
    border: 1px solid #ddd; /* Optional: Add a border for better visibility */
    border-radius: 5px; /* Rounded corners */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for a sleek look */
    margin-bottom: 20px; /* Reduce space between posts */
    background-color: #f9f9f9; /* Optional: Light background color */
}

.product-thumbnail img {
    max-width: 80%; /* Reduce the image size */
    height: auto;
    margin: 0 auto 10px; /* Center the image */
}

.blog-desc {
    font-size: 14px; /* Reduce font size */
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    margin-right:40px;
}

.product-price {
    font-size: 16px;
    margin-bottom: 10px;
    margin-left:-40px;
}

.quantity-label {
    font-weight: bold;
    margin-right: 40px;
}

.total-price {
    font-size: 16px;
    margin-top: 15px;
    margin-left:-40px;
}

.btn {
    margin-top: 10px;
    margin-left:-40px;
}
.quantity{
    margin-left:-40px;
}
.product-thumbnail {
    width: 200px; /* Set a fixed width */
    height: 200px; /* Set a fixed height */
    overflow: hidden; /* Crop any overflow content */
    display: flex;
    align-items: center; /* Center image vertically */
    justify-content: center; /* Center image horizontally */
}

.product-image {
    max-width: 100%; /* Scale image to fit container width */
    max-height: 100%; /* Scale image to fit container height */
    object-fit: cover; /* Ensure the image covers the entire container */
}
#notification{
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
.success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: green;
    color: white;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    z-index: 9999;
}





</style>
<div id="notification" style="display: none; position: fixed; top: 20px; right: 20px; background-color: #3cbeee; color: white; padding: 15px; border-radius: 5px; z-index: 1000;">
    Item added to cart successfully!
</div>

<section class="main" id="home">
    
    <!-- Swiper -->
    <div class="swiper-container fullscreen">
        {{-- <div class="swiper-wrapper"> --}}

            <!-- Slide 1 -->
            @foreach($about as $list)
            <div class="swiper-slide overlay"
                style="background: url('{{asset('admin/assets/media/about/'.$list->image)}}'); background-size: cover;">
                <div class="slider-content container">
                    <div class="col-md-12">
                        <h3 style="color: white; font-weight: bold; text-align: center;">
                            Welcome to <br>
                            <span style="font-size: 60px;">Swimmingpool</span>
                        </h3>
                                                <h4>{{$list->text}}</h4>
                        <div class="cta">
                            <a href="{{$list->link}}" class="btn" target="_blank">{{$list->btntext}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End of Slide 1 -->

        {{-- </div> --}}
        <!-- End of Swiper Wrapper -->

        <!-- Add Pagination -->
        {{-- <div class="swiper-pagination"></div>

        <!-- scroll down -->
        <div class="scroll-down"><a href=""><i class="fa fa-angle-double-down"></i></a></div> --}}

    </div>
    <!-- End of Swiper Container -->
</section>


<!-- ===== End of Main Section - Slider ===== -->
<!-- ===== Start About Us Section ===== -->
 <!-- Cart Icon -->
        
        
<section id="about-us">
    <div class="container-fluid">
        <div class="row">
            @foreach($slider as $list)
            <div class="col-md-4 about-image"
                style="background: url('{{asset('admin/assets/media/slider/'.$list->image)}}'); background-size: cover;">
            </div>

            <div class="col-md-8 main-content">
                <h2 class="section-title">About Us</h2>
                <div class="about-description">
                    <h4 style="padding-bottom:20px;">{{$list->heading}}</h2>
                        <p>{{$list->text}}</p>
                        <a href="{{ route('about', ['id' => $list->id]) }}" class="btn">Read more</a>
                </div>
            </div>

            <div class="logo-overlay">
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- ===== End About Us Section ===== -->
<section id="product">
    <div class="container">
        <div class="col-md-12 pad80">
            <h2 class="section-title text-center">Product</h2>
        </div>
        <!-- Row Wrapper -->
        <div class="row">
            @foreach($product as $index => $list)
                                        <div class="col-md-3 col-sm-6 text-center product-item">
                                            <article class="blog-post">
                                            <div class="product-thumbnail">
                            <!-- Display Product Image -->
                            <a href="{{ route('product', ['id' => $list->id]) }}">
                                <img src="{{ asset('admin/assets/media/product/' . $list->image) }}" 
                                     class="img-responsive product-image" 
                                     alt="{{ $list->name }}">
                            </a>
                        </div>


                        <div class="blog-desc">
                            <!-- Center-aligned Product Name -->
                            <h4><a href="{{ route('product', ['id' => $list->id]) }}" class="product-name">{{ $list->name }}</a></h4>

                            <!-- Center-aligned Price -->
                            <p class="product-price"><b>Price: ₹<span id="price-{{ $list->id }}">{{ number_format($list->price, 2) }}</span></b></p>

                            <!-- Quantity Input -->
                            <div>
                                <label for="quantity-{{ $list->id }}" class="quantity-label">Quantity:</label>
                                <input type="number" id="quantity-{{ $list->id }}"  class="quantity" value="1" min="1"
                                       oninput="updateTotalPrice({{ $list->id }}, {{ $list->price }})">
                            </div>

                            <!-- Total Price -->
                            <p class="total-price"><b>Total Price: ₹<span id="total-price-{{ $list->id }}">{{ number_format($list->price) }}</span></b></p>

                            <!-- Add to Cart Button -->
                            <button class="btn btn-primary" onclick="addToCart({{ $list->id }}, '{{ $list->name }}', {{ $list->price }})">Add to Cart</button>

                            <!-- Read More Button -->
                            <a href="{{ route('product', ['id' => $list->id]) }}" class="btn btn-secondary">Read More</a>
                        </div>
                    </article>
                </div>

                <!-- Clear row after 4 items -->
                @if(($index + 1) % 4 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
    </div>
</section>



<!-- ===== Start of Gallery Section ===== -->
<section id="gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pad80">
                <h2 class="section-title">Gallery</h2>
            </div>

            <!-- Start of Gallery Filters -->
            <ul class="gallery-sorting text-center">
                <li><a href="#" class="btn-border active" data-group="all">All</a></li>
                @foreach($cimage as $list)
                <li><a href="#" class="btn-border" data-group="{{$list->category_name}}">{{$list->category_name}}</a></li>
                @endforeach
            </ul>

            <!-- Start of Gallery Images -->
            <ul class="gallery-items list-unstyled" id="grid">
                @foreach($cimage as $image)
                <!-- image -->
                <li class="col-md-2 col-sm-4 col-xs-6" data-groups='["{{ $image->category_name }}"]'>
                    <figure class="gallery-item">
                        <a href="{{asset('admin/assets/media/categoryimages/'.$image->image)}}">
                            <img src="{{asset('admin/assets/media/categoryimages/'.$image->image)}}" alt=""
                                class="img-responsive">
                        </a>
                    </figure>
                </li>
                @endforeach
                <!-- sizer -->
                <li class="col-md-2 col-sm-4 col-xs-6 shuffle_sizer"></li>
            </ul>
            <!-- End of Gallery Images -->

        </div>
    </div>
</section>
<!-- ===== End of Gallery Section ===== -->





<!-- ===== Start of Blog Section ===== -->
<section id="blog">
    <div class="container">
        <div class="col-md-12 pad80">
            <h2 class="section-title">Blog</h2>
        </div>
        <!-- Start of Blog Post 1 -->
        @foreach($blog as $list)
        <article class="col-md-12 blog-post">
            <div class="col-md-3 blog-thumbnail">
                <a href="{{ route('blog', ['id' => $list->id]) }}"><img
                        src="{{asset('admin/assets/media/blog/'.$list->image)}}" class="img-responsive" alt=""></a>
            </div>

            <div class="col-md-9 blog-desc">
                <h4><a href="{{ route('blog', ['id' => $list->id]) }}">{{ $list->heading }}</a>
                </h4>

                <div class="post-detail">
                </div>
                <span>{{ Carbon\Carbon::parse($list->created_at)->format('d-m-Y') }}</span>
                @php
                $blogContent = preg_replace('/<img[^>]+>/i', '', $list->text);
                    $limitedContent = Str::limit($blogContent, 350, ' ...');
                    @endphp
                    <p>{!! $limitedContent !!}</p>
                    <a href="{{ route('blog', ['id' => $list->id]) }}" class="btn">read more</a>
            </div>
        </article>
        @endforeach
        <!-- End of Blog Post 1 -->
        <!-- <div class="col-md-12 text-center">
                <a href="blog-listing.html" class="btn-border">visit blog</a>
            </div> -->

    </div>
</section>
<script>
function addToCart(productId, productName, productPrice) {
    // Get the quantity input for the specific product
    const quantity = document.getElementById('quantity-' + productId).value;
    const totalPrice = quantity * productPrice; // Calculate total price

    // Perform the fetch request to add the item to the cart
    fetch('/add-to-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: productId,
            name: productName,
            price: productPrice, // Send individual price
            qty: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the cart count if the server returns it
            const cartCount = document.getElementById('cart-count');
            cartCount.textContent = data.cartItemCount; // Update cart count
            
            // Show success notification
            showNotification('Item added to cart successfully!', false);
        } else {
            // Show error notification
            showNotification('Failed to add item to cart.', true);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('An error occurred while adding to the cart.', true);
    });
}

function showNotification(message, isError = false) {
    const notification = document.getElementById('notification');
    notification.innerText = message;
    notification.style.backgroundColor = isError ? '#f44336' : '#3cbeee';
    notification.style.display = 'block';

    // Hide the notification after 3 seconds
    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}

function updateTotalPrice(productId, productPrice) {
    // Calculate the updated total price based on quantity
    const quantity = document.getElementById('quantity-' + productId).value;
    const totalPrice = quantity * productPrice;

    // Update the total price display for the product
    document.getElementById('total-price-' + productId).innerText = totalPrice.toFixed(2);
}

// Assuming you're using jQuery for AJAX
$(document).on('click', '.remove-item', function() {
    var itemId = $(this).data('id');  // Get the ID of the item to be removed

    $.ajax({
        url: '/cart/remove/' + itemId,  // Adjust the URL based on your route
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                // Display the success message in the corner
                var message = $('<div class="success-message">' + response.message + '</div>');
                $('body').append(message);

                // Position the message in the top right corner
                message.css({
                    position: 'fixed',
                    top: '20px',
                    right: '20px',
                    padding: '10px',
                    background: 'green',
                    color: 'white',
                    borderRadius: '5px',
                    zIndex: '9999'
                });

                // Hide the message after 3 seconds
                setTimeout(function() {
                    message.fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error removing item: ', error);
        }
    });
});

</script>




<!-- ===== End of Blog Section ===== -->

<!-- ===== Start of Testimonial Section ===== -->
<section id="testimonials">
    <div class="container main-content">

        <div class="col-md-12">
            <h2 class="section-title"><span>happy clients</span><br> testimonial</h2>
        </div>

        <!-- Start of Sync 1 -->
        <div id="sync1" class="owl-carousel col-md-12">
            @foreach($testimonial as $list)
            <!-- Testimonial of Client 1 -->
            <div class="item">
                <div class="testimonial">
                    <blockquote>{{$list->desperation}}</blockquote>
                </div>
            </div>

            <!-- Testimonial of Client 2 -->


            <!-- Testimonial of Client 3 -->

            @endforeach
        </div>
        <!-- End of Sync 1 -->

        <!-- Start of Sync 2 -->
        <div id="sync2" class="owl-carousel col-md-12">

            <!-- Client 1 -->
            @foreach($testimonial as $list)
            <div class="item">
                <!-- Client Image -->
                <div class="client-img">
                    <img src="{{asset('admin/assets/media/testimonial/'.$list->profile)}}" class="img-responsive"
                        alt="">
                </div>
                <!-- Client Detail -->
                <div class="details">
                    <h4>{{$list->heading}}</h4>
                    <h6>{{$list->review}}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ===== End of Testimonial Section ===== -->




@endsection