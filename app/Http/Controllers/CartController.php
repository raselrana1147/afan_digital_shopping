<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Coupon;
use App\Models\Admin\Product;

class CartController extends Controller
{
    

  public function __construct()
  {
      $this->middleware('auth')->only(['cart']);
  }

    public function add_to_cart(Request $request)
    {


	    	if (Auth::check()) 
	    	{
	    		$cart=Cart::where('product_id','=',$request->product_id)
	    		->where('user_id',Auth::user()->id)->first();
	    	}else{
	    	   	
			   $cart=Cart::where('product_id','=',$request->product_id)
			   ->where('ip_address',$request->ip())->first();
	          }
	          if (is_null($cart)) {
	          	$cart            =new Cart();
	          	$cart->product_id=$request->product_id;
	          	$cart->quantity  =$request->quantity;
              $cart->ip_address=$request->ip();
	          	if (Auth::check()) 
	          	{
	          		$cart->user_id=Auth::user()->id;
	          	}

              if (!is_null($request->size)) 
              {
                $cart->size=$request->size;
              }

              if (!is_null($request->color)) 
              {
                $cart->color=$request->color;
              }

	          	$cart->save();
	          }else
	          {
	          	$cart->increment('quantity');
	          }

	           $total_item=total_item();
	           $cart_items=$this->cart_items();
             $grand_total=price_format(grand_total());
             $sub_total=price_format(sub_total());
            
	          
	              $notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully added to cart','total_item'=>$total_item,'carts'=>$cart_items,'grand_total'=>$grand_total,'sub_total'=>$sub_total];
        

         echo json_encode($notification);
    }


    public function add_to_cart_single(Request $request)
    {
      
        if (Auth::check()) 
        {
          $cart=Cart::where('product_id','=',$request->product_id)
          ->where('user_id',Auth::user()->id)->first();
        }else{
            
         $cart=Cart::where('product_id','=',$request->product_id)
         ->where('ip_address',$request->ip())->first();
            }
            if (is_null($cart)) {
              $cart            =new Cart();
              $cart->product_id=$request->product_id;
              $product=Product::findOrFail($request->product_id);
              if ($product->sale_type==="whole") 
              {
                 $cart->quantity=$product->whole_sale_quantity;
              }else
              {
                 $cart->quantity=1;
              }
             
              $cart->ip_address=$request->ip();
              if (Auth::check()) 
              {
                $cart->user_id=Auth::user()->id;
              }

              $cart->save();
            }else
            {
              $cart->increment('quantity');
            }

                $total_item=total_item();
                $cart_items=$this->cart_items();
                $grand_total=price_format(grand_total());
                $sub_total=price_format(sub_total());
            
               $notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully added to cart','total_item'=>$total_item,'carts'=>$cart_items,'sub_total'=>$sub_total,'grand_total'=>$grand_total];
        

         echo json_encode($notification);
    }

    public function cart()
    {
    	$carts=carts();;
    	return view('front.cart',compact('carts'));
    }

    public function cart_delete(Request $request)
    {
      
    	$cart=Cart::findOrFail($request->cart_id);
	    $cart->delete();
	    $total_item =total_item();
		  $sub_total=price_format(sub_total());
		  $grand_total=grand_total();

    	$notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully deleted','sub_total'=>$sub_total,'carts'=>$this->cart_items(),'grand_total'=>price_format($this->grand_total()),'total_item'=>total_item()];

    	echo json_encode($notification);
    }


    public  function cart_update(Request $request)
    {
    	
         
    			$cart=Cart::findOrFail($request->cart_id);
    			$cart->quantity=$request->quantity;
    			$cart->save();
          $each_cart_price=0;
          if ($cart->product->flash_deal==0) {
            $each_cart_price=($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100)*($cart->quantity);
          }else{
            $each_cart_price=$cart->quantity*$cart->product->current_price;
          }

    			

    			 $notification=['status'=>'200', 'type'=>'success','message'=>'Succeddfully updated','sub_total'=>price_format(sub_total()),'grand_total'=>price_format(grand_total()),'each_cart_price'=>price_format($each_cart_price),'carts'=>$this->cart_items(),];
    		
    	echo json_encode($notification);

    }





    public function grand_total()
    {
    	$total_price=Cart::total_price();
    	$grand_total=$total_price+shipping_charge()+tax();
    	return $grand_total;
    }


