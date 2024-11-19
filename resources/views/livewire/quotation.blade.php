<div>
    <div class="col-md-8 col-md-offset-2 contact-top">
    
        <div style="padding-top: 10px;">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
        industry's standard dummy text ever since the 1500s.</p>
        </div>
        <form id="contact-form">
            <!--<div class="col-md-3">-->
            <!--    <p class="text-left" style="padding-top: 10px;">Select Country</p>-->
            <!--    <select wire:model="selectedCountry" class="form-control input-box" id="countrySelect">-->
                   
            <!--</select>-->
            <!--</div>-->
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select State</p>
                <select wire:model="selectedState" class="form-control input-box" id="stateSelect">
            <option value="0" selected>Select State</option>
            @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select City</p>
                <select  class="form-control input-box" id="citySelect">
            <option value="0" selected>Select City</option>
            @if ($cities)
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            @endif
        </select>
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select Pincode</p>
                <input class="form-control input-box" type="text" name="pincode"> 
                <!--<select class="form-control input-box" >-->
                <!--    <option value="0" selected>Select Pincode</option>-->
                <!--    <option value="361320">361320</option>-->
                <!--    <option value="361304">361304</option>-->
                <!--</select>-->
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select feet/meter</p>
                <select class="form-control input-box" wire:model="type">
                    <option value="0" selected>Select Type</option>
                    <option value="feet">Feet</option>
                    <option value="meter">Meter</option>
                </select>
                @error('type')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
            
            {{-- <!--<div class="col-md-3">-->
            <!--    <p class="text-left" style="padding-top: 10px;">Select shape</p>-->
            <!--    <select class="form-control input-box" wire:model="shape">-->
            <!--        <option value="0" selected>Select shape</option>-->
            <!--        <option value="rectangular">rectangular</option>-->
            <!--        <option value="circular">circular</option>-->
            <!--        <option value="square">square</option>-->
            <!--    </select>-->
            <!--</div>--> --}}
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select location</p>
                <select class="form-control input-box" wire:model="location">
                    <option value="0" selected>Select location</option>
                    <option value="in ground">in ground</option>
                    <option value="in home">in home</option>
                </select>
                @error('location')
                <span class="text-danger text-xs mt-3 block">{{$message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select surface</p>
                <select class="form-control ok input-box" wire:model="surface">
                    <option value="0" selected>Select surface</option>
                    @foreach($pools as $list)
                        <option name="surfaceId" value="{{ $list['id'] }}">{{ $list['modelname'] }}</option>
                    @endforeach
                </select>
                
                @error('surface')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
    
          
            
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Select Turn Over Time</p>
                <select class="form-control input-box" wire:model="turn_over_time">
                   <option value="" selected disabled>Select Turn Over Time</option>
                   <option value="4">4</option>
                   <option value="6">6</option>
                </select>
                @error('turn_over_time')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Length</p>
                <input type="number" class="form-control" wire:model="length">
                @error('length')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Breath</p>
                <input type="number" class="form-control" wire:model="breath">
                @error('breath')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">Height</p>
                <input type="number" class="form-control" wire:model="height">
                @error('height')
                <span class="text-danger text-xs mt-3 block ">{{$message }}</span>
                @enderror
            </div>
           <div class="col-md-4">
                <p class="text-left" style="padding-top: 10px;">volume</p>
                <input type="number" class="form-control" wire:model="volume" readonly>
            </div>
            <div class="col-md-2">
                        <p class="text-left" style="padding-top: 10px;">&nbsp;</p>
                        <p class="text-left" style="">m³</p>
                    </div>
            
            <div class="col-md-6">
            <p class="text-left" hidden style="padding-top: 10px;">Water Volume</p>
            <input type="hidden" class="form-control"name="watervolume" id="watervolume" wire:model="macthed_volume" readonly>
            <input type="hidden" id="watervolumeID" wire:model="watervolumeID">
            </div>

            
            <div class="col-md-4">
                <p class="text-left" style="padding-top: 25px;"></p>
                <button type="button" class="btn btn-primary" onclick="getSelectedId()" wire:click="calculate" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="calculate">Get Quotation</span>
                    <span wire:loading wire:target="calculate">Loading...</span>
                </button>
            </div>
            
    </div>
    
   <div class="col-md-8 col-md-offset-2 contact-top">

 <!-- Filter -->
 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Filter (min)</p>
     <select class="form-control input-box" name="filter" id="filterDropdown">
         <option value=""  selected>Select Filter</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Filter Qty</p>
     <input type="number" name="filter_qty" id="filter_qty" class="form-control" wire:model="filter_qty">
 </div>

 <div class="col-md-3">
    <p class="text-left" style="padding-top: 10px;">Filter Price (₹)</p>
    <input type="number" name="filter_price" id="filter_price" class="form-control" readonly wire:model="filter_price1">

</div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Pump (min)</p>
     <select class="form-control input-box" name="pump" id="pump">
         <option value=""  selected>Select Pump</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Pump Qty</p>
     <input type="number" name="pump_qty" id="pump_qty" class="form-control" wire:model="pump_qty">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Pump Price (₹)</p>
     <input type="number" name="pump_price" id="pump_price" class="form-control" readonly  >
 </div>
 

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Light(min)</p>
     <select class="form-control input-box" name="light" id="light">
         <option value="" disabled selected>Select Light</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Light Qty</p>
     <input type="number" name="light_qty" id="light_qty" class="form-control input-box"  wire:model="light_qty">
     <input type="hidden" id="light_per_price">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Light Price (₹)</p>
     <input type="number" name="light_price" id="light_price" class="form-control price2 finalprice" readonly wire:model="light_price">
     <input type="hidden" id="light_h_price" class="form-control price2 " readonly>
 </div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Inlets (min)</p>
     <select class="form-control input-box" name="inlets" id="inlets">
         <option value="" disabled selected>Select Inlets</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Inlets Qty</p>
     <input type="number" name="inlets_qty" id="inlets_qty" class="form-control"  wire:model="inlets_qty">
     <input type="hidden" id="inlets_per_price">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Inlets Price (₹)</p>
     <input type="number" name="inlets_price" id="inlets_price" class="form-control price3 finalprice" readonly wire:model="inlets_price">
     <input type="hidden" id="inlets_h_price" class="form-control price3 " readonly>
 </div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">MainDrain (min)</p>
     <select class="form-control input-box" name="maindrain" id="maindrain">
         <option value="" disabled selected>Select MainDrain</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">MainDrain Qty</p>
     <input type="number" name="maindrain_qty" id="maindrain_qty" class="form-control" wire:model="maindrain_qty">
     <input type="hidden" id="maindrain_per_price">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">MainDrain Price (₹)</p>
     <input type="number" name="maindrain_price" id="maindrain_price" class="form-control price4 finalprice"readonly  wire:model="maindrain_price">
     <input type="hidden" id="maindrain_h_price" class="form-control price4 " readonly>
 </div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Vacuum (min)</p>
     <select class="form-control input-box" name="vacuum" id="vacuum">
         <option value="" disabled selected>Select Vacuum</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Vacuum Qty</p>
     <input type="number" name="vacuum_qty" id="vacuum_qty" class="form-control"  wire:model="vacuum_qty">
     <input type="hidden" id="vacuum_per_price">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Vacuum Price (₹)</p>
     <input type="number" name="vacuum_price" id="vacuum_price" class="form-control price5 finalprice" readonly wire:model="vacuum_price">
     <input type="hidden" id="vacuum_h_price" class="form-control price5 " readonly>
 </div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Heater (min)</p>
     <select class="form-control input-box" name="heaterpump" id="heaterpump">
         <option value="" disabled selected>Select Heater</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Heater Qty</p>
     <input type="number" name="heater_qty" id="heater_qty" class="form-control"  wire:model="heater_qty">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Heater Price (₹)</p>
     <input type="number" name="heater_price" id="heater_price" class="form-control price6 finalprice" readonly wire:model="heater_price">
     <input type="hidden" id="heater_h_price" class="form-control price6 " readonly>
 </div>

 <div class="col-md-6">
     <p class="text-left" style="padding-top: 10px;">Ozone (min)</p>
     <select class="form-control input-box" name="ozone" id="ozone">
         <option value="" disabled selected>Select Ozone</option>
     </select>
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Ozone Qty</p>
     <input type="number" name="ozone_qty" id="ozone_qty" class="form-control"  wire:model="ozone_qty">
 </div>
 <div class="col-md-3">
     <p class="text-left" style="padding-top: 10px;">Ozone Price (₹)</p>
     <input type="number" name="ozone_price" id="ozone_price" class="form-control price7 finalprice" readonly wire:model="ozone_price">
     <input type="hidden" id="ozone_h_price" class="form-control price7 " readonly>
 </div>
 <div class="col-md-12">
    <p class="text-left" style="padding-top: 10px; font-size: 18px;">Pump Total (₹)</p>
    <input type="number" name="total"  class="form-control" id="total" wire:model="pump_total" readonly>




    {{-- skimmer type form  --}}
    {{-- <form  method="POST"  id="form"> --}}
    
    @if($value == 0)
    <div class="col-md text-center">
        <label style="font-size: 40px; margin-top: 20px;">Civil Work:</label>
    </div>
    
    
    {{-- Excavation --}}

    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Excavation</p>
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="excavation" id="excavation" class="form-control price-input" readonly value="{{ $excavation }}">
    </div>
    

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Excavation Price (₹)</p>
        <input type="text" name="Excavation_price" id="Excavation_price" class="form-control price-input" readonly wire:model="Excavation_price">
    </div>

     {{-- leveling and compaction  --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">leveling and compaction </p>
       
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $leveling_compaction }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">leveling Price (₹)</p>
        <input type="text" name="leveling_price" id="leveling_price" class="form-control price-input" readonly  wire:model="leveling_price">

    </div>
     {{-- compaction test --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">compaction test </p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $compaction_test }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">compaction Price (₹)</p>
        <input type="text" name="compaction_price" id="compaction_price" class="form-control price-input" readonly  wire:model="compaction_price">
    </div>

    {{-- polyethylene sheet 1000 gauge --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">polyethylene sheet 1000 gauge</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $polyethylene_sheet_1000_gauge}}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">polyethylene Price (₹)</p>
        <input type="text" name="polyethylene_price" id="polyethylene_price" class="form-control price-input" readonly  wire:model="polyethylene_price">
    </div>


    {{--  Rubble soling 230 th --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Rubble soling 230 th</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $rubble_soling_230_th }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rubble Price(₹)</p>
        <input type="text" name="Rubble_price" id="Rubble_price" class="form-control price-input" readonly  wire:model="Rubble_price">
    </div>


    {{-- MSRC PCC 150mm thick --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">MSRC PCC 150mm thick</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $msrc_pcc_150mm_thick }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">MSRC PCC Price (₹)</p>
        <input type="text" name="MSRC_price" id="MSRC_price" class="form-control price-input" readonly wire:model="MSRC_price">
    </div>


     {{-- Moduler panels 3 mm thick 6 incch structure --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Moduler panels 3 mm thick 6 incch structure </p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $modular_panels }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Moduler panel Price(₹)</p>
        <input type="text" name="Moduler_price" id="Moduler_price" class="form-control price-input" readonly wire:model="Moduler_price">
    </div>

    {{--Overflow gutter --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Overflow gutter</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $overflow_gutter }}">
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Gutter Price(₹)</p>
        <input type="text" name="gutter_price" id="gutter_price" class="form-control price-input" readonly wire:model="gutter_price">
    </div>

    {{--Fiber lining --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Fiber lining</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $fiber_lining }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Fiber lining Price (₹)</p>
        <input type="text" name="Fiber_price" id="Fiber_price" class="form-control price-input" readonly wire:model="Fiber_price">
    </div>

    {{--1ftX1ft PAPERGLASS tiling ---}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">1ftX1ft PAPERGLASS tiling</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $paper_glass_tiling_1ft_x_1ft }}">
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">1PAPERGLASS Price(₹)</p>
        <input type="text" name="PAPERGLASS_price" id="PAPERGLASS_price" class="form-control price-input" readonly wire:model="PAPERGLASS_price" >
    </div>

     {{--Granite Coping--}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Granite Coping(min)</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $granite_coping }}">
    </div>
    
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Granite Coping Price(₹)</p>
        <input type="text" name="Granite_price" id="Granite_price_display" class="form-control price-input" readonly value="" wire:model="Granite_price">
    </div>
    

       {{--Clapms--}}
       <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Clapms</p>
    </div>
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $clamps }}">
        <input type="hidden" name="discount_percentage" id="discount_percentage" class="form-control price-input" readonly  value="{{ $discount }}">

    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Clapms Price (₹)</p>
        <input type="text" name="Clapms_price" id="Clapms_price" class="form-control price-input" readonly wire:model="Clapms_price">
    </div>


  <!-- Civil Work Total -->
<div class="col-md-12">
    <p class="text-left" style="padding-top: 10px; font-size: 18px;">Civil work Total(₹)</p>
    <input type="text" name="civil_work_total" class="form-control" id="civil_work_total"  readonly ><br>
</div>

<!-- Total pump + Civil work Total -->
<div class="col-md-12">
    <b><p class="text-left" style="padding-top: 10px; font-size: 20px;">Total cost=Total pump  (₹)+ Civil work Total (₹)</p></b>
    <input type="number" name="grand_total" class="form-control" id="grand_total" readonly>
</div>

<div class="col-md-12">
    <p class="text-left" style="padding-top: 10px; font-size: 20px;">Final price(₹)</p>
    <input type="text" name="final_price" id="final_price" class="form-control price-input" readonly >
    {{-- <input type="hidden" id="final_price" class="form-control price " readonly> --}}
</div>
   @endif


   {{-- infinity pool --}}
   {{-- <form  method="POST" id="form2"> --}}
    @if($value == 2)
    {{-- Display form for civil work if $value equals 0 --}}
       
        <div class="col-md text-center">
            <label style="font-size: 40px; margin-top: 25px;">Civil Work:</label>
        </div>
        
    
    {{-- Excavation --}}

         <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Excavation</p>
       
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $excavation1 }}">
    </div>
    
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Excavation Price (₹)</p>
        <input type="text" name="Excavation_price2" id="Excavation_price2" class="form-control price-input" readonly  wire:model="Excavation_price2">
    </div>
    
    

     {{-- leveling and compaction  --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">leveling and compaction </p>
       
    </div>
    
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $leveling_compaction1 }}">
    </div>
   

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">leveling Price (₹)</p>
        <input type="text" name="leveling_price2" id="leveling_price2" class="form-control price-input" readonly wire:model="leveling_price2">

    </div>
     {{-- compaction test --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">compaction test </p>
      
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $compaction_test1 }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">compaction Price (₹)</p>
        <input type="text" name="compaction_price2" id="compaction_price2" class="form-control price-input" readonly wire:model="compaction_price2">
    </div>

    {{-- polyethylene sheet 1000 gauge --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">polyethylene sheet 1000 gauge</p>
        
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $polyethylene_sheet_1000_gauge1 }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">polyethylene Price (₹)</p>
        <input type="text" name="polyethylene_price2" id="polyethylene_price2" class="form-control price-input" readonly wire:model="polyethylene_price2">
    </div>


    {{--  Rubble soling 230 th --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Rubble soling 230 th</p>
       
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{$rubble_soling_230_th1 }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rubble Price(₹)</p>
        <input type="text" name="Rubble_price2" id="Rubble_price2" class="form-control price-input" readonly wire:model="Rubble_price2">

    </div>


    {{-- MSRC PCC 150mm thick --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">MSRC PCC 150mm thick</p>
        
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $msrc_pcc_150mm_thick1 }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">MSRC PCC Price (₹)</p>
        <input type="text" name="MSRC_price2" id="MSRC_price2" class="form-control price-input" readonly wire:model="MSRC_price2">
    </div>


     {{-- Moduler panels 3 mm thick 6 incch structure --}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Moduler panels 3 mm thick 6 incch structure </p>
       
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $modular_panels1 }}">
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Moduler panel Price(₹)</p>
        <input type="text" name="Moduler_price2" id="Moduler_price2" class="form-control price-input" readonly wire:model="Moduler_price2">
    </div>

    {{--Overflow gutter --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Overflow gutter</p>
        
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $overflow_gutter1 }}">
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">gutter Price(₹)</p>
        <input type="text" name="gutter_price2" id="gutter_price2"class="form-control price-input" readonly wire:model="gutter_price2">
    </div>

    {{--Fiber lining --}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Fiber lining</p>
      
    </div>
   
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $fiber_lining1 }}">
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Fiber lining Price (₹)</p>
        <input type="text" name="Fiber_price2" id="Fiber_price2" class="form-control price-input" readonly wire:model="Fiber_price2">
    </div>

    {{--1ftX1ft PAPERGLASS tiling ---}}
    <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">1ftX1ft PAPERGLASS tiling</p>
      
    </div>
  
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $paper_glass_tiling_1ft_x_1ft1 }}">
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">1PAPERGLASS Price(₹)</p>
        <input type="text" name="PAPERGLASS_price2" id="PAPERGLASS_price2" class="form-control price-input" readonly wire:model="PAPERGLASS_price2">
    </div>

     {{--Granite Coping--}}
     <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Granite Coping(min)</p>
        
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $granite_coping1 }}">
    </div>
    
    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Granite Coping Price(₹)</p>
        <input type="text" name="Granite_price2" id="Granite_price2" class="form-control price-input" readonly wire:model="Granite_price2">
    </div>

       {{--Clapms--}}
       <div class="col-md-6">
        <p class="text-left" style="padding-top: 10px;">Clapms</p>
       
    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
        <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $clamps1 }}">

    </div>

    <div class="col-md-3">
        <p class="text-left" style="padding-top: 10px;">Clapms Price (₹)</p>
        <input type="text" name="Clapms_price2" id="Clapms_price2" class="form-control price-input" readonly wire:model="Clapms_price2">
    </div>


  <!-- Civil Work Total -->
<div class="col-md-12">
    <p class="text-left" style="padding-top: 10px; font-size: 18px;">Civil work Total(₹)</p>
    <input type="text" name="civil_work_total2" class="form-control" id="civil_work_total2"  readonly><br>
</div>

<!-- Total pump + Civil work Total -->
<div class="col-md-12">
    <b><p class="text-left" style="padding-top: 10px; font-size: 20px;">Total cost=Total pump  (₹)+ Civil work Total (₹)</p></b>
    <input type="number" name="grand_total2" class="form-control" id="grand_total2" readonly>
</div>
<div class="col-md-12">
    <p class="text-left" style="padding-top: 10px; font-size: 20px;">Final price(₹)</p>
    <input type="text" name="final_price2" id="final_price2" class="form-control price-input" readonly >
</div>
   @endif


    {{-- overflow type form  --}}
    {{-- <form  method="POST" id="form3"> --}}
    
        @if($value == 3)
        <div class="col-md text-center">
            <label style="font-size: 40px; margin-top: 20px;">Civil Work:</label>
        </div>
        
        
        {{-- Excavation --}}
    
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Excavation</p>
        </div>
    
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="excavation" id="excavation" class="form-control price-input" readonly value="{{ $excavation2 }}">
        </div>
        
       
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Excavation Price (₹)</p>
            <input type="text" name="Excavation_price3" id="Excavation_price3" class="form-control price-input" readonly wire:model="Excavation_price3">
        </div>
    
         {{-- leveling and compaction  --}}
         <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">leveling and compaction </p>
           
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $leveling_compaction2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">leveling Price (₹)</p>
            <input type="text" name="leveling_price3" id="leveling_price3" class="form-control price-input" readonly  wire:model="leveling_price3">
    
        </div>
         {{-- compaction test --}}
         <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">compaction test </p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $compaction_test2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">compaction Price (₹)</p>
            <input type="text" name="compaction_price3" id="compaction_price3" class="form-control price-input" readonly  wire:model="compaction_price3">
        </div>
    
        {{-- polyethylene sheet 1000 gauge --}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">polyethylene sheet 1000 gauge</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $polyethylene_sheet_1000_gauge2}}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">polyethylene Price (₹)</p>
            <input type="text" name="polyethylene_price3" id="polyethylene_price3" class="form-control price-input" readonly  wire:model="polyethylene_price3">
        </div>
    
    
        {{--  Rubble soling 230 th --}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Rubble soling 230 th</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $rubble_soling_230_th2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rubble Price(₹)</p>
            <input type="text" name="Rubble_price3" id="Rubble_price3" class="form-control price-input" readonly  wire:model="Rubble_price3">
            <input type="hidden" id="Rubble_price" class="form-control price" readonly>
        </div>
    
    
        {{-- MSRC PCC 150mm thick --}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">MSRC PCC 150mm thick</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $msrc_pcc_150mm_thick2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">MSRC PCC Price (₹)</p>
            <input type="text" name="MSRC_price3" id="MSRC_price3" class="form-control price-input" readonly wire:model="MSRC_price3">
            <input type="hidden" id="MSRC_price" class="form-control price " readonly>
        </div>
    
    
         {{-- Moduler panels 3 mm thick 6 incch structure --}}
         <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Moduler panels 3 mm thick 6 incch structure </p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $modular_panels2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Moduler panel Price(₹)</p>
            <input type="text" name="Moduler_price3" id="Moduler_price3" class="form-control price-input" readonly wire:model="Moduler_price3">
            <input type="hidden" id="Moduler_price" class="form-control price"  readonly>
        </div>
    
        {{--Overflow gutter --}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Overflow gutter</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $overflow_gutter2 }}">
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Gutter Price(₹)</p>
            <input type="text" name="gutter_price3" id="gutter_price3" class="form-control price-input" readonly wire:model="gutter_price3">
            <input type="hidden" id="gutter_price" class="form-control price" readonly>
        </div>
    
        {{--Fiber lining --}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Fiber lining</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $fiber_lining2 }}">
        </div>
       
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Fiber lining Price (₹)</p>
            <input type="text" name="Fiber_price3" id="Fiber_price3" class="form-control price-input" readonly wire:model="Fiber_price3">
            <input type="hidden" id="Fiber_price" class="form-control price" readonly>
        </div>
    
        {{--1ftX1ft PAPERGLASS tiling ---}}
        <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">1ftX1ft PAPERGLASS tiling</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $paper_glass_tiling_1ft_x_1ft2 }}">
        </div>
    
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">1PAPERGLASS Price(₹)</p>
            <input type="text" name="PAPERGLASS_price3" id="PAPERGLASS_price3" class="form-control price-input" readonly wire:model="PAPERGLASS_price3" >
            <input type="hidden" id="PAPERGLASS_price" class="form-control price " readonly>
        </div>
    
         {{--Granite Coping--}}
         <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Granite Coping(min)</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly value="{{ $granite_coping2 }}">
        </div>
        
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Granite Coping Price(₹)</p>
            <input type="text" name="Granite_price3" id="Granite_price3" class="form-control price-input" readonly value="" wire:model="Granite_price3">
            <input type="hidden" id="Granite_price_hidden" class="form-control price" readonly>
        </div>
        
    
           {{--Clapms--}}
           <div class="col-md-6">
            <p class="text-left" style="padding-top: 10px;">Clapms</p>
        </div>
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Rate/Sqm</p>
            <input type="text" name="" id="" class="form-control price-input" readonly  value="{{ $clamps2 }}">
            <input type="hidden" name="discount_percentage3" id="discount_percentage3" class="form-control price-input" readonly  value="{{ $discount }}">
    
        </div>
    
        <div class="col-md-3">
            <p class="text-left" style="padding-top: 10px;">Clapms Price (₹)</p>
            <input type="text" name="Clapms_price3" id="Clapms_price3" class="form-control price-input" readonly wire:model="Clapms_price3">
            <input type="hidden" id="Clapms_price" class="form-control price " readonly>
        </div>
    
    
      <!-- Civil Work Total -->
    <div class="col-md-12">
        <p class="text-left" style="padding-top: 10px; font-size: 18px;">Civil work Total(₹)</p>
        <input type="text" name="civil_work_total" class="form-control" id="civil_work_total"  readonly ><br>
    </div>
    
    <!-- Total pump + Civil work Total -->
    <div class="col-md-12">
        <b><p class="text-left" style="padding-top: 10px; font-size: 20px;">Total cost=Total pump  (₹)+ Civil work Total (₹)</p></b>
        <input type="number" name="grand_total" class="form-control" id="grand_total" readonly>
    </div>
    
    <div class="col-md-12">
        <p class="text-left" style="padding-top: 10px; font-size: 20px;">Final price(₹)</p>
        <input type="text" name="final_price" id="final_price" class="form-control price-input" readonly >
        {{-- <input type="hidden" id="final_price" class="form-control price " readonly> --}}
    </div>
       @endif
    
    


     <div class="col-md-12" >
     <button type="button" class="btn btn-primary" style="margin-top:20px;"  wire:click="generatePDF" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="generatePDF" >generatePDF</span>
                <span wire:loading wire:target="generatePDF">Loading...</span>
            </button>
     </div>
    </form>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to calculate and update totals
            function calculateAndUpdateTotals() {
                var pumpTotal = 0;
        
                // Loop through each quantity and price to calculate totals
                $('.qty').each(function() {
                    var quantity = parseFloat($(this).val()) || 0; // Default to 0 if NaN
                    var Price = parseFloat($(this).data('Price')) || 0; // Assuming data-price holds the base price
                    
                    // Calculate total for the current item
                    pumpTotal += quantity * Price; 
                });
        
                // Update total field
                $('#total').val(pumpTotal.toFixed(2));
        
                // Calculate grand total by adding civil work total
                var civilWorkTotal = parseFloat($('#civil_work_total').val().replace(/,/g, '')) || 0;
                var civilWorkTotal2 = parseFloat($('#civil_work_total2').val().replace(/,/g, '')) || 0;

                
                var grandTotal = pumpTotal + civilWorkTotal;
                var grandTotal = pumpTotal + civilWorkTotal2;

        
                // Update grand total field
                $('#grand_total').val(grandTotal.toFixed(2));
            }
        
            // Event handlers for quantity inputs
            $('.qty').on('input', function() {
                calculateAndUpdateTotals();
            });
        
            // Attach additional event handlers as needed for other inputs (like filter, pump, etc.)
            $('#filter_qty').on('input', function() {
                var filter_qty = parseFloat($(this).val()) || 0;
                var filter_price = parseFloat($('#filter_price').val()) || 0;
                var total = filter_price * filter_qty;
                $('#filter_price').val(total.toFixed(2));
                calculateAndUpdateTotals();
            });
        
            // Similarly, repeat for other quantities and relevant fields...
        
        });
        </script>
        
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Add jQuery script -->

    <script>
        $(document).ready(function () {
            $('#stateSelect').on('change', function () {
                var stateId = $(this).val();
                if (stateId) {
                    Livewire.emit('updateStateOptions', stateId);
                } else {
                    Livewire.emit('resetCities');
                }
            });
        });
    </script>
    <script>
        
    $('.ok').change(function() {
      var selectedValue = $(this).val();
    });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('calculationDone', function () {
                var watervolumeId = $('#watervolumeID').val();
    
                if (watervolumeId) {

                    console.log(watervolumeId);
                    // alert('hi11');

                    // Fetch filtered data for Filter dropdown
                    $.ajax({
                        url: '/get-filtered-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Filter dropdown
                            $('#filterDropdown').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#filterDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                                console.log(value.price);
                                $('#filter_price').val(value.price);
                                gettotal();
                            });
                        // alert('hi');
                        }
                    });
    

                    
                    // Fetch data for Pump dropdown
                    $.ajax({
                        url: '/get-pump-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Pump dropdown
                            $('#pump').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#pump').append('<option value="' + value.id + '">' + value.name + '</option>');
                                console.log(value.price);

                                $('#pump_price').val(value.price);
                                gettotal();
                                
                                
                            });
                        }
                    });


                    // $.ajax({
                    //     url: '/get-filtered-data/' + watervolumeId,
                    //     type: 'GET',
                    //     dataType: 'json',
                    //     success: function (data) {

                    //         // Clear the current options in the Filter dropdown
                    //         $('#pump').empty();
    
                    //         // Add the new options based on the fetched data
                    //         $.each(data, function (key, value) {
                    //             $('#pump').append('<option value="' + value.id + '">' + value.name + '</option>');
                    //             console.log(value.price);
                    //             $('#pump_price').val(value.price);
                    //             gettotal();
                    //         });
                    //     // alert('hi');
                    //     }
                    // });
                    // Fetch data for Light dropdown
                    $.ajax({
                        url: '/get-light-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Light dropdown
                            $('#light').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#light').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('#light_qty').val(value.name).attr('min', value.name);
                                $('.price2').val(value.price * value.name);
                                $('#light_per_price').val(value.price);
                                gettotal();
                            });
                        }
                    });
                    // Fetch data for Inlets dropdown
                    $.ajax({
                        url: '/get-inlet-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Inlets dropdown
                            $('#inlets').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#inlets').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('#inlets_qty').val(value.name).attr('min', value.name);
                                 $('.price3').val(value.price * value.name);
                                 $('#inlets_per_price').val(value.price);
                                //  alert(value.name)
                                 gettotal();
                            });
                        }
                    });
                    // Fetch data for MainDrain dropdown
                    $.ajax({
                        url: '/get-maindrain-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the MainDrain dropdown
                            $('#maindrain').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#maindrain').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('#maindrain_qty').val(value.name).attr('min', value.name);
                                 $('.price4').val(value.price * value.name);
                                 $('#maindrain_per_price').val(value.price);
                                 gettotal();
                            });
                        }
                    });
                    // Fetch data for Vacuum dropdown
                    $.ajax({
                        url: '/get-vacuum-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Vacuum dropdown
                            $('#vacuum').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#vacuum').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('#vacuum_qty').val(value.name).attr('min', value.name);
                                $('.price5').val(value.price * value.name);
                                $('#vacuum_per_price').val(value.price);
                                gettotal();
                            });
                        }
                    });
                    // Fetch data for Heater Pump dropdown
                    $.ajax({
                        url: '/get-heaterpump-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Heater Pump dropdown
                            $('#heaterpump').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#heaterpump').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('.price6').val(value.price);
                                
                                gettotal();
                            });
                        }
                    });
                    // Fetch data for Ozone dropdown
                    $.ajax({
                        url: '/get-ozone-data/' + watervolumeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Clear the current options in the Ozone dropdown
                            $('#ozone').empty();
    
                            // Add the new options based on the fetched data
                            $.each(data, function (key, value) {
                                $('#ozone').append('<option value="' + value.id + '">' + value.name + '</option>');
                                $('.price7').val(value.price);
                                gettotal();
                            });
                        }
                    });
                } 
            });
        });
    </script>
    <script>
        function getSelectedId() {
            console.log('Button clicked!');
        }
    </script>
    

