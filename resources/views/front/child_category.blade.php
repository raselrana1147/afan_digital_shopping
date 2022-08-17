@extends('layouts.app')
@section('title',config('constant.company_name').' Child Category Product')
@section('main')
		<main class="main-content">
			<div class="breadcrumb-wrapper">
				<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
					<a href="{{ route('front.index') }}" title="Back to the frontpage">Home</a>
					<span aria-hidden="true">&rsaquo;</span>
					<span>{{$child->child_cate_name}}</span>
				</nav>
				<h1 class="section-header__title">{{$child->child_cate_name}}</h1>
			</div>
			<div class="wrapper">
				<div id="filter-loading" style="display:none">
					<img src="assets/images/gears.svg" alt="filter loading">
				</div>
				<div class="grid--rev" id="collection">
					<div class="grid__item large--three-quarters">
						<header class="section-header section-grid">
							<div class="section-header__right section-sorting">
								
								<div class="collection-view">
									<button type="button" title="Grid view" class="grid-button change-view change-view--active" data-view="grid">
									<span class="icon-fallback-text">
									<span class="icon icon-grid-view" aria-hidden="true"></span>
									<span class="fallback-text">Grid view</span>
									</span>
									</button>
									<button type="button" title="List view" class="list-button change-view " data-view="list">
									<span class="icon-fallback-text">
									<span class="icon icon-list-view" aria-hidden="true"></span>
									<span class="fallback-text">List view</span>
									</span>
									</button>
								</div>
							</div>
						</header>
						<div class="grid-uniform grid-uniform-category ">
							@foreach ($products as $product)
								
							<div class="grid__item large--one-quarter medium--one-half">
								<div class="grid__item_wrapper">
									<div class="grid__image product-image">
										<a href="{{ route('product.detail',$product->slug) }}">
											<img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="Demo Product Sample">
										</a>
										{{-- <div class="quickview">
											<div class="product-ajax-cart hidden-xs hidden-sm">
												<div data-handle="consequuntur-magni-dolores" class="quick_shop-div">
													<a href="#quick-shop-modal" class="btn quick_shop">
														<i class="fa fa-eye" title="Quick View"></i>																
													</a>
												</div>
											</div>
										</div> --}}
									</div>
									<div class="rating-star">
										<span class="spr-badge" id="spr_badge_3008529987" data-rating="0.0">
											<span class="spr-starrating spr-badge-starrating">
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
												<i class="spr-icon spr-icon-star-empty" style=""></i>
											</span>
											<span class="spr-badge-caption">No reviews </span>
										</span>
									</div>
									<p class="h6 product-title">
										<a href="product.html">{{$product->name}}</a>
									</p>
									<p class="product-price">
										<strong>On Sale</strong>
										<span class="money">{{price_format($product->current_price)}}</span>
										@if ($product->previous_price>$product->current_price)
											<span class="visually-hidden">Regular price</span>
											<s><span class="money" data-currency-usd="$24.99">{{price_format($product->previous_price)}}</span></s>
										@endif
										
									</p>
									<div class="list-mode-description">
										{{$product->title}}
									</div>
									<ul class="action-button">
										<li class="add-to-cart-form">
											
											<button type="button" name="add" class="btn btn-1 add-to-cart add_to_cart_single" title="Buy Now"  product_id="{{$product->id}}" data-action="{{ route('add_to_cart_single') }}">
												<span><i class="fa fa-shopping-cart"></i> Buy Now</span>
											</button>
												
										</li>
										<li class="wishlist">
											<a class="wish-list btn add_to_wishlist" href="javascript:;" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart" title="Wishlist"></i></a>
										</li>
										{{-- <li class="email">
											<a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="Email to friend"></i></a>
										</li> --}}
									</ul>
								</div>
							</div> 
							@endforeach	

						</div>
						
						    {{$products->links()}}
						
					</div>

					@include('front.files.sidebar')
				</div>
			</div>
		</main>	
@endsection
