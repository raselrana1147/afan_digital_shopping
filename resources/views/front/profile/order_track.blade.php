@extends('layouts.app')
@section('title','Ecommerce | Order Track')
@section('ecommerce_css')
	<style>
		
	.bs4-order-tracking {
    margin-bottom: 30px;
    overflow: hidden;
    color: #878788;
    padding-left: 0px;
    margin-top: 30px
}

.bs4-order-tracking li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: #878788;
    text-align: center
}

.bs4-order-tracking li:first-child:before {
    margin-left: 15px !important;
    padding-left: 11px !important;
    text-align: left !important
}

.bs4-order-tracking li:last-child:before {
    margin-right: 5px !important;
    padding-right: 11px !important;
    text-align: right !important
}

.bs4-order-tracking li>div {
    color: #fff;
    width: 29px;
    text-align: center;
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #878788;
    border-radius: 50%;
    margin: auto
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
			       <h4>Order Lists </h4>
				</div>
				  <div class="card-body">
				  			
				  </div>
				</div>
			</div>
		</div>
	</div>
</div><br><br>
@endsection
@section('ecommerce_js')

@endsection
