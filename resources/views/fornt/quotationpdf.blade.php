<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container
        {
            margin-left: 20px;
            margin-right: 20px;
        }
        .from {
            display: flex;
        }

        .col-2 {
            width: 100%;
            text-align: end;

        }

        .subject {
            margin-top: 20px;
        }

        .content {
            margin-top: 20px;
        }

        .title {
            margin-top: 20px;
            text-align: center;
            font-weight: bolder;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        table {
            margin-top: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .table1{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row from">
            <div class="col-1">
                To,
            </div>
            <div class="col-2 date">
                Date: {{ $date }}
            </div>
        </div>
        <span>Mr. Ananth</span><br>
        <span>Bangalor</span>
        <div class="row">
            <div class="subject">
                <span>Subject: Quotation for [{{$length}}m x {{$breath}}m] Skimmer type Modular swimming pool.
                    <br>
                    Ref: Van/tbh/Rum/C3989ED</span>
            </div>
            <div class="content">
                <span>Dear Sir,</span><br>
                <span>Please find the Quote below for above said subject, should you have any clarification please free
                    to contact the
                    undersigned. Looking forward to serve you the best.</span>
            </div>
        </div>
        <div class="title">
            <p>
                TBN Modular swimming pool systems
                <br>
                Design criteria for Skimmer type Swimming Pool
            </p>
        </div>
        <table class="table1">
            <tr>
                <td>No</td>
                <td>Description</td>
                <td>Main Pool</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Shape</td>
                <td>{{$shape}}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Size</td>
                <td>{{$size}}m</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Depth of pool</td>
                <td>{{$depth_of_pool}}m</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pool water depth</td>
                <td>{{$pool_water_depth}}m</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Floor Area
                </td>
                <td>{{$floor_area}}m2
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Volume of Pool
                </td>
                <td>{{$volume_of_pool}}m3

                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Volume of water
                </td>
                <td>{{$volume_of_water}}m3

                </td>
            </tr>
            <tr>
                <td>9</td>
                <td>Depth of pool</td>
                <td>{{$depth_of_pool}}m
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Total volume of water
                </td>
                <td>{{$total_volume_of_water}}m3

                </td>
            </tr>
            <tr>
                <td>11</td>
                <td>Turnover Time
                </td>
                <td>{{$turnover_time}}hrs
                </td>
            </tr>
            <tr>
                <td>12</td>
                <td>Flow rate</td>
                <td>{{$flow_rate}}/hr
                </td>
            </tr>
            <tr>
                <td>13</td>
                <td>Surface draw
                </td>
                <td>{{$surface_draw}} type
                </td>
            </tr>
            <tr>
                <td>14</td>
                <td>Main draw off</td>
                <td>{{$main_draw_off}} 
                </td>
            </tr>
        </table>


        <div class="title">
            Design criteria for Skimmer type Swimming Pool - Pump Room (Client Scope)

        </div>
        <table>
            <tr>
                <td>No</td>
                <td>Description</td>
                <td>Pump Room
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Shape</td>
                <td>{{$shape}}
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Location</td>
                <td>{{$location}}
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Size required
                </td>
                <td>{{$size_required}}m
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Coefficient
                </td>
                <td>{{$coefficient}}

                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Depth

                </td>
                <td>{{$depth}}m

                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Area
                </td>
                <td>{{$area}}m2

                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Volume of water
                </td>
                <td>Sump not required
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Walls
                </td>
                <td>{{$walls}}
                </td>
            </tr>
            <tr>
                <td>9a</td>
                <td>Depth of pool</td>
                <td>Water filling Line Ø 1"

                </td>
            </tr>
            <tr>
                <td>b</td>
                <td>
                </td>
                <td>Backwash line Ø 2" required


                </td>
            </tr>
            <tr>
                <td>c</td>
                <td>
                </td>
                <td>Floor drain required

                </td>
            </tr>
            <tr>
                <td>d</td>
                <td></td>
                <td>Isolator as per rating

                </td>
            </tr>
            <tr>
                <td>e</td>
                <td>
                </td>
                <td>Lighting

                </td>
            </tr>
            <tr>
                <td>f</td>
                <td></td>
                <td>Ventilation
                </td>
            </tr>
        </table><br><br><br>

        <div class="title">
                    Pump quotation </div>
    
        <table>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Quantity</td>
                <td>Price</td>

            </tr>
            <tr>
                <tr>
                    <td>1</td>
                    <td>Filter</td>
                    <td>{{$filter_qty }}</td>
                    <td>{{$filter_price }}</td>

                </tr>

                <tr>
                    <td>2</td>
                    <td>Pump</td>
                    <td>{{$pump_qty}}</td>
                    <td>{{$pump_price }}</td>
                </tr>
                
            <tr>
                <td>3</td>
                <td>Light</td>
                <td>{{$light_qty}}</td>
                <td>{{$light_price }}</td>

            </tr>
            <tr>
                <td>4</td>
                <td>Inlets</td>                
                <td>{{$inlets_qty}}</td>
                <td>{{$inlets_price }}</td>

            </tr>
            <tr>
                <td>5</td>
                <td>MainDrain</td>
                <td>{{$maindrain_qty}}</td>
                <td>{{$maindrain_price }}</td>

            </tr>
            <tr>
                <td>6</td>
                <td>Vacuum</td>
                <td>{{$vacuum_qty}}</td>
                <td>{{$vacuum_price }}</td>

            </tr>
            <tr>
                <td>7</td>
                <td>Heater </td>             
                <td>{{$heater_qty}}</td>
                <td>{{$heater_price }}</td>
            
            </tr>
            <tr>
                <td>8</td>
                <td>Ozone</td>               
                <td>{{$ozone_qty}}</td>
                <td>{{$ozone_price }}</td>

            </tr>
            <td style="font-weight: bold; font-size: 20px;">9</td>
            <td>Pump total =</td>               
               
            <td style="font-weight: bold; font-size: 30px;">{{$pump_total}}</td>

        </table>
        {{-- {{dd($surfaceId)}}; --}}
        @if($surfaceId == 14)
        <div class="title">
            Civil work (Skimmer type pool)</div>
        <table>
            <tr>
                <td>No</td>
                <td>name</td>
                <td>Rate/Sqm</td>
                <td>Price</td>
            </tr>
            <tr>
                <td>1</td>
                <td>excavation</td>
                <td>{{$excavation}}
                <td>{{$Excavation_price}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>leveling and compaction</td>
                <td>{{$leveling_compaction}}
                <td>{{$leveling_price}}</td>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>compaction test </td>            
                <td>{{$compaction_test}}</td>               
                <td>{{$compaction_price}}</td>

            </tr>
            <tr>
                <td>4</td>
                <td>polyethylene sheet 1000 gauge</td>    
                <td>{{$polyethylene_sheet_1000_gauge}}</td>
                <td>{{$polyethylene_price}}</td>

            </tr>
            <tr>
                <td>5</td>
                <td>Rubble soling 230 th</td>
                <td>{{$rubble_soling_230_th}}</td>
                <td>{{$Rubble_price}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>MSRC PCC 150mm thick </td>              
               <td>{{$msrc_pcc_150mm_thick}}</td>
               <td>{{$MSRC_price}}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Moduler panels 3 mm thick 6 incch structure</td>
                <td>{{$modular_panels}}</td>  
                <td>{{$leveling_price}}</td>          
            </tr>
            <tr>
                <td>8</td>
                <td>Overflow gutter</td>
                <td>{{$overflow_gutter}}</td>
                <td>{{$gutter_price}}</td>

            </tr>
            <tr>
                <td>9</td>
                <td>Fiber lining</td>
                <td>{{$fiber_lining}}</td>
                <td>{{$Fiber_price}}</td>

            </tr>
            <tr>
                <td>10</td>
                <td>1ftX1ft PAPERGLASS tiling</td>
                <td>{{$paper_glass_tiling_1ft_x_1ft}} </td>
                <td>{{$PAPERGLASS_price}}</td>

            </tr>
            <tr>
                <td>11</td>
                <td>Granite Coping</td>
                <td>{{$granite_coping}} </td>              
                <td>{{$Granite_price}}</td>

            </tr>
            <tr>
                <td>12</td>
                <td>Clapms</td>
                <td>{{$clamps}} </td>
                <td>{{$Clapms_price}}</td>


            </tr>
            <tr>
                <td>13</td>
                <td>Civil work Total</td>
                <td>{{$civil_work_total}}</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Total cost =Total pump + Civil work Total</td>
                <td>{{$grand_total}}
                </td>
            </tr>
            <tr>
                <td>15</td>
                <td>Final price(₹)</td>
                <td>{{$final_price}}
                </td>
            </tr>
        </table>
       
        <body>
            <h1>Product Cart</h1>
        
            <table border="1" cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($cart_items)
                    @foreach ($cart_items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['total'] }}</td>
                        </tr>
                    @endforeach
                @endisset
                
                </tbody>
            </table>
        
            {{-- <h2>Total Final Price: ₹{{ $final_price }}</h2> --}}
        
        </body>



        @elseif($surfaceId == 15)

        <div class="title">
            Civil work (Infinity type pool)
</div>

<table>
    <tr>
        <td>No</td>
        <td>name</td>
        <td>Rate/Sqm</td> 
        <td>price</td>        
    </tr>
    <tr>
        <td>1</td>
        <td>excavation</td>
        <td>{{$excavation1}}</td>
        <td>{{$Excavation_price2}}</td>

    </tr>
    <tr>
        <td>2</td>
        <td>leveling and compaction</td>
        <td>{{$leveling_compaction1}}</td>
        <td>{{$leveling_price2}}</td>

    </tr>
    <tr>
        <td>3</td>
        <td>compaction test</td>
        <td>{{$compaction_test1}}</td>
        <td>{{$compaction_price2}}</td>

    </tr>
    <tr>
        <td>4</td>
        <td>polyethylene sheet 1000 gauge</td>
        <td>{{$polyethylene_sheet_1000_gauge1}}</td>
        <td>{{$polyethylene_price2}}</td>

    </tr>
    <tr>
        <td>5</td>
        <td>Rubble soling 230 th</td>
        <td>{{$rubble_soling_230_th1}}</td>
        <td>{{$Rubble_price2}}</td>

    </tr>
    <tr>
        <td>6</td>
        <td>MSRC PCC 150mm thick  </td>
       <td>{{$msrc_pcc_150mm_thick1}}</td>
       <td>{{$MSRC_price2}}</td>

    </tr>
    <tr>
        <td>7</td>
        <td>Moduler panels 3 mm thick 6 incch structure</td>      
        <td>{{$modular_panels1}}</td> 
        <td>{{$Moduler_price2}}</td>              
             
    </tr>
    <tr>
        <td>8</td>
        <td>Overflow gutter</td>      
        <td>{{$overflow_gutter1}}</td>
        <td>{{$gutter_price2}}</td>

        
    </tr>
    <tr>
        <td>9</td>
        <td>Fiber lining</td>
        <td>{{$fiber_lining1}}</td>
        <td>{{$Fiber_price2}}</td>

    </tr>
    <tr>
        <td>10</td>
        <td>1ftX1ft PAPERGLASS tiling</td>
        <td>{{$paper_glass_tiling_1ft_x_1ft1}} </td>
        <td>{{$PAPERGLASS_price2}} </td>

    </tr>
    <tr>
        <td>11</td>
        <td>Granite Coping</td>
        <td>{{$granite_coping1}} </td>
            <td>{{$Granite_price2}} </td>


       
    </tr>
    <tr>
        <td>12</td>
        <td>Clapms</td>
        <td>{{$clamps1}}</td>
        <td>{{$Clapms_price2}}</td>


    </tr>
    <tr>
        <td>13</td>
        <td>Civil work Total</td>
        <td>{{$civil_work_total}}</td>
    </tr>
    <tr>
        <td>14</td>
        <td>Total cost =Total pump + Civil work Total</td>
        <td>{{$grand_total}}</td>
    </tr>
    <tr>
        <td>15</td>
        <td>Final price(₹)</td>
        <td>{{$final_price}}
        </td>
    </tr>
</table>
@elseif($surfaceId == 16)

<div class="title">
    Civil work (Overflow type pool)
</div>

        <table>
        <tr>
        <td>No</td>
        <td>name</td>
        <td>Rate/Sqm</td> 
        <td>price</td>        
        </tr>
        <tr>
        <td>1</td>
        <td>excavation</td>
        <td>{{$excavation2}}</td>
        <td>{{$Excavation_price3}}</td>

        </tr>
        <tr>
        <td>2</td>
        <td>leveling and compaction</td>
        <td>{{$leveling_compaction2}}</td>
        <td>{{$leveling_price3}}</td>

        </tr>
        <tr>
        <td>3</td>
        <td>compaction test</td>
        <td>{{$compaction_test2}}</td>
        <td>{{$compaction_price3}}</td>

        </tr>
        <tr>
        <td>4</td>
        <td>polyethylene sheet 1000 gauge</td>
        <td>{{$polyethylene_sheet_1000_gauge2}}</td>
        <td>{{$polyethylene_price3}}</td>

        </tr>
        <tr>
        <td>5</td>
        <td>Rubble soling 230 th</td>
        <td>{{$rubble_soling_230_th2}}</td>
        <td>{{$Rubble_price3}}</td>

        </tr>
        <tr>
        <td>6</td>
        <td>MSRC PCC 150mm thick </td>
        <td>{{$msrc_pcc_150mm_thick2}}</td>
        <td>{{$MSRC_price3}}</td>

        </tr>
        <tr>
        <td>7</td>
        <td>Moduler panels 3 mm thick 6 incch structure</td>      
        <td>{{$modular_panels2}}</td> 
        <td>{{$Moduler_price3}}</td>              
            
        </tr>
        <tr>
        <td>8</td>
        <td>Overflow gutter</td>      
        <td>{{$overflow_gutter2}}</td>
        <td>{{$gutter_price3}}</td>


        </tr>
        <tr>
        <td>9</td>
        <td>Fiber lining</td>
        <td>{{$fiber_lining2}}</td>
        <td>{{$Fiber_price3}}</td>

        </tr>
        <tr>
        <td>10</td>
        <td>1ftX1ft PAPERGLASS tiling</td>
        <td>{{$paper_glass_tiling_1ft_x_1ft2}} </td>
        <td>{{$PAPERGLASS_price3}} </td>

        </tr>
        <tr>
        <td>11</td>
        <td>Granite Coping</td>
        <td>{{$granite_coping2}} </td>
            <td>{{$Granite_price3}} </td>



        </tr>
        <tr>
        <td>12</td>
        <td>Clapms</td>
        <td>{{$clamps2}}</td>
        <td>{{$Clapms_price3}}</td>


        </tr>
        <tr>
        <td>13</td>
        <td>Civil work Total</td>
        <td>{{$civil_work_total}}</td>
        </tr>
        <tr>
        <td>14</td>
        <td>Total cost =Total pump + Civil work Total</td>
        <td>{{$grand_total}}</td>
        </tr>
        <tr>
        <td>15</td>
        <td>Final price(₹)</td>
        <td>{{$final_price}}
        </td>
        </tr>
        </table>
        @endif

    </div>

</body>
<!-- Latest jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Sample data structure for filter and pump prices (fetch dynamically if available)
const filterPrices = { "Filter1": 500, "Filter2": 750 };
const pumpPrices = { "Pump1": 1200, "Pump2": 1500 };

// Update price on filter selection or quantity change
document.getElementById('filterDropdown').addEventListener('change', updateFilterPrice);
document.getElementById('filter_qty').addEventListener('input', updateFilterPrice);

document.getElementById('pump').addEventListener('change', updatePumpPrice);
document.getElementById('pump_qty').addEventListener('input', updatePumpPrice);

function updateFilterPrice() {
    const filter = document.getElementById('filterDropdown').value;
    const qty = document.getElementById('filter_qty').value || 1;
    const price = filterPrices[filter] || 0;
    const total = price * qty;
    document.getElementById('filter_price').value = total;
    document.getElementById('filter_h_price').value = price; // Store base price if needed
}

function updatePumpPrice() {
    const pump = document.getElementById('pump').value;
    const qty = document.getElementById('pump_qty').value || 1;
    const price = pumpPrices[pump] || 0;
    const total = price * qty;
    document.getElementById('pump_price').value = total;
    document.getElementById('pump_h_price').value = price; // Store base price if needed
}

</script>
</html>