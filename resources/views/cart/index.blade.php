@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    @if(session('success'))
    <div id="success-message" class="success-message">
        {{ session('success') }}
    </div>
@endif
    @if (count($cart) > 0)
    <ul class="cart-list">
        @foreach ($cart as $id => $item)
            <li class="cart-item">
                <!-- Display Product Image -->
                {{-- <img src="{{ asset('storage/' . $item['image']) }}" alt="" style="width: 100px; height: auto; margin-right: 20px;"> --}}
    
                <!-- Display Item Name, Unit Price, and Total Price -->
                <span style="margin-top: 120px; font-weight: bold; font-size: 30px;">{{ $item['name'] }}</span>
    
                <!-- Display Quantity -->
                <span style="margin-top: 10px; font-size: 20px;">Quantity: {{ $item['quantity'] }}</span>
                
                <!-- Display Total Price for the Item -->
                <span style="margin-top: 10px; font-size: 20px; font-weight: bold;">Total Price: ₹{{ number_format($item['total_price'], 2) }}</span>
                                 
                <!-- Remove Form -->
                <form action="{{ route('cart.remove', $id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-button">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
    
@else
    <p>Your cart is empty.</p>
@endif
@endsection


<style>
    .cart-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px; /* Adjust spacing between items */
        padding: 0;
        list-style: none;
      
    }

    .cart-item {
        flex: 1 1 calc(33.333% - 15px); /* Adjust the width of each column */
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        
    }

    .cart-item-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .remove-form {
        margin-top: 10px;
        width: 100%;
    }

    .remove-button {
        width: 100%;
        background-color: #f44336;
        color: white;
        border: none;
        padding: 8px;
        cursor: pointer;
        border-radius: 5px;
        width:10% ;
        height: 4vh;
    }

    .remove-button:hover {
        background-color: #d32f2f;
    }

    /* Text styling */
    .cart-item span {
        font-size: 1em;
        margin-bottom: 5px;
    }

    p {
        font-size: 1.2em;
        font-weight: bold;
        text-align: center;
    }
    .success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: rgb(238, 60, 6);
    color: white;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    z-index: 9999;
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }
    });
</script>

