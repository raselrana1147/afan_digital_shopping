<div class="grid__item large--one-quarter">
                        <div class="group_sidebar">
                            <div class="sb-wrapper all-collections-wrapper clearfix" data-animate="" data-delay="0">
                                <h6 class="sb-title">All Categories</h6>
                                <ul class="list-unstyled sb-content all-collections list-styled">
                                    @foreach (categories() as $category)
                                        
                                    <li>
                                      <a href="{{ route('product.category_product',$category->id) }}"><span><i class="fa fa-angle-right"></i> {{$category->category_name}}</span><span class="collection-count"> (6)</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="sb-wrapper featured-product-wrapper clearfix" data-animate="" data-delay="0">
                                <div class="featured-product">
                                    <h6 class="sb-title">Best Sale</h6>
                                    <div class="sb-content featured-product-content">
                                        @foreach (best_sales() as $product)
                                        
                                        <div class="element full_width" data-animate="fadeInUp" data-delay="0">
                                            <div class="grid__item large--one-quarter medium--one-half">
                                                <div class="grid__item_wrapper">
                                                    <div class="grid__image product-image">
                                                        <a href="{{ route('product.detail',$product->slug) }}" class="grid__image product-image">
                                                        <img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" alt="Consequuntur magni dolores">
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
                                                        <span class="spr-badge" id="spr_badge_3008529987" data-rating="4.0">
                                                        <span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span>
                                                        <span class="spr-badge-caption">
                                                        1 review </span>
                                                        </span>
                                                    </div>
                                                    <p class="h6 product-title">
                                                        <a href="product.html">{{$product->name}}</a>
                                                    </p>
                                                    <p class="product-price">
                                                        <strong>On Sale</strong>
                                                        <span class="money">{{price_format($product->current_price)}}</span>

                                                        <span class="visually-hidden">Regular price</span>
                                                        @if ($product->previous_price>$product->current_price)
                                                        <s><span class="money" data-currency-usd="$24.99">{{price_format($product->previous_price)}}</span></s>
                                                        @endif
                                                    </p>
                                                    <div class="list-mode-description">
                                                        {{$product->title}}
                                                    </div>
                                                    <ul class="action-button">
                                                        <li class="add-to-cart-form">
                                                        
                                                                <button type="button" name="add" id="AddToCart" class="btn btn-1 add-to-cart add_to_cart_single" product_id="{{$product->id}}" data-action="{{ route('add_to_cart_single') }}" title="Buy Now"><span><i class="fa fa-shopping-cart"></i> Buy Now</span></button>
                                                            
                                                        </li>
                                                        <li class="wishlist">
                                                        <a class="wish-list btn add_to_wishlist" href="javascript:;" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart" title="Wishlist"></i></a>
                                                        </li>
                                                        <li class="email">
                                                        <a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="Email to friend"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="sb-wrapper slider-banner-wrapper clearfix" data-animate="" data-delay="0">
                                <img src="assets/images/sb-banner.png" alt="">
                            </div>
                        </div>
                    </div>