<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;

class EcommerceController extends Controller
{

	public function __construct()
	{
	  $this->middleware('auth:api',['only'=>'coupon_list']);
	}
	
  public function slider()
  {
      $sliders=DB::table('sliders')->orderByDesc('id')->get(['id','image']);
       return response()->json([
       'sliders'=>$sliders,
       'status' =>200
     ],Response::HTTP_OK);
  }
    
    public function category()
    {
    
      $categories=Category::withCount('products')->orderBy('id','desc')
      ->get(['id','category_name','image']);

    	  return response()->json([
    	  'categories'=>$categories,
    	  'status' =>200
    	],Response::HTTP_OK);

    }
    
    
    public function sub_category($id)
    {
         $sub_categories=DB::table('sub_categories')
         ->where('category_id',$id)
         ->orderBy('id','DESC')
         ->get(['id','sub_cat_name','image']);

           return response()->json([
           'sub_categories'=>$sub_categories,
           'status' =>200
         ],Response::HTTP_OK);
    }


    public function brand()
    {
       
        $brands=Brand::withCount('products')->orderBy('id','desc')
        ->get(['id','brand_name','image']);
          return response()->json([
          'brands'=>$brands,
          'status' =>200
        ],Response::HTTP_OK);

    }
    
    
    public function whole_sale_product(Request $request)
    {
        //  $products=DB::table('products')
        //  ->where(['sale_type'=>'whole','flash_deal'=>1])
        //  ->orderBy('id','DESC')
        //  ->paginate(1,['*'],"page",$request->page);
        
         $products=DB::table('products')
         ->where(['sale_type'=>'whole','flash_deal'=>1])
         ->orderBy('id','DESC')
         ->get();


           return response()->json([
           'products'=>$products,
           'status' =>200
         ],Response::HTTP_OK);
    }
    
    
    public function featured_product()
    {
      $products=DB::table('products')
      ->where(['featured'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderBy('id','desc')
      ->take(12)->get();
        return response()->json([
        'products'=>$products,
        'status' =>200
      ],Response::HTTP_OK);
    }

    public function featured_product_all()
    {

      $products=Product::where(['featured'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderBy('id','desc')->get();
        return response()->json([
        'products'=>$products,
        'status' =>200
      ],Response::HTTP_OK);
    }
    
      public function trending_product()
    {
        $products=DB::table('products')
        ->where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderBy('id','desc')
        ->take(12)->get();
          return response()->json([
          'products'=>$products,
          'status' =>200
        ],Response::HTTP_OK);
    }

    public function trending_product_all()
    {
        $products=DB::table('products')
        ->where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderBy('id','desc')
        ->get();
          return response()->json([
          'products'=>$products,
          'status' =>200
        ],Response::HTTP_OK);
    }
    
    public function best_sale_product()
    {
       $products=DB::table('products')
       ->where(['best_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderBy('id','desc')
       ->take(12)->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }


    public function best_sale_product_all()
    {
       $products=DB::table('products')
       ->where(['best_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderBy('id','desc')
       ->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }


    public function new_arrival_product()
    {
       $products=DB::table('products')
       ->where(['new_arrival'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderBy('id','desc')
       ->take(12)->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }


    public function new_arrival_product_all()
    {
       $products=DB::table('products')
       ->where(['new_arrival'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderBy('id','desc')
       ->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }
    
    
     public function flash_deal_product()
    {
       
       $products=DB::table('products')
       ->where(['flash_deal'=>0])->orderBy('id','DESC')
       ->take(12)->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }





    public function flash_deal_product_all()
    {
       $products=DB::table('products')
       ->where(['flash_deal'=>0])->orderBy('id','DESC')
       ->orderBy('id','desc')
       ->get();
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }
    
    public function product_detail($id)
    {
       $product=Product::with('galleries')->findOrFail($id);
        return response()->json([
        'product'=>$product,
        'status' =>200
      ],Response::HTTP_OK);
      
    }
    
    public function barnd_wise_product($id)
    {
       
       $products=DB::table('products')
       ->where(['brand_id'=>$id,'publish'=>0])->orderBy('id','DESC')
       ->paginate(6);
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }

    public function category_wise_product($id)
    {
       
       $products=DB::table('products')
       ->where(['category_id'=>$id,'publish'=>0])->orderBy('id','DESC')
       ->paginate(6);
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }

    public function subcat_wise_product($id)
    {
       //Articles::paginate(5, ['*'], 'page', $pageNumber);
       
       $products=DB::table('products')
       ->where(['sub_category_id'=>$id,'publish'=>0])->orderBy('id','DESC')
       ->paginate(6);
         return response()->json([
         'products'=>$products,
         'status' =>200
       ],Response::HTTP_OK);

    }
    
    public function coupon_list()
    {
       $coupons=DB::table('coupons')->orderBYDesc('id')->get();

        return response()->json([
         'coupons'=>$coupons,
         'status' =>200
       ],Response::HTTP_OK);
    }
    
    public function apply_coupon(Request $request)
    {

       $coupon=DB::table('coupons')
       ->select('id','title','coupon_code','shopping_amount','discount','type','end_date')
       ->where('coupon_code',$request->coupon_code)
       ->first();

       if (is_null($coupon)) 
       {
          return response()->json([
           'coupons'=>'No coupon found',
           'status' =>400
         ],Response::HTTP_OK);
       }elseif(date('Y-m-d') > $coupon->end_date){
            return response()->json([
           'coupons'=>'This coupon has been expired',
           'status' =>202
         ],Response::HTTP_OK);                              
      }
       else{
           return response()->json([
            'coupons'=>$coupon,
            'status' =>200
          ],Response::HTTP_OK);
        }

    }

}
