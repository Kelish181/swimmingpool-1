<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\WaterVolume;
use App\Models\Skimmer;
use App\Models\Overflow;
use App\Models\Infinity;
use App\Models\Sacrificialpools;
use Livewire\Attributes\Rule;
use DB;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure you have barryvdh/laravel-dompdf installed



class Quotation extends Component
{

    public $selectedState;
    public $selectedCity;
    public $cities = [];

    // dynemic rate
    public $excavation;
    public $leveling_compaction; 
    public $compaction_test;
    public $polyethylene_sheet_1000_gauge	;
    public $rubble_soling_230_th;
    public $msrc_pcc_150mm_thick;
    public $modular_panels;
    public $overflow_gutter;
    public $fiber_lining;
    public $paper_glass_tiling_1ft_x_1ft;
    public $granite_coping;
    public $clamps;
    public $discount;
    public $adjustedLength;
    public $adjustedBreath;
    public $turn_over_time = "";
    public $type ;
    public $value = 1;  
    public $shape;
    public $location;
    public $surface;
    public $length;
    public $breath;
    public $height;
    public $volume;
    public $macthed_volume = "";
    public $step2 = false;
    public $watervolumeID = 0;
    public $Excavation_price;
    public $leveling_price;
    public $compaction_price;
    public $polyethylene_price;
    public $Rubble_price;
    public $MSRC_price;
    public $Fiber_price;
    public $PAPERGLASS_price;
    public $Clapms_price;
    public $gutter_price;
    public $Granite_price;
    public $Granite_price_display;
    public $Moduler_price;
    public $filter_qty;
    public $pump_qty;
    public $light_qty;
    public $inlets_qty;
    public $maindrain_qty;
    public $vacuum_qty;
    public $heater_qty;
    public $ozone_qty;
    // public $civil_work_total;
    public $filter_price1; // Default value or set dynamically
    // public $filterDropdown ;


    public $pump_price ;
    public $light_price ;
    public $inlets_price;
    public $maindrain_price;
    public $vacuum_price;
    public $heater_price;
    public $ozone_price ;
    public $pump_total ;

    // public $surfaceId;
    


    
    //infinity
    public $Excavation_price2;
    public $leveling_price2;
    public $compaction_price2;
    public $polyethylene_price2;
    public $Rubble_price2;
    public $MSRC_price2;
    public $Moduler_price2;
    public $Fiber_price2;
    public $PAPERGLASS_price2;
    public $Granite_price2;
    public $Clapms_price2;
    public $gutter_price2;
    

    //overflow
    public $Excavation_price3;
    public $leveling_price3;
    public $compaction_price3;
    public $polyethylene_price3;
    public $Rubble_price3;
    public $MSRC_price3;
    public $Moduler_price3;
    public $Fiber_price3;
    public $PAPERGLASS_price3;
    public $Granite_price3;
    public $Clapms_price3;
    public $gutter_price3;

    protected $rules = [
        'type' => 'required',
        'location' => 'required',
        'surface' => 'required',
        'turn_over_time' => 'required',
        'length' => 'required',
        'breath' => 'required',
        'height' => 'required',
    ];



