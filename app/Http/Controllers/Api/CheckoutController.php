<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Order;
use Illuminate\Http\Response;
use URL;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\BillingDetail;

class CheckoutController extends Controller
{
    
    public function __construct()
    {
         $this->middleware('auth:api')->except('payment_confirm');
    }

    public function get_payment_list()
    {
    	$payments=DB::table('payments')->get();
    	return response()->json([
			      'payments'=>$payments,
			      'status' =>200
		    ],Response::HTTP_OK);
    }
    
    
    public function checkout(Request $request)
    {

             
                //insert Order table
                $order                    =new Order();
                $order->user_id           =auth()->user()->id;
                $order->quantity          =$request->quantity;
                $order->amount            =$request->total_price;
                $order->total_item_total  =$request->total_price;
                $order->sub_total         =$request->total_price;
                $order->tax               =tax();
                $order->shipping_charge   =shipping_charge();
                $order->grand_total       =$request->total_price+tax()+shipping_charge();
                $order->order_number      =rand(10000,99999);
                $order->ip_address        =$request->ip;
                $order->latitude          =$request->latitude;
                $order->longitude         =$request->longitude;
                
                $order->order_id         =$request->order_id;

                if (!empty($request->coupon_id)) 
                {
                    $order->coupon_id=$request->coupon_id;
                }
                
                if (!empty($request->cash_on_delivery)) 
                {
                    $order->cash_on_delivery=$request->cash_on_delivery;
                }

                if (!empty($request->order_note)) 
                {
                    $order->order_note=$request->order_note;
                }
                 $order->save();
                
                //return $request->carts;

                foreach ($request->carts as $cart) 
                {
                    
                    $order_detail                  =new OrderDetail();
                    $order_detail->order_id        =$order->id;
                    $order_detail->product_id      =$cart['product_id'];
                    $order_detail->user_id         =auth()->user()->id;
                    $order_detail->product_quantity=$cart['quantity'];
                    $order_detail->save();
                    
                   
            
                }
           
              
                $billing_detail=new BillingDetail();
                $billing_detail->user_id         =auth()->user()->id;
                $billing_detail->order_id        =$order->id;
                $billing_detail->customer_name   =$request->name;
                $billing_detail->customer_email  =$request->email;
                $billing_detail->customer_phone  =$request->phone;
                $billing_detail->customer_address=$request->address;
                $billing_detail->zip_code        =$request->zip_code;;
                $billing_detail->city            =$request->city;
        
                $billing_detail->save();

                return response()->json([
                          'message'=>"Your order has been place successfully",
                          "order_number"=>$order->order_number,
                          'status' =>200
                    ],Response::HTTP_OK);

    }
    
    
    
    
    public function amount_set(Request $request)
    {

       if ($request->isMethod('post')) 
       {
         $amount=$request->amount;
         return response()->json([
                   'url'=>route('payment_confirm',$amount),
                   'status' =>200
             ],Response::HTTP_OK);

       }

    }
    
    
    public function payment_confirm($amount)
    {
          include(app_path() . '/Helpers/helper.php');

          date_default_timezone_set('Asia/Dhaka');

          $MerchantID = "683002007104225";
          $DateTime = Date('YmdHis');
          $amount = $amount;
          $OrderId = 'TEST'.strtotime("now").rand(1000, 10000);
          $random = generateRandomString();    

          $PostURL = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/initialize/" . $MerchantID . "/" . $OrderId;

          $_SESSION['orderId'] = $OrderId;

          // $merchantCallbackURL = "http://localhost/Nagad_Integration-eCommerce-PHP_V2.2/merchant-callback-website.php";
          $merchantCallbackURL = URL::to('/api_callback');

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
