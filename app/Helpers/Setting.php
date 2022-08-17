<?php 


use App\Models\Admin\GeneralSetting;
use Illuminate\Support\Str;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Coupon;
use App\Models\User;
use App\Models\Admin\SocialLink;
use App\Models\Admin\Category;
use App\Models\Wishlist;
use App\Models\CompareList;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;

function site_name()
{
	$data=GeneralSetting::first();
	return $data->site_name;
}

function site_tite()
{
	$data=GeneralSetting::first();
	return $data->title;
}

function copyright()
{
	$data=GeneralSetting::first();
	return $data->copyright;
}

function shipping_charge()
{
	$data=GeneralSetting::first();
	return $data->shipping_charge;
}
function tax()
{
	$data=GeneralSetting::first();
    $tax=(($data->tax*sub_total())/100);
	return $tax;
}


function logo()
{
	$data=GeneralSetting::first();
	return asset('/assets/backend/image/'.$data->logo);
}

function favicon()
{
	$data=GeneralSetting::first();
	return $data->favicon;
}


function currency()
{
	$data=GeneralSetting::first();
	return $data->currency;
}


function default_image()
{
	$data=GeneralSetting::first();
  $defalt_image=url('').'/assets/backend/image/'.$data->default_image;
	return $defalt_image;
}


function company_address()
{
	$data=GeneralSetting::first();
	return $data->company_address;
}


function description()
{
	$data=GeneralSetting::first();
	return $data->description;
}


function company_phone()
{
	$data=GeneralSetting::first();
	return $data->company_phone;
}


function company_email()
{
	$data=GeneralSetting::first();
	return $data->company_email;
}

function short_description($description)
{
	
	return Str::substr($description,200);

}

function carts()
{
	return Cart::carts();
}

function first_cart()
{
     return Cart::first_cart();
}

function total_item()
{
	return Cart::total_item();
}

function total_price()
{
	return Cart::total_price();
}

function price_format($price)
{
   return currency().number_format($price,3);
  // return currency().$price;
  
}

function sub_total()
{
	$data=GeneralSetting::first();
    $sub_price=Cart::total_price();
    if (Auth::check())
    {
       $cart=Cart::where('user_id',Auth::user()->id)->first();
    }else{
    	$ip=\Request::ip();
        $cart=Cart::where('ip_address',$ip)->first();    
    }
    if (!is_null($cart)) 
    {
    	if ($cart->coupon_id !=null) {
    		$coupon=Coupon::findOrFail($cart->coupon_id);
    		if ($coupon->type=="flat")
    		{
    			$total_remain=$sub_price-$coupon->discount;
    			return $total_remain;

    		}else{
    			$discount=($sub_price*$coupon->discount)/100;
    			$total_remain=$sub_price-$discount;
    			return $total_remain;
    		}
    	}else{
    		return $sub_price;
    	}
    }
	
}


function grand_total()
{
	$data=GeneralSetting::first();
    $total_price=Cart::total_price();
    if (Auth::check())
    {
       $cart=Cart::where('user_id',Auth::user()->id)->first();
    }else{
    	$ip=\Request::ip();
        $cart=Cart::where('ip_address',$ip)->first();    
    }
    if (!is_null($cart)) 
    {
    	if ($cart->coupon_id !=null) {
    		$coupon=Coupon::findOrFail($cart->coupon_id);
    		if ($coupon->type=="flat")
    		{
    			$total_remain=$total_price-$coupon->discount;
    			return $total_remain+shipping_charge()+tax();

    		}else{
    			$discount=($total_price*$coupon->discount)/100;
    			$total_remain=$total_price-$discount;
    			return $total_remain+shipping_charge()+tax();
    		}
    	}else{
    		return $total_price+shipping_charge()+tax();
    	}
    }
	
}



function social_link()
{
   $social=SocialLink::orderByDesc('id')->get();
   return $social;
}

function categories()
{
     $categories=Category::orderBy('id','DESC')->get();
     return $categories;
}

function brands($type=null)
{
     if ($type==null) {
          $brands=Brand::orderBy('id','DESC')->get();
     }else{
         $brands=Brand::where('type',$type)->orderBy('id','DESC')->get();
     }
    
     return $brands;
}



function sliders($type)
{
     $sliders=DB::table('sliders')->where('type',$type)->orderBy('id','desc')->get();
     return $sliders;
}

function banner($type)
{
     $banner=DB::table('banners')->where('type',$type)->first();
     return $banner;
}

function best_sales()
{
     $products=DB::table('products')
     ->where(['best_sale'=>0,'publish'=>0,'flash_deal'=>1])
     ->take(3)->get();
     return $products;
}

function icons(){

      $icon=array(
              'book.png','beauty-health.png','homelife.png','appliances.png','smartphones.png','camera.png','clothing.png','kids-baby.png','sport.png','stationery.png'
        );
      $key=array_rand($icon);
      return $icon[$key];
}

function cities()
{
    return [
     'As Sib','Al Ashkharah','Al Buraimi','Al Hamra','Al Jazer','Al Madina A Zarqa','Al Suwaiq','Bahla','Barka','Bidbid','Bidiya','Duqm','Haima','Ibra','Ibri','Izki','Jabrin','Jalan Bani Bu Hassan','Khasab','Mahooth','Masirah','Matrah','Mudhaybi','Mudhaireb','Muscat','Nizwa','Quriyat','Raysut','Rustaq','Ruwi','Saham','Shinas','Saiq','Salalah','Samail','Sohar','Sur','Tan`am','Thumrait','Dhaka','Rajshahi','Khulna','Barishal','Mymensing','Sylhet','Rangpur'
    ];
}