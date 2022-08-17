@extends('layouts.app')
@section('title',config('constant.company_name').' Order Completion')
@section('ecommerce_css')
	
@endsection
@section('main')
	<main class="main-content">
		<div class="main-container container" style="margin: 0 auto;width: 80%">
			<ul class="breadcrumb">
				
				<li><a href="#"><i class="fa fa-home"></i></a></li>
				<li><a href="#">Order Infomation</a></li>
					<div class="buttons clearfix">
					  <div class="alert alert-success" style="background: green;padding: 12px;color: white"> {{ session('message') }} <a href="{{ route('front.index') }}" style="color: white"><strong>Continue Shopping</strong></a></div>
				    </div>
			</ul>
			
			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-sm-9">
					<h2 class="title">Order Information</h2>

					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td colspan="2" class="text-left">Order Details</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width: 50%;" class="text-left"> <b>Order ID:</b> {{$order->order_number}}
									<br>
									<b>Date Added:</b> {{date('d/M/Y',strtotime($order->created_at))}}</td>
								<td style="width: 50%;" class="text-left"> <b>Payment Method:</b> Nagad
									<br>
									
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
								<td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-left">{{config('constant.company_name')}}
									<br>{{config('constant.company_email')}}
									<br>{{config('constant.company_phone')}}
									<br>{{config('constant.company_address')}}
									</td>
								<td class="text-left">{{$order->billing->customer_name}}
									<br>{{$order->billing->email}}
									<br>{{$order->billing->customer_phone}}
									<br>{{$order->billing->customer_city}}
									<br>{{$order->billing->customer_address}}</td>
							</tr>
						</tbody>
					</table>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<td class="text-left">Product Name</td>
									<td class="text-left">Model</td>
									<td class="text-right">Quantity</td>
									<td class="text-right">Price</td>
									<td class="text-right">Total</td>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $item)
									
								<tr>
									<td class="text-left">{{$item->product->name}}</td>
									<td class="text-left">
										<img width="60px" src="{{ asset('assets/backend/image/product/small/'.$item->product->thumbnail) }}" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail">
									</td>
									<td class="text-right">{{$item->product_quantity}}</td>
									<td class="text-right">{{price_format($item->product->current_price)}}</td>
									<td class="text-right">{{price_format($item->product->current_price*$item->product_quantity)}}</td>
									
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td class="text-right"><b>Sub-Total</b>
									</td>
									<td class="text-right">{{price_format($order->sub_total)}}</td>
									<td></td>
								</tr>
								<tr>
									<td colspan="3"></td>
									<td class="text-right"><b>Flat Shipping</b>
									</td>
									<td class="text-right">{{price_format(shipping_charge())}}</td>
									<td></td>
								</tr>
								
								<tr>
									<td colspan="3"></td>
									<td class="text-right"><b>VAT (20%)</b>
									</td>
									<td class="text-right">{{price_format(tax())}}</td>
									<td></td>
								</tr>
								<tr>
									<td colspan="3"></td>
									<td class="text-right"><b>Grand Total</b>
									</td>
									<td class="text-right">{{price_format($order->grand_total)}}</td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
					
				</div>
			
				<!--Right Part End -->
			</div>
		</div>	  
	</main>
@endsection
