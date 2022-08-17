@extends('layouts.app')
@section('title',config('constant.company_name').'Product Wishlist')
@section('main')
	<main class="main-content">
		<div class="breadcrumb-wrapper">
			<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
				<a href="{{ route('front.index') }}" title="Back to the frontpage">Home</a>
				<span aria-hidden="true">&rsaquo;</span>
				<span>Wishlist Page</span>
			</nav>
			<h1 class="section-header__title">Wishlist Page</h1>
		</div>
		<div class="wrapper  wishlist_section">
			@if (total_wishlist()>0)
			<div id="col-main" class="clearfix">
				<div class="page">
					<div class="table-cart">
						<div class="wrap-table">
							<table class="wishlist-items full table--responsive">
							<thead class="cart__row">
							<tr class="top-labels">
								<th class="text-center">
									Items
								</th>
								<th>
									Price
								</th>
								<th>
									Remove
								</th>
								<th>
									Buy Now
								</th>
							</tr>
							</thead>
							<tbody>

							@foreach ($wishlists as $wishlist)
								
							<tr class="cart__row wishlist_row{{$wishlist->id}}">
								<td class="product-name" data-label="Items">
									<div class="img_item">
										<a class="image text-left" href="{{ route('product.detail',$wishlist->product->slug) }}"><img src="{{ asset('assets/backend/image/product/small/'.$wishlist->product->thumbnail) }}" alt="Consequuntur magni dolores"></a>
									</div>
									<div class="link">
										<p class="product-title">
											<a class="title text-left" href="product.html">{{$wishlist->product->name}}</a>
										</p>
									</div>
								</td>
								<td class="title-1" data-label="Price">
									<span class="h3"><span class="money" data-currency-usd="$19.99">{{price_format($wishlist->product->current_price)}}</span></span>
								</td>
								<td class="action" data-label="Remove">
										<button type="button" class="delete_wishlist" wishlist_id="{{$wishlist->id}}" data-action="{{ route('wishlist.delete') }}"><i class="fa fa-times-circle"></i></button>
								</td>
								<td data-label="Buy Now">
										<button class="btn btn-1 add-to-cart add_to_cart_single" data-parent="" type="button" product_id="{{$wishlist->product_id}}" data-action="{{ route('add_to_cart_single') }}"><i class="fa fa-shopping-cart"></i> Buy Now</button>
								</td>
							</tr>
						@endforeach
						
							</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
			@else
			<h4>Empty Wishlist</h4>
			@endif
		</div>
	</main>
@endsection