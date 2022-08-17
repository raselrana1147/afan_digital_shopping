<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Stock;
use Illuminate\Http\Response;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function index()
    {
      $featureds   =Product::where(['featured'=>0,'publish'=>0,'flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $best_sales  =Product::where(['best_sale'=>0,'publish'=>0,'flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $trendings   =Product::where(['trending'=>0,'publish'=>0,'flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $new_arrivals=Product::where(['new_arrival'=>0,'publish'=>0,'flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
     
  
       return view('index',compact('featureds','best_sales','trendings','new_arrivals'));
      
    }

    public function subcategory_product($id)
    {

      $products=Product::where(['sub_category_id'=>$id,'publish'=>0,'flash_deal'=>1])
      ->orderBy('id','DESC')->paginate(12);
      $sub_cat=SubCategory::findOrFail($id);
      return view('front.sub_category',compact('products','sub_cat'));
    }

    public  function childcategory_product($id)
    {
            $products=Product::where(['child_category_id'=>$id,'publish'=>0,'flash_deal'=>1])
            ->orderBy('id','DESC')->paginate(12);
            $child=ChildCategory::findOrFail($id);
            return view('front.child_category',compact('products','child'));
    }

    public function product_detail($slug)
    {
    	  $product=Product::where('slug',$slug)->first();
        $releted_products=Product::where("category_id",$product->category_id)->get();
    	  return view('front.product_detail',compact('product','releted_products'));

    }


    public function category_product($id)
    {
         $products=Product::where('category_id','=',$id)->where(['publish'=>0])->latest()->paginate(12);
         $category=Category::findOrFail($id);
         return view('front.category_product',compact("products","category"));
    }

    

    public function brand_wise_product($id)
    {
         $products=Product::where(['brand_id'=>$id,'publish'=>0,'flash_deal'=>1])
         ->orderBy('id','DESC')->paginate(12);
         $brand=Brand::findOrFail($id);
         return view('front.brand_product',compact('products','brand'));
    }

  public function search(Request $request)
    {


        if ($request->isMethod('post')){
           
          if (!empty($request->keyword) && empty($request->category_id)) {
              $products=Product::where('name',"LIKE","%$request->keyword%")->where(['publish'=>0])->paginate(12);

          }elseif (empty($request->keyword) && !empty($request->category_id)) {
              $products=Product::where('category_id',$request->category_id)->where(['publish'=>0])->paginate(12);

          }elseif (!empty($request->keyword) && !empty($request->category_id)) {

              $products=Product::where('category_id',$request->category_id)
              ->where(['publish'=>0])
              ->Orwhere('name',"LIKE","%$request->keyword%")
              ->paginate(12);

          }else{
             $products=Product::latest()->where(['publish'=>0])->paginate(12);;
         }

         return view('front.search',compact("products"));
       }
       else{
            
            return redirect()->route('front.index');
        }
    }
    
    
    public function api_callback()
    {

       return view('front.callback');
    }


    public function about_us()
    {
       return view('about');
    }

    public function contact_us()
    {
       return view('contact');
    }

    public function privacy_policy()
    {
        $trendings =Product::where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderByDesc('id')->take(3)->get();
       return view('privacy',compact('trendings'));
    }

    public function guide()
    {
        $trendings =Product::where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderByDesc('id')->take(3)->get();
       return view('guide',compact('trendings'));
    }
}
