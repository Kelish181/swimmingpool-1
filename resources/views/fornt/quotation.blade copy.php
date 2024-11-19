@extends('fornt/layout')
@section('page_title','Quotation')
@section('qotation_select','active')
@section('container')

<section class="main" id="pages">

    <!-- Title -->
    <div class="page-title overlay"
        style="background: url('{{asset('fornt/assets/images/img/slider-bg.jpg')}}'); background-size: cover;">
        <h2>Quotation</h2>
    </div>
    <!-- End of Title -->

</section>
<!-- ===== End of Main Page Section ===== -->



<!-- ===== Start of Contact Section ===== -->
<section id="contact">
    <div class="container">
        <div class="col-md-12 pad80">
            <h2 class="section-title">Quotation</h2>
        </div>

        <!-- Start of Contact Form -->
        <div class="col-md-8 col-md-offset-2 contact-top">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.</p>

            <!-- start of form -->

            <form id="contact-form ">

                <div class="col-md-12">
                    <p class="text-left" style="padding-top: 10px;">Water Volume</p>
                    <select class="form-control input-box" name="watervolume" id="watervolumeDropdown">
                        <option value="" disabled selected>Select Water Volume</option>
                        @foreach($watervolume as $item)
                        <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Filter -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Filter</p>
                    <select class="form-control input-box" name="filter" id="filterDropdown">
                        <option value="" disabled selected>Select Filter</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Filter Qty</p>
                    <input type="number" name="filter_qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Filter Price</p>
                    <input type="number" name="number" class="form-control price finalprice" readonly>
                </div>

                Pump
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Pump</p>
                    <select class="form-control input-box" name="pump" id="pump">
                        <option value="" disabled selected>Select Pump</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Pump Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Pump Price</p>
                    <input type="number" name="number" class="form-control price1 finalprice" readonly>
                </div>

                <!-- Light -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Light</p>
                    <select class="form-control input-box" name="light" id="light">
                        <option value="" disabled selected>Select Light</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Light Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Light Price</p>
                    <input type="number" name="number" class="form-control price2 finalprice" readonly>
                </div>

                <!-- Inlets -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Inlets</p>
                    <select class="form-control input-box" name="inlets" id="inlets">
                        <option value="" disabled selected>Select Inlets</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Inlets Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Light Price</p>
                    <input type="number" name="number" class="form-control price3 finalprice" readonly>
                </div>

                <!-- MainDrain -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">MainDrain</p>
                    <select class="form-control input-box" name="maindrain" id="maindrain">
                        <option value="" disabled selected>Select MainDrain</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">MainDrain Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">MainDrain Price</p>
                    <input type="number" name="number" class="form-control price4 finalprice" readonly>
                </div>

                <!-- Vacuum -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Vacuum</p>
                    <select class="form-control input-box" name="vacuum" id="vacuum">
                        <option value="" disabled selected>Select Vacuum</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Vacuum Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Vacuum Price</p>
                    <input type="number" name="number" class="form-control price5 finalprice" readonly>
                </div>

                <!-- Heater -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Heater</p>
                    <select class="form-control input-box" name="heaterpump" id="heaterpump">
                        <option value="" disabled selected>Select Heater</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Heater Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Heater Price</p>
                    <input type="number" name="number" class="form-control price6 finalprice" readonly>
                </div>

                <!-- Ozone -->
                <div class="col-md-6">
                    <p class="text-left" style="padding-top: 10px;">Ozone</p>
                    <select class="form-control input-box" name="ozone" id="ozone">
                        <option value="" disabled selected>Select Ozone</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Ozone Qty</p>
                    <input type="number" name="qty" class="form-control" min="1" value="1" step="1">
                </div>
                <div class="col-md-3">
                    <p class="text-left" style="padding-top: 10px;">Ozone Price</p>
                    <input type="number" name="number" class="form-control price7 finalprice" readonly>
                </div>
                <div class="col-md-12">
                    <p class="text-left" style="padding-top: 10px;">Total</p>
                    <input type="number" name="total" class="form-control" id="total" readonly>
                </div>
            </form>
        </div>
        <!-- End of Contact Form -->
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $('#watervolumeDropdown').on('change', function() {
        var watervolumeId = $(this).val();


        if (watervolumeId) {
            // Fetch filtered data for Filter dropdown
            $.ajax({
                url: '/get-filtered-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Filter dropdown
                    $('#filterDropdown').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#filterDropdown').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                        $('.price').val(value.price);
                    });
                }
            });

            // Fetch data for Pump dropdown
            $.ajax({
                url: '/get-pump-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Pump dropdown
                    $('#pump').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#pump').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price1').val(value.price);


                    });
                }
            });
            // Fetch data for Light dropdown
            $.ajax({
                url: '/get-light-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Light dropdown
                    $('#light').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#light').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price2').val(value.price);
                    });
                }
            });
            // Fetch data for Inlets dropdown
            $.ajax({
                url: '/get-inlet-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Inlets dropdown
                    $('#inlets').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#inlets').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price3').val(value.price);
                    });
                }
            });
            // Fetch data for MainDrain dropdown
            $.ajax({
                url: '/get-maindrain-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the MainDrain dropdown
                    $('#maindrain').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#maindrain').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price4').val(value.price);
                    });
                }
            });
            // Fetch data for Vacuum dropdown
            $.ajax({
                url: '/get-vacuum-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Vacuum dropdown
                    $('#vacuum').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#vacuum').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price5').val(value.price);
                    });
                }
            });
            // Fetch data for Heater Pump dropdown
            $.ajax({
                url: '/get-heaterpump-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Heater Pump dropdown
                    $('#heaterpump').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#heaterpump').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                        $('.price6').val(value.price);
                    });
                }
            });
            // Fetch data for Ozone dropdown
            $.ajax({
                url: '/get-ozone-data/' + watervolumeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear the current options in the Ozone dropdown
                    $('#ozone').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(key, value) {
                        $('#ozone').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                        $('.price7').val(value.price);
                        gettotal();
                    });
                }
            });
        } else {
            // If the first dropdown is empty, clear the second and third dropdowns
            $('#filterDropdown').empty();
            $('#pump').empty();
            $('#light').empty();
            $('#inlets').empty();
            $('#maindrain').empty();
            $('#vacuum').empty();
            $('#heaterpump').empty();
            $('#ozone').empty();
        }
    });
});
$(document).ready(function() {
    // Event handler for changes in the 'price' and 'discount1' fields
    $('#price, #discount1 , #discount2, #qty, #saveprice').on('input', function() {
        var saveprice = parseFloat($('#saveprice').val());
        var price = parseFloat($('#price').val());
        var qty = parseFloat($('#qty').val());
        var discount1 = parseFloat($('#discount1').val()) || 0;
        var discount2 = parseFloat($('#discount2').val()) || 0;
        $('#price').val(saveprice * qty.toFixed(2));

        var sub_price = price - (price * discount1) / 100;
        var final_price = sub_price - (sub_price * discount2) / 100;

        $('#final_price').val(final_price.toFixed(2));
    });
});
</script>
<!-- Your existing HTML and script code -->

<script>
function gettotal() {
    // Select all elements with class "finalprice"
    var prices = $('.finalprice');

    // Initialize total to 0
    var total = 0;

    // Loop through each element and add its value to the total
    prices.each(function() {
        // Convert the text content of the element to a number and add to total
        total += parseFloat($(this).val());
    });
    // Display the total in an alert
    $('#total').val(total);

}
</script>

@endsection