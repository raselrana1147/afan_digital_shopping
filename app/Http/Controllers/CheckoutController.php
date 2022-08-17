<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Payment;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\PaymentDetail;
use App\Models\Admin\BillingDetail;
use Illuminate\Support\Facades\Auth;
use URL;
use Session;

class CheckoutController extends Controller
{
    

	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function checkout()
    {
    	$carts=carts();
    	$total_price=total_price();
    	$payments=DB::table('payments')->orderBy('id','DESC')->get();
    	return view('front.checkout',compact("carts","total_price","payments"));
    }

    public function submit_checkout(Request $request)
    {

              $order_number=rand(10000,99999);
              $carts=carts();
              $first_cart=first_cart();
                
              //inser Order table
              $order                  =new Order();
              $order->user_id         =Auth::user()->id;
              $order->quantity        =total_item();
              $order->amount          =total_price();
              $order->total_item_total=total_price();
              $order->sub_total       =sub_total();
              $order->tax             =tax();
              $order->shipping_charge =shipping_charge();
              $order->grand_total     =grand_total();
              $order->order_number    =$order_number;
              $order->order_note      =$request->note;
              $order->payment_id      =$request->payment_id;

              if ($request->has('transaction_number')) 
              {
                $order->transaction_number=$request->transaction_number;
              }
              

              if ($first_cart->coupon_id!=null) 
              {
                  $order->coupon_id=$first_cart->coupon_id;
              }

        
              $order->save();
             
              foreach ($carts as $cart) {
                
                $order_detail                  =new OrderDetail();
                $order_detail->order_id        =$order->id;
                $order_detail->product_id      =$cart->product_id;
                $order_detail->user_id         =Auth::user()->id;
                $order_detail->product_quantity=$cart->quantity;
                $order_detail->save();
            
              }
             // insert data into billing details table
              $billing_detail                  =new BillingDetail();
              $billing_detail->user_id         =Auth::user()->id;
              $billing_detail->order_id        =$order->id;
              $billing_detail->customer_name   =$request->name;
              $billing_detail->customer_email  =$request->email;
              $billing_detail->customer_phone  =$request->phone;
              $billing_detail->customer_address=$request->address;
              $billing_detail->zip_code        =$request->zip_code;
              $billing_detail->city            =$request->city;;
          
              $billing_detail->save();

              foreach ($carts as $c) 
              {
                $c->delete();
              }
              $orders=OrderDetail::where('order_id',$order->id)->get();
              session()->flash('message','Your order has placed successfully.Our team will contact with you as soon as possible');
              return view('front.checkout_success',compact('orders','order'));
          
       

    }


