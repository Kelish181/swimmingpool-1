<?php

namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Slider;
use App\Models\Footer;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Cimage;
use App\MOdels\Footers;


class SliderController extends Controller
{

     public function view()
    {
        $result['about'] = About::all();
        $result['slider'] = Slider::all();
        $result['footer'] = Footer::all();
        $result['blog'] = Blog::all();
        $result['testimonial'] = Testimonial::all();
        $result['category'] = Category::all();
        $result['cimage'] = Cimage::all();
        $result['data'] = Footers::all();
        return view('fornt/home', $result);
    }

    public function index($id)
    {
         $result['footer'] = Footer::all();
         $result['data'] = Footers::all();
        $blog = Blog::find($id);
        return view('fornt/blog_details' , $result , ['blog' => $blog]);
    }

   
   

   

}
