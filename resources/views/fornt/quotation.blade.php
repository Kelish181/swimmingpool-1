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
                <h2 class="section-title">Quotation</h2>
            </div>

            <!-- Start of Contact Form -->
            <div class="col-md-8 col-md-offset-2 contact-top">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                <!-- start of form -->

                   <form id="contact-form ">
                   <div class="col-md-12">
                                <p class="text-left pt-3"> Sacrifical Pools </p>
                                <select class="form-control input-box" name="sacrificialpools">
                                    <option value="" disabled selected>Select Sacrifical Pools</option>
                                    @foreach($sacrificialpools as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            
                        </div> 
                        <div class="col-md-12" >
                               <p class="text-left" style="padding-top: 10px;">Water Volume</p>
                                <select class="form-control input-box" name="watervolume">
                                    <option value="" disabled selected>Select Water Volume</option>
                                    @foreach($watervolume as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Filter</p>
                                <select class="form-control input-box" name="filter">
                                    <option value="" disabled selected>Select Filter</option>
                                    @foreach($filter as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                               
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Pump</p>
                                <select class="form-control input-box" name="pump">
                                    <option value="" disabled selected>Select Pump</option>
                                    @foreach($pump as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Light</p>
                                <select class="form-control input-box" name="light">
                                    <option value="" disabled selected>Select Light</option>
                                    @foreach($light as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Inlets</p>
                                <select class="form-control input-box" name="inlets">
                                    <option value="" disabled selected>Select Inlets</option>
                                    @foreach($inlets as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                                
                    </div>
                    <div class="col-md-12">
                               <p class="text-left" style="padding-top: 10px;">Maindrain</p>
                                <select class="form-control input-box" name="maindrain">
                                    <option value="" disabled selected>Select Maindrain</option>
                                    @foreach($maindrain as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Vaccum</p>
                                <select class="form-control input-box" name="vaccum">
                                    <option value="" disabled selected>Select Vaccum</option>
                                    @foreach($vaccum as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Heaterpump</p>
                                <select class="form-control input-box" name="heaterpump">
                                    <option value="" disabled selected>Select Heaterpump</option>
                                    @foreach($heaterpump as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>
                    <div class="col-md-12">
                                <p class="text-left" style="padding-top: 10px;">Ozone</p>
                                <select class="form-control input-box" name="ozone">
                                    <option value="" disabled selected>Select Ozone</option>
                                    @foreach($ozone as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> 
                    </div>

                </form>
                
            </div>
            <!-- End of Contact Form -->
        </div>
    </section>

@endsection