@extends('layouts.app')
@section('title','Ecommerce | Order List')
@section('ecommerce_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/style/css/datatable.css') }}">
	<style>
		.dataTables_wrapper .dataTables_paginate .paginate_button.current{
      color:#fff !important;
    }
	</style>
@endsection

@section('ecommerce')
<div class="container">
	<div class="track-order-page">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header header-title bg-header">
				       <h4>Menu List</h4>
					</div>
				  <div class="card-body">

				 	@include('front.profile.sidebar')

				  </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
				<div class="card-header header-title bg-header">
			       <h4>Order Lists ({{count($orders)}})</h4>
				</div>
				  <div class="card-body">
				  	<br>
				    <table id="item_table" class="table table-bordered">
				       <thead>
				         <tr>
				           <th scope="col">Seial No #</th>
				           <th scope="col">Order Number</th>
				           <th scope="col">Quantity</th>
				           <th scope="col">Payment</th>
				           <th scope="col">Total Amount</th>
				           <th scope="col">Status</th>
				         </tr>
				       </thead>
				       <tbody>
				         @foreach ($orders as $order)
				         <tr>
				           <td>{{$loop->index+1}}</td>
				           <td>{{$order->order_number}}</td>
				           <td>{{$order->quantity}}</td>
				           <td>{{$order->payment->payment_name}}</td>
				           <td>{{currency()}}{{number_format($order->grand_total,2)}}</td>
				           <td><span class="">{{$order->status}}</span></td>
				         </tr>
				        @endforeach
				       </tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div><br><br>
@endsection
@section('ecommerce_js')
<script src="{{ asset('assets/frontend/style/js/datatable.js') }}"></script>
<script>
  $(document).ready(function(){
    $('#item_table').DataTable();
  });
</script>
@endsection
