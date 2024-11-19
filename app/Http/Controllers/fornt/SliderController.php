<?php

namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Slider;
use App\Models\Footer;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Cimage;
use App\Models\Footers;
use App\Models\Setting;
use App\Models\Sacrificialpools;
use App\Models\WaterVolume;
use App\Models\Filter;
use App\Models\Pump;
use App\Models\Light;
use App\Models\Inlets;
use App\Models\Maindrain;
use App\Models\Vaccum;
use App\Models\Heaterpump;
use App\Models\Ozone;
use DB;



class SliderController extends Controller
{ 
    public function skimmer(Request $request)
    {
        // Your logic here
    }


     public function view()
    {
        $result['about'] = About::all();
        $result['slider'] = Slider::all();
        $result['footer'] = Footer::all();
        $result['blog'] = Blog::all();
        $result['product'] = Product::all();

        $result['testimonial'] = Testimonial::all();
         $result['cimage'] = Cimage::join('category' , 'cimage.c_id' , '=' , 'category.id')
        ->select('cimage.*','category.c_name as category_name')
        ->get();
        $result['data'] = Footers::all();
        $result['setting'] = Setting::all();
        return view('fornt/home', $result);
    }
    public function blogDetails($id)
    {
        $result['footer'] = Footer::all();
        $result['data'] = Footers::all();
        $result['setting'] = Setting::all();
        $result['blog'] = Blog::find($id);
    
        return view('fornt.blog_details', $result);
    }
    
   

    
    public function productDetails($id)
    {
        $result['footer'] = Footer::all();
        $result['data'] = Footers::all();
        $result['setting'] = Setting::all();
        $result['product'] = Product::find($id);
    
        return view('fornt.product_details', $result);
    }
    
    
    public function inquiry(Request $request){
        $data = [
             'name' => $request->post('name'),
             'email' => $request->post('email'),
             'number' => $request->post('number'),
             'massage' => $request->post('subject'),
             ];
             
        $insertdata = DB::table('inquiry')->insertGetId($data);
        // session()->flash('success', 'You Are Post Created Successfully.');
        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');

    }
    
    public function about($id)
    {
        $result['footer'] = Footer::all();
         $result['data'] = Footers::all();
         $result['setting'] = Setting::all();
        $about = Slider::find($id);
        return view('fornt/about_details' , $result , ['about' => $about] );
    }

    public function quotation()
    {
        $result['setting'] = Setting::all();
        $result['footer'] = Footer::all();
        $result['data'] = Footers::all();
        $result['filter']=Filter::all();
        $result['watervolume']=WaterVolume::all();
        $result['pump']=Pump::all();
        $result['light']=Light::all();
        $result['inlets']=Inlets::all();
        $result['maindrain']=Maindrain::all();
        $result['vaccum']=Vaccum::all();
        $result['heaterpump']=Heaterpump::all();
        $result['ozone']=Ozone::all();
       
        $result['states']= DB::table('states')->get();
        $result['cities']= DB::table('cities')->get();
        return view('fornt/quotation' , $result);
    }

    // public function getSurfacedData($id)
    // {
    //   return $filteredData = WaterVolume::where('p_id', $id)->get();
    //     return response()->json($filteredData);
    // }
    
    public function getFilteredData($id)
    {
        $filteredData = Filter::where('watervolume_id', $id)->get();
        return response()->json($filteredData);
    }
    
    public function getPumpData($id)
    {
        $pumpData = Pump::where('watervolume_id', $id)->get();
        return response()->json($pumpData);
    }
    public function getLightData($id)
    {
        $lightData = Light::where('watervolume_id', $id)->get();
        return response()->json($lightData);
    }

    public function getInletData($id)
    {
        $inletData = Inlets::where('watervolume_id', $id)->get();
        return response()->json($inletData);
    }

    public function getMainDrainData($id)
    {
        $mainDrainData = Maindrain::where('watervolume_id', $id)->get();
        return response()->json($mainDrainData);
    }

    public function getVacuumData($id)
    {
        $vacuumData = Vaccum::where('watervolume_id', $id)->get();
        return response()->json($vacuumData);
    }

    public function getHeaterPumpData($id)
    {
        $heaterPumpData = Heaterpump::where('watervolume_id', $id)->get();
        return response()->json($heaterPumpData);
    }

    public function getOzoneData($id)
    {
        $ozoneData = Ozone::where('watervolume_id', $id)->get();
        return response()->json($ozoneData);
    }
   
    public function calculateTotalPrice(Request $request)
    {
        // Assuming your request contains selected options for each dropdown
        $selectedOptions = $request->all();

        $totalPrice = 0;

        // Loop through selected options and calculate the total price
        foreach ($selectedOptions as $dropdownName => $selectedOption) {
            $totalPrice += YourModel::find($selectedOption)->price;
        }

        return response()->json(['totalPrice' => $totalPrice]);
    }
}