    public function success_checkout()
    {
       
       $status_code=$_GET['status_code'];
      if ($status_code ==="00_0000_000") {
           $info          =Session::get('info');
           $order_id      =$_GET['order_id'];
           $payment_ref_id=$_GET['payment_ref_id'];

            $order_number=rand(10000,99999);
            $carts=carts();
            $first_cart=first_cart();
              
            //inser Order table
            $order                    =new Order();
            $order->user_id           =Auth::user()->id;
            $order->quantity          =total_item();
            $order->amount            =total_price();
            $order->total_item_total  =total_price();
            $order->sub_total         =sub_total();
            $order->tax               =tax();
            $order->shipping_charge   =shipping_charge();
            $order->grand_total       =grand_total();
            $order->order_number      =$order_number;
            $order->order_note=$info['order_note'];
            $order->order_id=$order_id;
            

            if ($first_cart->coupon_id!=null) 
            {
                $order->coupon_id=$first_cart->coupon_id;
            }

    
             $order->save();
            foreach ($carts as $cart) {
              
              $order_detail                  =new OrderDetail();
              $order_detail->order_id        =$order->id;
              $order_detail->product_id      =$cart->product_id;
              $order_detail->user_id         =Auth::user()->id;
              $order_detail->product_quantity=$cart->quantity;
              $order_detail->save();
          
            }
           // insert data into billing details table
            $billing_detail                  =new BillingDetail();
            $billing_detail->user_id         =Auth::user()->id;
            $billing_detail->order_id        =$order->id;
            $billing_detail->customer_name   =$info['customer_name'];
            $billing_detail->customer_email  =$info['customer_email'];
            $billing_detail->customer_phone  =$info['customer_phone'];
            $billing_detail->customer_address=$info['customer_address'];
            $billing_detail->zip_code        =$info['zip_code'];
            $billing_detail->city            =$info['city'];
        
            $billing_detail->save();

            foreach ($carts as $c) 
            {
              $c->delete();
            }
            $orders=OrderDetail::where('order_id',$order->id)->get();
            return view('front.checkout_success',compact('orders','order','order_id','payment_ref_id'));
        
      }else{
        return '<a href="'.route('checkout').'">Your Transaction is failed. Please Checkout again<a/>';
      }
      
    }

    
    public function process_payment()
    {
    
       // return app_path().'\Helpers\helper.php';
        include(app_path() . '/Helpers/helper.php');
       
     
       date_default_timezone_set('Asia/Dhaka');

       $MerchantID = "683002007104225";
       $DateTime = Date('YmdHis');
       $amount = grand_total();
       $OrderId = 'TEST'.strtotime("now").rand(1000, 10000);
       $random = generateRandomString();    

       $PostURL = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/initialize/" . $MerchantID . "/" . $OrderId;

       $_SESSION['orderId'] = $OrderId;

       // $merchantCallbackURL = "http://localhost/Nagad_Integration-eCommerce-PHP_V2.2/merchant-callback-website.php";
       $merchantCallbackURL = URL::to('/success_checkout');

       $SensitiveData = array(
           'merchantId' => $MerchantID,
           'datetime' => $DateTime,
           'orderId' => $OrderId,
           'challenge' => $random
       );

       $PostData = array(
           'accountNumber' => '01711428036', //Replace with Merchant Number
           'dateTime' => $DateTime,
           'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveData)),
           'signature' => SignatureGenerate(json_encode($SensitiveData))
       );

       // echo json_encode($PostData); 
       // echo "<br/>";
       // echo $PostURL;
       // exit;
       $Result_Data = HttpPostMethod($PostURL, $PostData);

       // var_dump($Result_Data); exit;
       if (isset($Result_Data['sensitiveData']) && isset($Result_Data['signature'])) {
           if ($Result_Data['sensitiveData'] != "" && $Result_Data['signature'] != "") {

               $PlainResponse = json_decode(DecryptDataWithPrivateKey($Result_Data['sensitiveData']), true);


               if (isset($PlainResponse['paymentReferenceId']) && isset($PlainResponse['challenge'])) {


                   $paymentReferenceId = $PlainResponse['paymentReferenceId'];


                   $randomServer = $PlainResponse['challenge'];

                   $SensitiveDataOrder = array(
                       'merchantId' => $MerchantID,
                       'orderId' => $OrderId,
                       'currencyCode' => '050',
                       'amount' => $amount,
                       'challenge' => $randomServer
                   );

                   $logo = "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png";
                   $merchantAdditionalInfo = '{"serviceLogoURL": "'.$logo.'", "additionalFieldNameEN": "Color", "additionalFieldNameBN": "রং","additionalFieldValue": "White"}';

                   $PostDataOrder = array(
                       'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveDataOrder)),
                       'signature' => SignatureGenerate(json_encode($SensitiveDataOrder)),
                       'merchantCallbackURL' => $merchantCallbackURL,
                       'additionalMerchantInfo' => json_decode($merchantAdditionalInfo)
                   );

                             
                   $OrderSubmitUrl = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/complete/" . $paymentReferenceId;
                   $Result_Data_Order = HttpPostMethod($OrderSubmitUrl, $PostDataOrder);
                   
                       if ($Result_Data_Order['status'] == "Success") {
                           $url = json_encode($Result_Data_Order['callBackUrl']);   
                           echo "<script>window.open($url, '_self')</script>";  
                                   
                       }
                       else {
                           echo json_encode($Result_Data_Order);
                            
                       }
               } else {
                   echo json_encode($PlainResponse);
                       
               }
           }
       }

    }
}