   public function calculate()
{
    // dd($this->surface); // Check the value that Livewire receives



    // Validate input
    $validatedData = $this->validate();

    // Emit an event to notify that calculation is complete (early in case some other action depends on this)
    $this->emit('calculationDone');

    // Example logic for setting type based on volume or other conditions
    if ($this->volume < 50) {
        $this->value = 0;  // Type 0, show limited fields
    } else {
        $this->value = 1;   // Type 1, show all fields
    }

    

    // Fetch matched volume based on the calculated values
    $macthed_volume = DB::table('water_volume')
        ->where('volume_from', '<', $this->volume)
        ->where('volume_to', '>', $this->volume)
        ->where('p_id', $this->surface)
        ->where('turnover_time', $this->turn_over_time)
        ->first();

    // Update properties with the result
    $this->macthed_volume = $macthed_volume->name ?? "";
    $this->watervolumeID = $macthed_volume->id ?? 0;

    // Emit an event to notify that calculation is complete
    $this->emit('calculationDone');
}


// Livewire method to handle updated fields
public function updated($field)
{
    // Validate that both length and breath have values
    if ($this->length && $this->breath) {
        // Calculate gutter price based on length and breath
        $this->gutter_price = 2 * ($this->length + $this->breath); 
        $this->gutter_price2 = $this->gutter_price * 1.008;
        $this->gutter_price3 = $this->gutter_price * 1.008;

        
        // Calculate Granite price based on the provided logic
        $this->Granite_price = 2 * 0.03 * 2340 * ($this->length + $this->breath); 
        $this->Granite_price2 = $this->Granite_price * 1.008;
        $this->Granite_price2 = number_format($this->Granite_price, 2, '.', '');

        $this->Granite_price3 = $this->Granite_price * 1.008;
        $this->Granite_price3 = number_format($this->Granite_price, 2, '.', '');

        
        // Calculate PAPERGLASS price
        $this->PAPERGLASS_price = $this->paper_glass_tiling_1ft_x_1ft  * $this->height * ($this->length + ($this->breath));
        $this->PAPERGLASS_price2 = $this->PAPERGLASS_price * 1.008;
        $this->PAPERGLASS_price3 = $this->PAPERGLASS_price * 1.008;


        // Calculate Clapms price
        $this->Clapms_price = $this->clamps  * $this->length * $this->breath; 
        $this->Clapms_price2 = $this->Clapms_price * 1.008;
        $this->Clapms_price3 = $this->Clapms_price * 1.008;


        // Calculate Moduler price
        $this->Moduler_price = $this->modular_panels * $this->height * ($this->length + ($this->breath));
        $this->Moduler_price2 = $this->Moduler_price * 1.008;
        $this->Moduler_price3 = $this->Moduler_price * 1.008;


        // Adjust dimensions for Excavation, Leveling, and other calculations if 10x10
        if ($this->length == 10 && $this->breath == 10) {
            $adjustedLength = 13;
            $adjustedBreath = 13;
        } else {
            $adjustedLength = $this->length;
            $adjustedBreath = $this->breath;
        }

        // Calculate Excavation price using adjusted dimensions
        $this->Excavation_price = $this->excavation * ($adjustedLength * $adjustedBreath);
        $this->Excavation_price2 =$this->excavation1 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->Excavation_price2 = number_format($this->Excavation_price2, 2, '.', '');
        $this->Excavation_price3 =$this->excavation2 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->Excavation_price3 = number_format($this->Excavation_price3, 2, '.', '');



        // Calculate Leveling price
        $this->leveling_price =  $this->leveling_compaction * ($adjustedLength * $adjustedBreath);
        $this->leveling_price2 =$this->leveling_compaction1 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->leveling_price2 = number_format($this->leveling_price2, 2, '.', '');

        $this->leveling_price3 =$this->leveling_compaction2 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->leveling_price3 = number_format($this->leveling_price3, 2, '.', '');

        // Calculate Compaction price
        $this->compaction_price =  $this->compaction_test * ($adjustedLength * $adjustedBreath);
        $this->compaction_price2 = $this->compaction_test1 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->compaction_price2 = number_format($this->compaction_price2, 2, '.', '');
        $this->compaction_price3 = $this->compaction_test2 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->compaction_price3 = number_format($this->compaction_price3, 2, '.', '');




        // Calculate Polyethylene price
        $this->polyethylene_price =  $this->polyethylene_sheet_1000_gauge * ($adjustedLength * $adjustedBreath);
        $this->polyethylene_price2 = $this->polyethylene_sheet_1000_gauge1 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->polyethylene_price2 = number_format($this->polyethylene_price2, 2, '.', '');
        $this->polyethylene_price3 = $this->polyethylene_sheet_1000_gauge2 * 1.08 * ($adjustedLength * $adjustedBreath);
        $this->polyethylene_price3 = number_format($this->polyethylene_price3, 2, '.', '');


      // Adjust for Rubble price if dimensions are 10x10
if ($this->length == 10 && $this->breath == 10) {
    $adjustedLengthForRubble = 12;
    $adjustedBreathForRubble = 12;

    // Rubble prices for adjusted dimensions
    $this->Rubble_price = $this->rubble_soling_230_th * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.23);
    $this->Rubble_price2 = $this->rubble_soling_230_th1 * 1.08 * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.23);
    $this->Rubble_price = number_format($this->Rubble_price, 2, '.', '');
    $this->Rubble_price2 = number_format($this->Rubble_price2, 2, '.', '');

    $this->Rubble_price3 = $this->rubble_soling_230_th2 * 1.08 * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.23);
    $this->Rubble_price3 = number_format($this->Rubble_price3, 2, '.', '');