    public function cart_items()
    {
    	   $cart_items=carts();
    	   $total_price=total_price();
           $setProduct='';
          
       	    foreach ($cart_items as $cart) 
       	    {
                  $setProduct.='<div class="ajaxcart__inner">
                              <div class="ajaxcart__product">
                        <div class="ajaxcart__row" data-line="3">
                            <div class="grid">
                                <div class="grid__item one-quarter">
                                    <a href="'.route('product.detail',$cart->product->slug).'" class="ajaxcart__product-image"><img src="'.asset('assets/backend/image/product/small/'.$cart->product->thumbnail).'" alt=""></a>
                                </div>
                                <div class="grid__item three-quarters">
                                    <p>
                                        <a href="product.html" class="ajaxcart__product-name">'.$cart->product->name.'</a>
                                        <span class="ajaxcart__product-meta">'.$cart->size.' '.$cart->color.'</span>
                                    </p>
                                    <div class="grid--full display-table">
                                        <div class="grid__item">
                                            <div class="ajaxcart__qty">
                                                
                                                <input type="number" id="quantity'.$cart->id.'" class="update_cart" value="'.$cart->quantity.'" min="1"  pattern="[0-9]*" cart_id="'.$cart->id.'" data-action="'.route('cart.update').'">
                                               
                                            </div>
                                        </div>
                                        <div class="grid__item">
                                            <span class="money each_cart_price'.$cart->id.'">'.price_format($cart->quantity*$cart->product->current_price).'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>';
             }
           

             if (count($cart_items)>0)
             {
               $setProduct.='
                </div>
                <div class="ajaxcart__footer">
                    <div class="grid--full">
                        <div class="grid__item title-total">
                            <p>
                                Subtotal
                            </p>
                        </div>
                        <div class="grid__item price-total">
                            <p>
                                <span class="money" data-currency-usd="$223.00 USD" data-currency="USD">'.price_format(sub_total()).'</span>
                            </p>
                        </div>
                    </div>
                    <p class="text-center">
                        Shipping &amp; taxes calculated at checkout
                    </p>
                    <a class="btn btn--full cart__shoppingcart" name="shoppingCart" href="'.route('view.cart').'">
                    Shopping Cart → </a>
                    <a class="btn btn2 btn--full cart__checkout" name="checkout" href="'. route('view.cart').'">
                    Check Out → </a>
                </div>';
             }else{
                  $setProduct.='<h4 style="padding:12px">Empty Cart</h4>';  
              }

              return $setProduct;
    }


    public function apply_coupon(Request $request)
    {
        $coupon=Coupon::where('coupon_code',$request->coupon_code)->first();
        if (!is_null($coupon)) 
        {
           $today=strtotime(date('Y-m-d'));
           $start_date=strtotime($coupon->start_date);
           $end_date=strtotime($coupon->end_date);
           if ($today<$start_date)
           {
             $notification=['status'=>'401', 'type'=>'error','message'=>'Coupon is not started yet'];
           }elseif ($today>$end_date) 
           {
            $notification=['status'=>'402', 'type'=>'error','message'=>'Coupon has been expired'];
           }else
           {
             if (Auth::check())
             {
                $cart=Cart::where(['user_id'=>Auth::user()->id,'coupon_id'=>$coupon->id])->first();

             }else{
                 $cart=Cart::where(['ip_address'=>$request->ip(),'coupon_id'=>$coupon->id])->first();    
             }

             if (!is_null($cart)) 
             {
                 $notification=['status'=>'403', 'type'=>'error','message'=>'Coupon already used'];
             }else{

                  if ($coupon->shopping_amount>total_price())
                  {

                    $notification=['status'=>'403', 'success'=>'error','message'=>'Minimum shopping amount '.currency().$coupon->shopping_amount];
                  }else{
                    foreach (carts() as $cart) 
                    {
                      $cart->coupon_id=$coupon->id;
                      $cart->save();
                    }
                    $notification=['status'=>'200', 'success'=>'sucess','message'=>'Coupoun successfully applied','grand_total'=>currency().number_format(grand_total(),2)];
                  }   
             }
           }
          
        }else{
          $notification=['status'=>'400', 'type'=>'error','message'=>'Invalid coupon'];
        }


        echo json_encode($notification);
    }

}