<script>
    // Function to parse the input value, handle commas, and empty values gracefully
   function parsePrice(value) {
       return parseFloat(value.replace(/,/g, '')) || 0;
   }
   
   function gettotal() {
       // Get all elements with class .finalprice and calculate their total
       var prices = $('.finalprice');
       var total = 0;
   
       // Loop through each .finalprice field and add its value to the total
       prices.each(function() {

           total += parsePrice($(this).val());
       });
   
       // Set the Pumping Total to the #total field
       $('#total').val(total.toFixed(2));
       
       // Array of civil work price input fields to sum up
       var civilWorkPrices = [
           parsePrice($('#Excavation_price').val()),
           parsePrice($('#leveling_price').val()),
           parsePrice($('#compaction_price').val()),
           parsePrice($('#polyethylene_price').val()),
           parsePrice($('#Rubble_price').val()),
           parsePrice($('#MSRC_price').val()),
           parsePrice($('#gutter_price').val()),
           parsePrice($('#Moduler_price').val()),
           parsePrice($('#Fiber_price').val()),
           parsePrice($('#PAPERGLASS_price').val()),
           parsePrice($('#Granite_price_display').val()),
           parsePrice($('#Clapms_price').val()),
       ];
   
   // Calculate the total of civil work prices
   var civilWorkTotal = civilWorkPrices.reduce((sum, price) => sum + price, 0);
   
   // Set the civil work total back to the #civil_work_total field
   $('#civil_work_total').val(civilWorkTotal.toFixed(2));


   
   // Calculate the grand total (Pumping Total + Civil Work Total)
   var grandTotal = total + civilWorkTotal;
   
   // Set the grand total to the #grand_total field
   $('#grand_total').val(grandTotal.toFixed(2)); // Set with two decimal places


   
   // Get the discount percentage value from an input field (e.g., #discount_percentage)
   var discountPercentage = parseFloat($('#discount_percentage').val());
   
   // Check if discount is valid, otherwise set it to 0
   if (isNaN(discountPercentage) || discountPercentage === "") {
       discountPercentage = 0;
   }
   
   // Calculate the discount amount
   var discountAmount = (grandTotal * (discountPercentage / 100));
   
   // Calculate the final price after applying the discount
   var finalPrice = grandTotal - discountAmount;
   
   // Set the final price to the #final_price field
   $('#final_price').val(finalPrice.toFixed(2)); // Set with two decimal places
   }
   // Call gettotal when input fields change
   $(document).on('input', '.price-input', function() {
       gettotal();
   });
   


    
