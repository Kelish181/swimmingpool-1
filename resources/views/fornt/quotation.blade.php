@extends('fornt/layout')
@section('page_title','Quotation')
@section('quotation_select','active')
@section('container')

<section class="main" id="pages">
    <!-- Title -->
    <div class="page-title overlay"
        style="background: url('{{ asset('fornt/assets/images/img/slider-bg.jpg') }}'); background-size: cover;">
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
        <div class="col-md-8 col-md-offset-2 contact-top">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('inquiry') }}" method="POST">
                @csrf
                <div class="col-md-12" style="padding-top: 10px;">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    @error('name')
                        <span class="text-danger text-xs mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12" style="padding-top: 10px;">
                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                    @error('email')
                        <span class="text-danger text-xs mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12" style="padding-top: 10px;">
                    <input type="number" name="number" id="phone_number" class="form-control" placeholder="Phone number" required>
                    @error('number')
                        <span class="text-danger text-xs mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12" style="padding-top: 10px; padding-bottom: 15px;">
                    <textarea name="subject" id="message" class="form-control" placeholder="Message" required></textarea>
                    @error('subject')
                        <span class="text-danger text-xs mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Livewire Quotation Component -->
        <div>
            <livewire:quotation/>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
