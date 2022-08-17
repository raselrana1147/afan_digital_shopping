@extends('layouts.app')
@section('title',config('constant.company_name').' Ecommerce')
@section('main')
	<div class="wrapper">
	    <div id="top-home-blocks" class="grid--full grid--table">
	       @include('front.files.category')
	        @include('front.files.slider')
	    </div>
	   
	    @include('front.files.featured')

	    @include('front.files.new_arrival')
	    
	    @include('front.files.trending')
	    @include('front.files.best_sale')
	    
	</div>
@endsection

