@extends('layouts.app')
@section('title',config('constant.company_name').' View Cart')
@section('main')
			
<main class="main-content">
	<div class="breadcrumb-wrapper">
		<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
			<a href="{{ route('front.index') }}" title="Back to the frontpage">Home</a>
			<span aria-hidden="true">&rsaquo;</span>
			<span>Shopping Cart Page</span>
		</nav>
		<h1 class="section-header__title">Shopping Cart</h1>
	</div>
	<div class="wrapper cart_section">
		@if (total_item()>0)

			<table class="cart-table full table--responsive">
				<thead class="cart__row cart__header-labels">
					<tr>
						<th class="text-center">
							Product
						</th>
						<th class="text-center">
							Price
						</th>
						<th class="text-center">
							Quantity
						</th>
						<th class="text-center">
							Total
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach (carts() as $cart)
						
					<tr class="cart__row table__section cart_row{{$cart->id}}">
						<td class="product-name" data-label="Product">
							<div class="img_item">
								<a href="{{ route('product.detail',$cart->product->slug) }}" class="cart__image">
								<img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="" style="width: 150px;height: 80px">
								</a>
							</div>
							<p class="product-title">
								<a href="{{ route('product.detail',$cart->product->slug) }}">
								{{ $cart->product->name }} </a>
							</p>
							<div class="variant">
								<small> {{ $cart->size }}  {{ $cart->color }}</small>
							</div>
							<a href="javascript:;" class="cart__remove">
							      <small class="delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}">Remove</small>
							</a>
						</td>
						<td data-label="Price">
							<span class="h3">
							<span class="money">{{ price_format($cart->product->current_price) }}</span>
							</span>
						</td>
						<td>
							<div class="js-qty">
								<input type="number" id="quantity{{$cart->id}}" class="quantity_cart update_cart" value="{{$cart->quantity}}" min="1"  pattern="[0-9]*" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}">
							</div>
						</td>
						<td data-label="Total" class="text-center">
							<span class="h3">
							<span class="money each_cart_price{{$cart->id}}">{{price_format($cart->product->current_price*$cart->quantity)}}</span>
							</span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="grid cart__row">
				<div class="grid__item two-thirds small--one-whole">
					
				</div>
				<div class="grid__item text-right one-third small--one-whole">
					<p>
						<span class="cart__subtotal-title">Subtotal</span>
						<span class="h3 cart__subtotal"><span class="money" data-currency-usd="$223.00">{{price_format(sub_total())}}</span></span>
					</p>
					<p>
						<span class="cart__subtotal-title">Shipping charge</span>
						<span class="h3 cart__subtotal"><span class="money" data-currency-usd="$223.00">{{price_format(shipping_charge())}}</span></span>
					</p>
					<p>
						<span class="cart__subtotal-title">Vat + Tax</span>
						<span class="h3 cart__subtotal"><span class="money" data-currency-usd="$223.00">{{price_format(tax())}}</span></span>
					</p>

					<p>
						<span class="cart__subtotal-title">Grand Total</span>
						<span class="h3 cart__subtotal"><span class="money" data-currency-usd="$223.00">{{price_format(grand_total())}}</span></span>
					</p>
					<p>
						<em>Shipping &amp; taxes calculated at checkout</em>
					</p>
					
					<a href="{{ route('front.index') }}" class="btn btn2 update-cart">Continue Shopping</a>
				</div>
			</div>
			@else
			<h4 class="text-center">Empty Cart</h4>
		@endif
		<div id="shipping-calculator">
			<h3>Order Shipping and Billing Details</h3>
			<form action="{{ route('submit.checkout') }}" method="POST">
				@csrf
			<div class="shipping-selector">
				<p class="field">
					<label>Name</label>
					<input type="text"  name="name" required="" value="{{Auth::user()->name}}">
				</p>

				<p class="field">
					<label>Email</label>
					<input type="text" name="email" required="" value="{{Auth::user()->email}}">
				</p>


				<p class="field">
					<label>Phone</label>
					<input type="text"  name="phone" required="" value="{{Auth::user()->phone}}">
				</p>

				<p class="field">
					<label>Address</label>
					<input type="text"  name="address" required="" value="{{Auth::user()->address}}">
				</p>
				<p class="field">
					<label>City</label>
					<select  name="city">
						@foreach (cities() as $city)
						  <option value="{{$city}}">{{$city}}</option>
					  @endforeach
					</select>
				</p>
	
				<p class="field">
					<label>Zip/Postal Code</label>
					<input type="text" name="zip_code">
				</p>
				<p class="field">
					<label>Order Note (Optional)</label>
					<input type="text" name="note">
				</p>
				@php
					$payments=DB::table('payments')->get();
				@endphp
				<p class="field">
					<label>Payment Method</label>
				
					 @foreach ($payments as $payment)

					   <input type="radio" class="select_payment" name="payment_id" value="{{$payment->id}}"  {{($payment->account_number==NULL) ? 'checked' : ''}} account_number="{{$payment->account_number}}" image_name="{{$payment->image}}" account_type="{{$payment->type}}" ref_num="{{$payment->ref_number}}">
					        {{$payment->payment_name}}
					  @endforeach
					
				</p>
				<p id="payment_area" class="field" style="display: none">
				    <label>Transaction Number</label>      
		         
		            <input type="text" class="form-control" name="transaction_number" id="transaction_number" /> 

		            <img src="" class="set_image" style="width: 40px;height: 40px;position: absolute;"><br>
				</p>

				<p id="accountt_area" class="field" style="display:none">
				    <label>Account Number</label>  
				    <span class="set_number" style="font-weight: 600"></span>     
				</p>

				<p class="field">
					<input type="submit" class="get-rates btn button" value="Confirm Checkout">
				</p>
			</div>
		</form>
		</div>
	</div>
</main>
@endsection

@section('ecommerce_js')

<script>
    $(document).ready(function(){
        $('body').on('click','.select_payment',function(){
            let payment_id=$(this).val();
            let account_number=$(this).attr('account_number');
            let type=$(this).attr('account_type');
            let ref_num=$(this).attr('ref_num');

            if (account_number=="") {
                $('#account_number').text();
                $('#payment_area, #accountt_area').hide();
                $('#transaction_number').removeAttr('required');
            }else{
                $('.set_number').text(account_number+' ( '+type+' ) '+' Referal Number '+ref_num);
                $('#payment_area, #accountt_area').show();
                $('#transaction_number').attr('required', 'true');
                let image=$(this).attr('image_name')
                $('.set_image').attr('src', '{{ asset('assets/backend/image/payment/small/') }}'+'/'+image);
            }
        });

      
    });
</script>
@endsection