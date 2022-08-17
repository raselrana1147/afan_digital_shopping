
 <!DOCTYPE html>
<html>
<head>
    <title>Anzam Payment</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/nagad.css') }}">
    
</head>
<body>
        <div class="payment-screen mobile-number-screen">
        <div class="payment-container" style="background-image: url('{{ asset('assets/frontend/bg.png')}}');">
        <div class="merchant-info">
            <div class="top-icon">
                <img class="img-fluid" src="{{ asset('assets/frontend/cart.png') }}" alt="Image">
            </div>
            <div class="merchant-name mt-3">Congratulation</div>
        </div>
        <div class="payment-infos">
            <p class="payment-info additional-field mb-0">
                <strong class="translateable" data-trans-key="invoice_no"></strong>&nbsp;
                <span>Order ID: 445</span>
            </p>

            <p class="payment-info additional-field mb-0">
                <strong class="translateable" data-trans-key="invoice_no"></strong>&nbsp;
                <span>Total Amount: BDT 4545</span>
            </p>

             <p class="payment-info additional-field mb-0">
                <strong class="translateable" data-trans-key="invoice_no"></strong>&nbsp;
                <span>Client Number:54545</span>
            </p>

            <p class="payment-info additional-field mb-0">
                <strong class="translateable" data-trans-key="invoice_no"></strong>&nbsp;
                <span>Payment Time:4545</span>
            </p>
            <p class="payment-info additional-field mb-0">
                <strong class="translateable" data-trans-key="invoice_no"></strong>&nbsp;
                <span>Issues Time: 445</span>
            </p>
        </div>
        
        <p>Note: Your payment has been taken successfully !!</p>
        <?php 
               $code=$_GET['status_code'];
              
          ?>

        @if ($code==="9999")
            <button onclick="myFunctionError()">Cancel</button>
         @else
             <!--<?php $order_id=$_GET['order_id']; ?>-->
           <button onclick="myFunctionSuccess('<?=$_GET['order_id']; ?>')">Succes</button>
       @endif
      

        <div class="nagad-logo">
            <img class="img-fluid" src="{{ asset('assets/frontend/logo.png') }}" alt="">
        </div>

    </div>
</div>

<script>
function myFunctionError(){
    
  Android.showToast("error");
  
}

function myFunctionSuccess(order_id)
{
   Android.showToast(order_id);
   
    

  
}
</script>
</body>
</html>






