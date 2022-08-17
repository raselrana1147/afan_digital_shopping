@extends('layouts.app')
@section('title',config('constant.company_name').' Product Detail')
@section('ecommerce_css')
		<link href="{{ asset('assets/frontend/assets/css/social-buttons.scss.css/css/social-buttons.scss.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection
@section('main')
	<main class="main-content">
		<div class="breadcrumb-wrapper">
			<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
				<a href="{{ route('front.index') }}" title="Back to the frontpage">Home</a>
				<span aria-hidden="true">&rsaquo;</span>
				<span>Products Detail Page</span>
			</nav>
			<h1 class="section-header__title">Products Detail Page</h1>
		</div>
		<div class="wrapper">
			<div class="grid--rev">
				<div class="grid__item">
					<div itemscope="" itemtype="http://schema.org/Product">
						<div class="product-single">
							<div class="grid__item large--one-half text-center">
								<div class="product-single__photos" id="ProductPhoto">
									<img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="Corporis suscipit laboriosam" id="ProductPhotoImg" data-image-id="7500291971">
								</div>
								<ul class="product-single__thumbnails grid-uniform" id="ProductThumbs">
									<li class="thumb__element">
										<a href="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" class="product-single__thumbnail">
											<img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="Corporis suscipit laboriosam">
										</a>
									</li>
									@foreach ($product->galleries as $gallery)
										
									<li class="thumb__element">
										<a href="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" class="product-single__thumbnail">
											<img src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" alt="Corporis suscipit laboriosam">
										</a>
									</li>
									@endforeach										
								</ul>
							</div>
							<div class="grid__item large--one-half">
								<div class="product-info-left grid__item five-eighths">
									<h1 itemprop="name">{{$product->name}}</h1>
									<div class="rating-star">
										<span class="spr-badge" id="spr_badge_3008529923" data-rating="0.0">
										<span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span>
										<span class="spr-badge-caption">
										No reviews </span>
										</span>
									</div>
									<div class="product-description" itemprop="description">
										<h4>Quick View</h4>
										{{$product->title}}
									</div>
									<div class="product-vendor">
										Brand: <b>{{$product->brand->brand_name}}</b>
									</div>
									<div class="product-type">
										Type: <b>{{$product->category->category_name}}</b>
									</div>
									<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
										<meta itemprop="priceCurrency" content="USD">
										<link itemprop="availability" href="http://schema.org/InStock">
										<div class="product-action ">
											<form id="submit_cart_form" data-action="{{ route('add_to_cart') }}" method="POST" class="form-vertical">
												@csrf
												<input type="hidden" name="product_id" value="{{$product->id}}">
												@if (!is_null($product->size))
													 @php
                                                        $sizes=json_decode($product->size);
                                                    @endphp
													<div class="selector-wrapper">
														<label for="productSelect-option-0">Size</label>
														<select class="single-option-selector" data-option="option1" name="size">
															@foreach ($sizes as $size)
																<option value="{{$size}}">{{$size}}</option>
															@endforeach													
														</select>
													</div>
                                                @endif
                                                @if (!is_null($product->size))
                                                 @php
                                                       $colors=json_decode($product->color);
                                                  @endphp
												<div class="selector-wrapper">
													<label for="productSelect-option-1">Color</label>
													<select class="single-option-selector" data-option="option2" name="color">
														@foreach ($colors as $color)
																<option value="{{$color}}">{{$color}}</option>
															@endforeach	
													</select>
												</div>
												@endif
												<select name="id" id="productSelect" class="product-single__variants hide" style="display: none;">
													<option selected="selected" data-sku="" value="8772462979">XS / Black - $89.00 USD</option>
												</select>
												<hr>
												<span class="visually-hidden">Regular price</span>
												<span id="ProductPrice" class="" itemprop="price"><span class="money" data-currency-usd="$89.00 USD" data-currency="USD">{{price_format($product->current_price)}}</span></span>
												<div class="qty_select">
													<label for="Quantity" class="quantity-selector">Quantity</label>
													<div class="js-qty">
														<button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
														<span class="icon icon-minus" aria-hidden="true"></span>
														<span class="fallback-text">−</span>
														</button>
														<input type="text" class="js-qty__num" value="1" min="1" aria-label="quantity" pattern="[0-9]*" name="quantity" >
														<button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
														<span class="icon icon-plus" aria-hidden="true"></span>
														<span class="fallback-text">+</span>
														</button>
													</div>
												</div>
												<button type="submit" name="add" id="AddToCart" class="btn">
												<span id="AddToCartText">Buy Now</span>
												</button>
											</form>
											<div class="add-to-wishlist">
												<span class="non-user" data-toggle="tooltip" data-placement="right" title="To use the Wish-list, you must Login or Register"><a href="javascript:;" class="add_to_wishlist" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart"></i>Add to Wishlist</a></span>
											</div>
										</div>
									</div>
									<div class="detail-social">
										<div class="social-sharing">
											<a target="_blank" href="#" class="share-facebook">
											<span class="icon icon-facebook" aria-hidden="true"></span>
											<span class="share-title">Share</span>
											<span class="share-count">0</span>
											</a>
											<a target="_blank" href="#" class="share-twitter">
											<span class="icon icon-twitter" aria-hidden="true"></span>
											<span class="share-title">Tweet</span>
											<span class="share-count">0</span>
											</a>
											<a target="_blank" href="#" class="share-pinterest">
											<span class="icon icon-pinterest" aria-hidden="true"></span>
											<span class="share-title">Pin it</span>
											<span class="share-count">0</span>
											</a>
											<a target="_blank" href="#" class="share-fancy">
											<span class="icon icon-fancy" aria-hidden="true"></span>
											<span class="share-title">Fancy</span>
											</a>
											<a target="_blank" href="#" class="share-google">
											<!-- Cannot get Google+ share count with JS yet -->
											<span class="icon icon-google" aria-hidden="true"></span>
											<span class="share-count">+1</span>
											</a>
											<a target="_blank" href="#" class="share-email">
											<i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="grid__item product-info-right three-eighths">
									<div class="product-extrainfo">
										<ul>
											<li><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-shield fa-stack-1x fa-inverse"></i></span><span class="detail_more_info">guarantee<span class="sub">Quality checked</span></span></li>
											<li><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-truck fa-stack-1x fa-inverse"></i></span><span class="detail_more_info">Free Shipping<span class="sub">Free on all products</span></span></li>
											<li><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-gift fa-stack-1x fa-inverse"></i></span><span class="detail_more_info">Special gift cards<span class="sub">Special gift cards</span></span></li>
											<li><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-reply fa-stack-1x fa-inverse"></i></span><span class="detail_more_info">Free return<span class="sub"> Within 7 days</span></span></li>
											<li><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-tty fa-stack-1x fa-inverse"></i></span><span class="detail_more_info">Consultancy<span class="sub">Lifetime 24/7/356</span></span></li>
										</ul>
									</div>
								</div>
								<div class="next-prev-button">
								</div>
							</div>
						</div>
						<div class="product-information">
							<div id="tabs-information">
								<ul class="nav nav-tabs tabs-left sideways">
									<li class="description"><a href="#desc" data-toggle="tab" class="active">Description</a></li>
									
									<li class="delivery"><a href="#delivery" data-toggle="tab">Specification</a></li>
									<li class="payment"><a href="#payment" data-toggle="tab">Return Policy</a></li>
									<li class="reviews"><a href="#customerreview" data-toggle="tab">Customer Review</a></li>
								</ul>
								<div class="tab-panel active" id="desc">
									{!!$product->description!!}
								</div>
								<div class="tab-panel fade " id="delivery">
									{!!$product->spacification!!}
								</div>
								<div class="tab-panel fade " id="payment">
									{!!$product->return_policy!!}
								</div>
								<div class="tab-panel fade " id="customerreview">
									<div id="shopify-product-reviews" data-id="3008529923">
										<div class="spr-container">
											<div class="spr-header">
												<h2 class="spr-header-title">Customer Reviews</h2>
												<div class="spr-summary" itemscope="" itemtype="http://data-vocabulary.org/Review-aggregate">
													<meta itemprop="itemreviewed" content="Corporis suscipit laboriosam">
													<meta itemprop="votes" content="0">
													<span itemprop="rating" itemscope="" itemtype="http://data-vocabulary.org/Rating" class="spr-starrating spr-summary-starrating">
													<meta itemprop="average" content="0.0">
													<meta itemprop="best" content="5">
													<meta itemprop="worst" content="1">
													<i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i>
													</span>
													<span class="spr-summary-caption">
													No reviews yet </span>
													<span class="spr-summary-actions">
													<a href="#" class="spr-summary-actions-newreview" onclick="SPR.toggleForm(3008529923);return false">Write a review</a>
													</span>
												</div>
											</div>
											<div class="spr-content">
												<div class="spr-form" id="form_3008529923" style="">
													<form method="post" action="#" id="new-review-form_3008529923" class="new-review-form" onsubmit="SPR.submitForm(this);return false;">
														<input type="hidden" name="review[rating]"><input type="hidden" name="product_id" value="3008529923">
														<h3 class="spr-form-title">Write a review</h3>
														<fieldset class="spr-form-contact">
															<div class="spr-form-contact-name">
																<label class="spr-form-label" for="review_author_3008529923">Name</label>
																<input class="spr-form-input spr-form-input-text " id="review_author_3008529923" type="text" name="review[author]" value="" placeholder="Enter your name">
															</div>
															<div class="spr-form-contact-email">
																<label class="spr-form-label" for="review_email_3008529923">Email</label>
																<input class="spr-form-input spr-form-input-email " id="review_email_3008529923" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
															</div>
														</fieldset>
														<fieldset class="spr-form-review">
															<div class="spr-form-review-rating">
																<label class="spr-form-label" for="review[rating]">Rating</label>
																<div class="spr-form-input spr-starrating ">
																	<a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="1">&nbsp;</a>
																	<a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="2">&nbsp;</a>
																	<a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="3">&nbsp;</a>
																	<a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="4">&nbsp;</a>
																	<a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="5">&nbsp;</a>
																</div>
															</div>
															<div class="spr-form-review-title">
																<label class="spr-form-label" for="review_title_3008529923">Review Title</label>
																<input class="spr-form-input spr-form-input-text " id="review_title_3008529923" type="text" name="review[title]" value="" placeholder="Give your review a title">
															</div>
															<div class="spr-form-review-body">
																<label class="spr-form-label" for="review_body_3008529923">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
																<div class="spr-form-input">
																	<textarea class="spr-form-input spr-form-input-textarea " id="review_body_3008529923" data-product-id="3008529923" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>
																</div>
															</div>
														</fieldset>
														<fieldset class="spr-form-actions">
															<input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
														</fieldset>
													</form>
												</div>
												<div class="spr-reviews" id="reviews_3008529923" style="display: none">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script>
					$('#tabs-information').easytabs({animationSpeed: 'fast', updateHash: false});
				  </script>
							<div id="product-additional-information">
								<div class="related-products">
									<h1 class="feature-title"><span>You may also like</span></h1>
									<ul class="related-products-items grid-uniform">
									@foreach ($releted_products as $related_product)
									<li class="realted-element">
									<div class="grid__item">
										<div class="grid__item_wrapper">
											<div class="grid__image product-image">
												<a href="{{ route('product.detail',$related_product->slug) }}">
													<img src="{{ asset('assets/backend/image/product/small/'.$related_product->thumbnail) }}" alt="Demo Product Sample">
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
												<a href="{{ route('product.detail',$related_product->slug) }}">{{$related_product->name}}</a>
											</p>
											<p class="product-price">
												<strong>On Sale</strong>
												<span class="money" data-currency-usd="$19.99">{{price_format($related_product->current_price)}}</span>
												@if ($related_product->previous_price>$related_product->current_price)
													<span class="visually-hidden">Regular price</span>
													<s><span class="money">{{price_format($related_product->previous_price)}}</span></s>
												@endif
												
											</p>
											<ul class="action-button">
												<li class="add-to-cart-form">
												                             
												        <div class="effect-ajax-cart">
												            
												            <button type="button" class="btn btn-1 add-to-cart add_to_cart_single" product_id="{{$related_product->id}}" data-action="{{ route('add_to_cart_single') }}" title="Buy Now">
												                <span id="AddToCartText"><i class="fa fa-shopping-cart"></i> Buy Now</span>
												            </button>
												        </div>
												
												</li>
												<li class="wishlist">
													<a class="wish-list btn add_to_wishlist" href="javascript:;" product_id="{{$related_product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart" title="Wishlist"></i></a>
												</li>
												{{-- <li class="email">
													<a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="Email to friend"></i></a>
												</li> --}}
											</ul>
										</div>
									</div>
									</li>
									@endforeach
										
									
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>	
@endsection
@section('ecommerce_js')
	<script src="{{ asset('assets/frontend/assets/js/jquery.easytabs.min.js') }}" type="text/javascript"></script>
@endsection