$(document).ready(function() {
        // Event handler for changes in the 'price' and 'discount1' fields
        $('#filter_qty').on('input', function() {
            
            var filter_qty = parseFloat($('#filter_qty').val()) || 0;
            var filter_price = parseFloat($('#filter_h_price').val()) || parseFloat($('#filter_price').val());
            
            var total = filter_price * filter_qty;
             $('#filter_price').val(total.toFixed(2));
             gettotal();

        });
        $('#pump_qty').on('input', function() {

            var pump_qty = parseFloat($('#pump_qty').val()) || 1;
            // var pump_price = parseFloat($('#pump_h_price').val()) || parseFloat($('#pump_price').val());

            var total = pump_qty * pump_price;
             $('#pump_price').val(total.toFixed(2));
             gettotal();

        });
        $('#light_qty').on('input', function() {

            var light_qty = parseFloat($('#light_qty').val()) || 1;
            var light_price = parseFloat($('#light_per_price').val());
            
            var total = light_qty * light_price;

             $('#light_price').val(total.toFixed(2));
             gettotal();

        });
        $('#inlets_qty').on('input', function() {
            var inlets_qty = parseFloat($('#inlets_qty').val()) || 1;
            var inlets_price = parseFloat($('#inlets_per_price').val());
            
            var total = inlets_qty * inlets_price;

             $('#inlets_price').val(total.toFixed(2));
             gettotal();

        });
        $('#maindrain_qty').on('input', function() {
            var maindrain_qty = parseFloat($('#maindrain_qty').val()) || 1;
            var maindrain_price = parseFloat($('#maindrain_per_price').val());
            
            var total = maindrain_qty * maindrain_price;

             $('#maindrain_price').val(total.toFixed(2));
             gettotal();

        });
        $('#vacuum_qty').on('input', function() {
            var vacuum_qty = parseFloat($('#vacuum_qty').val()) || 1;
            var vacuum_price = parseFloat($('#vacuum_per_price').val());
            
            var total = vacuum_qty * vacuum_price;

             $('#vacuum_price').val(total.toFixed(2));
             gettotal();
        });
        $('#heater_qty').on('input', function() {
            var heater_qty = parseFloat($('#heater_qty').val()) || 1;
            var heater_price = parseFloat($('#heater_h_price').val()) || parseFloat($('#heater_price').val());
            
            var total = heater_qty * heater_price;

             $('#heater_price').val(total.toFixed(2));
             gettotal();
        });
        $('#ozone_qty').on('input', function() {
            var ozone_qty = parseFloat($('#ozone_qty').val()) || 1;
            var ozone_price = parseFloat($('#ozone_h_price').val()) || parseFloat($('#ozone_price').val());
            
            var total = ozone_qty * ozone_price;

             $('#ozone_price').val(total.toFixed(2));
             gettotal();
        });
    });
    
    $(document).ready(function() {
        // Update the 'price' field whenever 'excavation' changes
        $('#excavation').on('input', function() {
            var excavationValue = $(this).val();
            $('#price').val(excavationValue);
        });
    });


    </script>

  
