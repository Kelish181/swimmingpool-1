@extends('fornt/layout')
@section('page_title','Quotation')
@section('qotation_select','active')
@section('container')
 
 <section class="main" id="pages">

        <!-- Title -->
        <div class="page-title overlay" style="background: url('{{asset('fornt/assets/images/img/slider-bg.jpg')}}'); background-size: cover;">
            <h2>Quotation</h2>
        </div>
        <!-- End of Title -->

    </section>
    <!-- ===== End of Main Page Section ===== -->



<!-- ===== Start of Contact Section ===== -->
    <section id="contact" >
        <div class="container">
            <div class="col-md-12 pad80">
                <h2 class="section-title">send us a message</h2>
            </div>

            <!-- Start of Contact Form -->
            <div class="col-md-8 col-md-offset-2 contact-top">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                <!-- start of form -->
                <form id="contact-form">

                    <!-- contact result -->
                    <div id="contact-result"></div>
                    <!-- end of contact result -->

                    <div class="col-md-12">
                        <input class="form-control input-box" type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="col-md-12">
                        <input class="form-control input-box" type="email" name="email" placeholder="your@email.com">
                    </div>
                    <div class="col-md-12">
                        <input class="form-control input-box" type="tel" name="phone" placeholder="Phone Number">
                    </div>

                    <div class="col-md-12">
                        <input class="form-control input-box" type="text" name="subject" placeholder="Subject">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control textarea-box" rows="8" name="message" placeholder="Type your message..."></textarea>
                        <button class="btn" type="submit">Send your message</button>
                    </div>
                </form>
                <!-- end of form -->

            </div>
            <!-- End of Contact Form -->
        </div>
    </section>

@endsection