    // MSRC prices for adjusted dimensions
    $this->MSRC_price = $this->msrc_pcc_150mm_thick * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.15);
    $this->MSRC_price2 = $this->msrc_pcc_150mm_thick1 * 1.008 * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.15);
    $this->MSRC_price = number_format($this->MSRC_price, 2, '.', '');
    $this->MSRC_price2 = number_format($this->MSRC_price2, 2, '.', '');


    $this->MSRC_price3 = $this->msrc_pcc_150mm_thick2 * 1.008 * ($adjustedLengthForRubble * $adjustedBreathForRubble * 0.15);
    $this->MSRC_price3 = number_format($this->MSRC_price3, 2, '.', '');

    // Fixed Fiber price for 10x10 scenario
    $this->Fiber_price = $this->excavation * (10 * 10);
    $this->Fiber_price2 = $this->Fiber_price * 1.008;
    $this->Fiber_price = number_format($this->Fiber_price, 2, '.', '');
    $this->Fiber_price2 = number_format($this->Fiber_price2, 2, '.', '');

    $this->Fiber_price3 = $this->fiber_lining2 * 1.008;
    $this->Fiber_price3 = number_format($this->Fiber_price3, 2, '.', '');

    
} else {
    // Calculate Rubble price for custom dimensions
    $this->Rubble_price = $this->rubble_soling_230_th * ($this->length * $this->breath);
    $this->Rubble_price2 = $this->rubble_soling_230_th1 * 1.08 * ($this->length * $this->breath);
    $this->Rubble_price = number_format($this->Rubble_price, 2, '.', '');
    $this->Rubble_price2 = number_format($this->Rubble_price2, 2, '.', '');

    $this->Rubble_price3 = $this->rubble_soling_230_th2 * 1.08 * ($this->length * $this->breath);
    $this->Rubble_price3 = number_format($this->Rubble_price3, 2, '.', '');



    // MSRC prices for custom dimensions
    $this->MSRC_price = $this->msrc_pcc_150mm_thick * ($this->length * $this->breath * 0.15);
    $this->MSRC_price2 = $this->msrc_pcc_150mm_thick1 * 1.08 * ($this->length * $this->breath * 0.15);
    $this->MSRC_price = number_format($this->MSRC_price, 2, '.', '');
    $this->MSRC_price2 = number_format($this->MSRC_price2, 2, '.', '');

    $this->MSRC_price3 = $this->msrc_pcc_150mm_thick2 * 1.08 * ($this->length * $this->breath * 0.15);
    $this->MSRC_price3 = number_format($this->MSRC_price3, 2, '.', '');



    // Fiber price for custom dimensions
    $this->Fiber_price = $this->fiber_lining * ($this->length * $this->breath);
    $this->Fiber_price2 = $this->Fiber_price * 1.008;
    $this->Fiber_price = number_format($this->Fiber_price, 2, '.', '');
    $this->Fiber_price2 = number_format($this->Fiber_price2, 2, '.', '');

    $this->Fiber_price3 = $this->fiber_lining2 * 1.008;
    $this->Fiber_price3 = number_format($this->Fiber_price3, 2, '.', '');

}

    }
}

    public function updatedSurface($value)
    {
        $selectedPool = Sacrificialpools::find($value);
        
        if ($selectedPool) {
            $this->value = $selectedPool->value;  // Fetch type from the pool record
    
            if ($this->value == 1) {
                // Set values for type 1
                $this->volume = $selectedPool->volume;
                $this->macthed_volume = $selectedPool->watervolume;
                $this->watervolumeID = $selectedPool->id;
            } elseif ($this->value == 0) {
                // Clear values for type 0
                $this->volume = '';
                $this->macthed_volume = '';
                $this->watervolumeID = 0;
            }
        } else {
            // Default state
            $this->value = 1;
            $this->volume = '';
            $this->macthed_volume = '';
            $this->watervolumeID = 0;
        }
    }
    
    
    public function mount()
    {
        $this->filter_qty = 1;
        $this->pump_qty = 1;
        $this->light_qty = 4;
        $this->inlets_qty = 4;
        $this->maindrain_qty = 1;
        $this->vacuum_qty = 1;
        $this->heater_qty = 1;
        $this->ozone_qty = 1;
        $this->filter_price1 = ""; 




        // Fetch the first record from the Skimmers table (adjust if you need specific conditions)
        $skimmer = \App\Models\Skimmer::first(); 
        
        // Set the excavation and leveling_compaction values (ensure fields exist in the database)
        $this->excavation = $skimmer->excavation ?? '';
        $this->leveling_compaction = $skimmer->leveling_compaction ?? ''; 
        $this->compaction_test = $skimmer->compaction_test ?? '';
        $this->polyethylene_sheet_1000_gauge= $skimmer->polyethylene_sheet_1000_gauge?? '';
        $this->rubble_soling_230_th = $skimmer->rubble_soling_230_th ?? '';
        $this->msrc_pcc_150mm_thick= $skimmer->msrc_pcc_150mm_thick?? '';
        $this->modular_panels= $skimmer->modular_panels?? '';
        $this->overflow_gutter= $skimmer->overflow_gutter?? '';
        $this->fiber_lining= $skimmer->fiber_lining?? '';
        $this->paper_glass_tiling_1ft_x_1ft= $skimmer->paper_glass_tiling_1ft_x_1ft?? '';
        $this->granite_coping= $skimmer->granite_coping?? '';
        $this->clamps= $skimmer->clamps?? '';
        $this->discount= $skimmer->discount?? '';




        $discount = \App\Models\discount::first(); 
        $this->discount= $discount->discount?? '';

        
        $overflow = \App\Models\Overflow::first(); 
        $this->excavation1 = $overflow->excavation1 ?? '';
        $this->leveling_compaction1 = $overflow->leveling_compaction1 ?? ''; 
        $this->compaction_test1 = $overflow->compaction_test1 ?? '';
        $this->polyethylene_sheet_1000_gauge1= $overflow->polyethylene_sheet_1000_gauge1?? '';
        $this->rubble_soling_230_th1 = $overflow->rubble_soling_230_th1 ?? '';
        $this->msrc_pcc_150mm_thick1= $overflow->msrc_pcc_150mm_thick1?? '';
        $this->modular_panels1= $overflow->modular_panels1?? '';
        $this->overflow_gutter1= $overflow->overflow_gutter1?? '';
        $this->fiber_lining1= $overflow->fiber_lining1?? '';
        $this->paper_glass_tiling_1ft_x_1ft1= $overflow->paper_glass_tiling_1ft_x_1ft1?? '';
        $this->granite_coping1= $overflow->granite_coping1?? '';
        $this->clamps1= $overflow->clamps1?? '';
        $this->discount= $overflow->discount?? '';


        $infinity = \App\Models\Infinity::first();
        $this->excavation2 = $infinity->excavation2 ?? '';
        $this->leveling_compaction2 = $infinity->leveling_compaction2 ?? ''; 
        $this->compaction_test2 = $infinity->compaction_test2 ?? '';
        $this->polyethylene_sheet_1000_gauge2= $infinity->polyethylene_sheet_1000_gauge2?? '';
        $this->rubble_soling_230_th2 = $infinity->rubble_soling_230_th2 ?? '';
        $this->msrc_pcc_150mm_thick2= $infinity->msrc_pcc_150mm_thick2?? '';
        $this->modular_panels2= $infinity->modular_panels2?? '';
        $this->overflow_gutter2= $infinity->overflow_gutter2?? '';
        $this->fiber_lining2= $infinity->fiber_lining2?? '';
        $this->paper_glass_tiling_1ft_x_1ft2= $infinity->paper_glass_tiling_1ft_x_1ft2?? '';
        $this->granite_coping2= $infinity->granite_coping2?? '';
        $this->clamps2= $infinity->clamps2?? '';
        $this->discount= $infinity->discount?? ''; 

    }
 

    public function render()
    {
        // Fetch pools, states, and skimmers from the database
        $result['pools'] = Sacrificialpools::all();
        $result['states'] = DB::table('states')->get();
    
        // Volume calculation
        if($this->type == 'feet'){
            $this->volume = ($this->length * $this->breath * $this->height) * 0.0283168466;
        } else {
            $this->volume = $this->length * $this->breath * $this->height;
        }
        
        // Match volume logic
        $macthed_volume = DB::table('water_volume')
            ->where('volume_from', '<', $this->volume)
            ->where('volume_to', '>', $this->volume)
            ->where('p_id', $this->surface)
            ->where('turnover_time', $this->turn_over_time)
            ->first();
    
        $this->macthed_volume = $macthed_volume->name ?? "";
        $this->watervolumeID = $macthed_volume->id ?? 0;
    
        // Return the view with all the data
        return view('livewire.quotation', $result);
    }
    
   
    public function updatedSelectedState($stateId)
    {
        $this->selectedCity = null; // Reset selected city when state changes
        $this->updateStateOptions($stateId);
    }

    public function updateStateOptions($stateId)
    {
        $this->cities = DB::table('cities')->where('state_id', $stateId)->get();
        $this->discount = DB::table('discounts')->get();

    }

    public function resetCities()
    {
        $this->cities = [];
        $this->selectedCity = null;
    }

    
    
    // public function calculate(){
        
    //     $validatedData = $this->validate();
    //     $this->emit('calculationDone');
    //     // if($this->type == 'feet'){
    //     //     $this->volume = ($this->length*$this->breath*$this->height)*0.0283168466;
    //     // }else{
    //     //     $this->volume = $this->length*$this->breath*$this->height;
    //     // }
       
    //     // $this->macthed_volume = DB::table('water_volume')
    //     //     ->where('volume_from', '<', $this->volume)
    //     //     ->where('volume_to', '>', $this->volume)
    //     //     ->where('p_id', $this->surface)
    //     //     ->where('turnover_time', $this->turn_over_time)
    //     //     ->get();

    // }
    public function calculateTotal()
    {
        // Ensure volume is greater than zero
        if ($this->volume > 0) {
            // Step 5: Calculate civil work cost based on the calculated volume
            // $this->civil_work_total = $this->volume * $this->civil_work_rate;

            //$this->total = $this->filter_price + $this->pump_price + $this->light_price + 
            // $this->inlets_price + $this->maindrain_price + $this->vacuum_price + 
            // $this->heater_price + $this->ozone_price; 
            // $this->total = $this->civil_work_total + $this->other_costs;

            // Log calculations for debugging
            \Log::info("Volume (cubic meter): " . $this->volume);
            \Log::info("Civil Work Total: " . $this->civil_work_total);
            \Log::info("Other Costs: " . $this->other_costs);
            \Log::info("Final Total: " . $this->total);
        } else {
            // If the volume is not valid, reset total to 0
            $this->total = 0;
            \Log::error("Invalid volume detected. Total set to 0.");
        }
    }
            
    public function generatePDF(Request $request)

    {
        $cart = session()->get('cart', []);

    //
       dd($request->all() ,$this->filter_price1);    
    //    dd($this->filter_price);    

        $data = [
            'date' => date('m/d/Y'),
            'length' => $this->length,
            'breath' => $this->breath,
            'shape' => $this->shape,
            'size' => $this->length * $this->breath,
            'depth_of_pool' => $this->height,
            'pool_water_depth' => $this->height - 0.10,
            'floor_area' => $this->length * $this->breath,
            'volume_of_pool' => $this->length * $this->breath * $this->height,
            'volume_of_water' => $this->length * $this->breath * ($this->height - 0.10),
            'volume_of_pipes' => $this->length * $this->breath * ($this->height - 0.10) / 100,
            'total_volume_of_water' => ($this->length * $this->breath * ($this->height - 0.10)) + ($this->length * $this->breath * ($this->height - 0.10) / 100),
            'turnover_time' => 1,
            'flow_rate' => 1,
            'surface_draw' => $this->surface,
            'main_draw_off' => 1,
            'shape' => $this->shape,
            'location' => $this->location,
            'filter_qty' => $this->filter_qty,
            'pump_qty' => $this->pump_qty,
            'light_qty' => $this->light_qty,
            'inlets_qty' => $this->inlets_qty,
            'maindrain_qty' => $this->maindrain_qty,
            'vacuum_qty' => $this->vacuum_qty,
            'heater_qty' => $this->heater_qty,
            'ozone_qty' => $this->ozone_qty,

            // 'filter_price' => $this->filter_price,
            'pump_price' => $this->pump_price,
            'light_price' => $this->light_price,
            'inlets_price' => $this->inlets_price,
            'maindrain_price' => $this->maindrain_price,
            'vacuum_price' => $this->vacuum_price,
            'heater_price' => $this->heater_price,
            'ozone_price' => $this->ozone_price,
            'pump_total' => $this->pump_total,


            'size_required' => $this->length * $this->breath * $this->height,
            'coefficient' => 1,
            'depth' => $this->height,
            'area' => $this->length * $this->breath,
            'walls' => 'existing',
            'requitrments' => '1',
              
          
        ];
          // If cart has items, add them to the data array
    if (!empty($cart)) {
        $cartItems = [];
        foreach ($cart as $item) {
            $cartItems[] = [
                'name' => $item['name'],  // Assuming 'name' is a key in cart items
                'quantity' => $item['quantity'],
                'total' => $item['quantity'] * $item['total_price'],
            ];
        }

        // Add cart items to the data array
        $data['cart_items'] = $cartItems;
    }


        $overflow = \App\Models\Overflow::first();
        $infinity = \App\Models\Infinity::first();

        // Fetch skimmer data
        $skimmer = \App\Models\Skimmer::first();
    
        // Retrieve request data
        $requestData = $request['serverMemo']['data'];
    
        // Define additional variables
        $adjustedLength = $this->adjustedLength; 
        $adjustedBreath = $this->adjustedBreath;
    
        // Calculating the excavation prices from the request
        $Excavation_price = $requestData['Excavation_price'];
        $Excavation_price2 = $requestData['Excavation_price2'];
        $Excavation_price3 = $requestData['Excavation_price3'];

        $leveling_price = $requestData['leveling_price'];
        $leveling_price2 = $requestData['leveling_price2'];
        $leveling_price3 = $requestData['leveling_price3'];
        $filter_price = $request->input('filter_price');

        $compaction_price = $requestData['compaction_price'];
        $compaction_price2 = $requestData['compaction_price2'];
        $compaction_price3 = $requestData['compaction_price3'];

        $polyethylene_price = $requestData['polyethylene_price'];
        $polyethylene_price2 = $requestData['polyethylene_price2'];
        $polyethylene_price3 = $requestData['polyethylene_price3'];

        $Rubble_price = $requestData['Rubble_price'];
        $Rubble_price2 = $requestData['Rubble_price2'];
        $Rubble_price3 = $requestData['Rubble_price3'];

        $MSRC_price = $requestData['MSRC_price'];
        $MSRC_price2 = $requestData['MSRC_price2'];
        $MSRC_price3 = $requestData['MSRC_price3'];

        $Moduler_price2 = $requestData['Moduler_price2'];
        $Moduler_price3 = $requestData['Moduler_price3'];

        $gutter_price = $requestData['gutter_price'];
        $gutter_price2 = $requestData['gutter_price2'];
        $gutter_price3 = $requestData['gutter_price3'];

        $PAPERGLASS_price = $requestData['PAPERGLASS_price'];
        $PAPERGLASS_price2 = $requestData['PAPERGLASS_price2'];
        $PAPERGLASS_price3 = $requestData['PAPERGLASS_price3'];

        $Fiber_price = $requestData['Fiber_price'];
        $Fiber_price2 = $requestData['Fiber_price2'];
        $Fiber_price3 = $requestData['Fiber_price3'];

        $Granite_price = $requestData['Granite_price'];
        $Granite_price2 = $requestData['Granite_price2'];
        $Granite_price3 = $requestData['Granite_price3'];

        $Clapms_price = $requestData['Clapms_price'];
        $Clapms_price2 = $requestData['Clapms_price2'];
        $Clapms_price3 = $requestData['Clapms_price3'];

        $surfaceId = $requestData['surface'];
        $filter_price = $requestData['filter_price'];



// dd($requestData);

    
        // Merge all data into the initial $data array
        $data = array_merge($data, [
            'excavation' => $skimmer->excavation ?? '',
            'excavation1' => $overflow->excavation1 ?? '',
            'excavation2' => $infinity->excavation2 ?? '',

            'leveling_compaction' => $skimmer->leveling_compaction ?? '',
            'leveling_compaction1' => $overflow->leveling_compaction1 ?? '',
            'leveling_compaction2' => $infinity->leveling_compaction2 ?? '',

            'compaction_test' => $skimmer->compaction_test ?? '',
            'compaction_test1' => $overflow->compaction_test1 ?? '',
            'compaction_test2' => $infinity->compaction_test2 ?? '',

            'polyethylene_sheet_1000_gauge' => $skimmer->polyethylene_sheet_1000_gauge ?? '',
            'polyethylene_sheet_1000_gauge1' => $overflow->polyethylene_sheet_1000_gauge1 ?? '',
            'polyethylene_sheet_1000_gauge2' => $infinity->polyethylene_sheet_1000_gauge2 ?? '',

            'rubble_soling_230_th' => $skimmer->rubble_soling_230_th ?? '',
            'rubble_soling_230_th1' => $overflow->rubble_soling_230_th1 ?? '',
            'rubble_soling_230_th2' => $infinity->rubble_soling_230_th2 ?? '',

            'msrc_pcc_150mm_thick' => $skimmer->msrc_pcc_150mm_thick ?? '',
            'msrc_pcc_150mm_thick1' => $overflow->msrc_pcc_150mm_thick1 ?? '',
            'msrc_pcc_150mm_thick2' => $infinity->msrc_pcc_150mm_thick2 ?? '',

            'modular_panels' => $skimmer->modular_panels ?? '',
            'modular_panels1' => $overflow->modular_panels1 ?? '',
            'modular_panels2' => $infinity->modular_panels2 ?? '',

            'overflow_gutter' => $skimmer->overflow_gutter ?? '',
            'overflow_gutter1' => $overflow->overflow_gutter1 ?? '',
            'overflow_gutter2' => $infinity->overflow_gutter2 ?? '',

            'fiber_lining' => $skimmer->fiber_lining ?? '',
            'fiber_lining1' => $overflow->fiber_lining1 ?? '',
            'fiber_lining2' => $infinity->fiber_lining2 ?? '',

            'paper_glass_tiling_1ft_x_1ft' => $skimmer->paper_glass_tiling_1ft_x_1ft ?? '',
            'paper_glass_tiling_1ft_x_1ft1' => $overflow->paper_glass_tiling_1ft_x_1ft1 ?? '',
            'paper_glass_tiling_1ft_x_1ft2' => $infinity->paper_glass_tiling_1ft_x_1ft2 ?? '',

            'granite_coping' => $skimmer->granite_coping ?? '',
            'granite_coping1' => $overflow->granite_coping1 ?? '',
            'granite_coping2' => $infinity->granite_coping2 ?? '',

            'clamps' => $skimmer->clamps ?? '',
            'clamps1' => $overflow->clamps1 ?? '',
            'clamps2' => $infinity->clamps2 ?? '',

            'civil_work_total' => $skimmer->civil_work_total ?? '',
            // 'civil_work_total' => $overflow->civil_work_total ?? '',
            // 'civil_work_total' => $infinity->civil_work_total ?? '',

            'grand_total' => $skimmer->grand_total ?? '',
            // 'grand_total' => $overflow->grand_total ?? '',
            // 'grand_total' => $infinity->grand_total ?? '',

            'final_price' => $skimmer->final_price ?? '',
            // 'final_price' => $overflow->final_price ?? '',
            // 'final_price' => $infinity->final_price ?? '',

            'Excavation_price' => $Excavation_price,
            'Excavation_price2' => $Excavation_price2,
            'Excavation_price3' => $Excavation_price3,

            'leveling_price' => $leveling_price, 
            'leveling_price2' => $leveling_price2, 
            'leveling_price3' => $leveling_price3, 

            'compaction_price' => $compaction_price,
            'compaction_price2' => $compaction_price2,
            'compaction_price3' => $compaction_price3, 
 
            'polyethylene_price' => $polyethylene_price, 
            'polyethylene_price2' => $polyethylene_price2,
            'polyethylene_price3' => $polyethylene_price3, 
 
            'Rubble_price' => $Rubble_price, 
            'Rubble_price2' => $Rubble_price2,
            'Rubble_price3' => $Rubble_price3, 
 
            'MSRC_price' => $MSRC_price, 
            'MSRC_price2' => $MSRC_price2,
            'MSRC_price3' => $MSRC_price3, 
 
            'Moduler_price2' => $Moduler_price2,
            'Moduler_price3' => $Moduler_price3, 
 
            'gutter_price' => $gutter_price,
            'gutter_price2' => $gutter_price2,
            'gutter_price3' => $gutter_price3, 
 
            'Fiber_price' => $Fiber_price, 
            'Fiber_price2' => $Fiber_price2, 
            'Fiber_price3' => $Fiber_price3, 

            'PAPERGLASS_price' => $PAPERGLASS_price,
            'PAPERGLASS_price2' => $PAPERGLASS_price2,
            'PAPERGLASS_price3' => $PAPERGLASS_price3,

            'Granite_price' => $Granite_price, 
            'Granite_price2' => $Granite_price2, 
            'Granite_price3' => $Granite_price3, 

            'Clapms_price' => $Clapms_price, 
            'Clapms_price2' => $Clapms_price2, 
            'Clapms_price3' => $Clapms_price3, 

            'surfaceId' => $surfaceId,
            'filter_price' => $filter_price,

 


           
        ]);
        // dd($data);
        
        // Further code to generate the PDF using $data...
    
    


            // // Fetch overflow data and prepare the overflow-related fields
            // $overflow = \App\Models\Overflow::first();
            // $data = array_merge($data, [
            //     'excavation1' => $overflow->excavation1 ?? '',
            //     'leveling_compaction1' => $overflow->leveling_compaction1 ?? '',
            //     'compaction_test1' => $overflow->compaction_test1 ?? '',
            //     'polyethylene_sheet_1000_gauge1' => $overflow->polyethylene_sheet_1000_gauge1 ?? '',
            //     'rubble_soling_230_th1' => $overflow->rubble_soling_230_th1 ?? '',
            //     'msrc_pcc_150mm_thick1' => $overflow->msrc_pcc_150mm_thick1 ?? '',
            //     'modular_panels1' => $overflow->modular_panels1 ?? '',
            //     'overflow_gutter1' => $overflow->overflow_gutter1 ?? '',
            //     'fiber_lining1' => $overflow->fiber_lining1 ?? '',
            //     'paper_glass_tiling_1ft_x_1ft1' => $overflow->paper_glass_tiling_1ft_x_1ft1 ?? '',
            //     'granite_coping1' => $overflow->granite_coping1 ?? '',
            //     'clamps1' => $overflow->clamps1 ?? '',
            //     'discount' => $overflow->discount ?? '',
            // ]);
            // // dd($data); // This will display $data in the browser and halt execution

    
        // PDF options
        $options = [
            'dpi' => 150,
            'default-font-size' => 8,
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'page-size' => 'A4',
        ];
    
        // Generate PDF and stream the download
        $pdfContent = PDF::loadView('fornt.quotationpdf', $data)->setOptions($options)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "invoice.pdf"
        );
    }
    
}