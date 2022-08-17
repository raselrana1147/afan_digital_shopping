<div id="accessories-blocks" class="accessories-wrapper grid--full grid--table grid-block-full">
            <div class="accessories-inner">
                <div class="bh-top home-block-title">
                    <div class="collection-name">
                        <img class="collection-icon" src="{{ asset('assets/frontend/assets/images/sport.png')}}" alt=""><a href="collection.html">Best Sale</a>
                    </div>
                    <div class="collection-tags">
                        <ul class="bh-tags">          
                                   
                           {{--  <li class="link-to"><a href="#">See All</a></li>          --}}
                        </ul>
                    </div>
                </div>
                <div class="bh-btm">
                    <div class="bh-btm">
                        <div class="bh-btm">
                        <div class="grid__item three-quarters bh-left small--one-whole medium--one-whole">
                            <div class="home-slideshow-block bh-slideshow">
                                <div class="home-gallery-slider">
                                    @foreach (sliders('best') as $slider)
                                    <div><a href="{{$slider->url}}"><img src="{{ asset('assets/backend/image/slider/small/'.$slider->image)}}" alt=""></a></div>
                                    @endforeach  
                                </div>
                            </div>
                            <div class="home-products-block bh-products">
                                <div class="home-products-block-title">
                                    <span>Spotlight</span>
                                </div>
                                <div class="home-products-block-content">
                                    <div class="home-products-slider">
                                        @foreach ($best_sales as $best_sale)
                                          
                                        <div class="grid__item">
                                            <div class="grid__item_wrapper">
                                                <div class="grid__image product-image">
                                                    <a href="{{ route('product.detail',$best_sale->slug) }}">
                                                        <img src="{{ asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" alt="Demo Product Sample">
                                                    </a>
                                                   {{--  <div class="quickview">
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
                                                    <a href="{{ route('product.detail',$best_sale->slug) }}">{{$best_sale->name}}</a>
                                                </p>
                                                <p class="product-price">
                                                    <strong>On Sale</strong>
                                                    <span class="money" data-currency-usd="$19.99">{{price_format($best_sale->current_price)}}</span>
                                                   @if ($best_sale->previous_price>$best_sale->current_price)
                                                       <span class="visually-hidden">Regular price</span>
                                                   <s><span class="money" >{{price_format($best_sale->previous_price)}}</span></s>
                                                   @endif
                                                </p>
                                                <ul class="action-button">
                                                   <li class="add-to-cart-form">
                                                                                
                                                           <div class="effect-ajax-cart">
                                                               
                                                               <button type="button" class="btn btn-1 add-to-cart add_to_cart_single" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_cart_single') }}" title="Buy Now">
                                                                   <span id="AddToCartText"><i class="fa fa-shopping-cart"></i> Buy Now</span>
                                                               </button>
                                                           </div>
                                                   
                                                   </li>
                                                    <li class="wishlist">
                                                        <a class="wish-list btn add_to_wishlist" href="javascript:;" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart" title="Wishlist"></i></a>
                                                    </li>
                                                    {{-- <li class="email">
                                                        <a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope" title="Email to friend"></i></a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                        </div> 
                                        @endforeach
                                    </div>  
                                </div>                                                     
                            </div>
                        </div>
                        <div class="grid__item one-quarter bh-right small--one-whole medium--one-whole">
                            <div class="brands-area">
                                <ul class="brands-elements">
                                   @foreach (brands('best_sale') as $brand)
                                       <li class="">
                                           <a href="{{ route('product.brand_wise_product',$brand->id) }}"><img src="{{ asset('assets/backend/image/brand/small/'.$brand->image)}}" alt=""></a>
                                       </li>
                                   @endforeach         
                                </ul>
                            </div>
                            @if (!is_null(banner('best')))
                            <div class="banner-area">
                                <a href="{{banner('best')->url}}"><img src="{{ asset('assets/backend/image/banner/small/'.banner('best')->image)}}" alt=""></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>