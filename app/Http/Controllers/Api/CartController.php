<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    

	public function __construct()
	{
	    $this->middleware('auth:api');
	}
    public function add_to_cart(Request $request)
    {


		$cart=Cart::where('product_id','=',$request->product_id)
		->where('user_id',auth()->user()->id)->first();

    	
          if (is_null($cart)) {
          	$cart            =new Cart();
          	$cart->product_id=$request->product_id;
          	$cart->quantity  =$request->quantity;
          	$cart->user_id=auth()->user()->id;
          	$cart->save();
          }else
          {
          	$cart->increment('quantity');
          }

   
		      return response()->json([
			      'products'=>"Item added to cart",
			      'total_item'=>$this->total_item(),
			      'total_price'=>$this->total_price(),
			      'status' =>200
		    ],Response::HTTP_OK);
    }


     protected function total_item()
     {
      	$cart_item=Cart::where('user_id',auth()->user()->id)->count();
        return $cart_item;
     }


     protected function total_price(){
     	$total_price=0;
        $new_price=0;
     	
	  	 $carts=Cart::where('user_id',auth()->user()->id)->get();
	  	 foreach($carts as $cart)
	  	 {
		     if ($cart->product->flash_deal==0) {
		          $new_price=($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100);
		         $total_price+=$new_price*$cart->quantity;
		     }else{
		         $total_price+=$cart->product->current_price*$cart->quantity;
		     }
	  	 }
    	  return $total_price;
    }


    public function carts()
    {  
   	  $carts=DB::table('carts')->where('user_id',auth()->user()->id)->get();
      return $carts;
    }


}
