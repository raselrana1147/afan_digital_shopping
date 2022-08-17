<!DOCTYPE html>
<html class="supports-js supports-no-touch supports-csstransforms supports-csstransforms3d supports-fontface">
<head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Font ================================================== -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700"> 
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,500,600,700">
    <!-- Font ================================================== -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700"> 
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,500,600,700">
    <!-- Helpers ================================================== -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home Market - Responsive HTML5 theme">
    <meta property="og:image" content="{{ asset('assets/frontend/assets/images/logo.html')}}">
    <meta property="og:image:secure_url" content="{{ asset('assets/frontend/assets/images/logo.html')}}">
    <meta property="og:url" content="#">
    <meta property="og:site_name" content="Home Market Red">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSS ================================================== -->
    <link href="{{ asset('assets/frontend/assets/css/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/font-awesome.min.css')}}">
    <link href="{{ asset('assets/frontend/assets/css/animate.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/swatch.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/timber.scss.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/home_market.global.scss.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/home_market.style.scss.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/tada.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/frontend/assets/css/spr.css')}}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/frontend/style/css/custom.css')}}">
    <link href="{{ asset('assets/frontend/style/css/toastr.css')}}" rel="stylesheet" type="text/css">
    @yield('ecommerce_css')
    <!-- JS ================================================== -->
    <script src="{{ asset('assets/frontend/assets/js/jquery.min.js')}}" type="text/javascript"></script>  
    <script src="{{ asset('assets/frontend/assets/js/jquery.fancybox.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.tweet.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.optionSelect.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/assets/js/jquery.flexslider-min.js')}}" type="text/javascript"></script>
     {{-- my script --}}
    <script src="{{ asset('assets/frontend/style/js/toastr.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/cart.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/wishlist.js')}}"></script>
    <script src="{{ asset('assets/frontend/style/js/common.js')}}"></script>
       <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
    </script>
    

     @yield('ecommerce_js')
</head>

<body id="home-market-responsive-shopify-theme" class="index1 template-index">
   @include('front.files.mobile')
    
    <div id="CartDrawer" class="drawer drawer--right fancybox-margin">
        <div class="drawer__header">
            <div class="drawer__title h3">
                Shopping Cart
            </div>
            <div class="drawer__close js-drawer-close">
                <button type="button" class="icon-fallback-text">
                <span class="icon icon-x" aria-hidden="true"></span>
                <span class="fallback-text">"Close Cart"</span>
                </button>
            </div>
        </div>
        <div id="CartContainer" class="cart-item-added">
           
            @if (count(carts())>0)
            @foreach (carts() as $cart)
                <div class="ajaxcart__inner">
                
                    
                      <div class="ajaxcart__product">
                        <div class="ajaxcart__row" data-line="3">
                            <div class="grid">
                                <div class="grid__item one-quarter">
                                    <a href="{{ route('product.detail',$cart->product->slug) }}" class="ajaxcart__product-image"><img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" alt=""></a>
                                </div>
                                <div class="grid__item three-quarters">
                                    <p>
                                        <a href="product.html" class="ajaxcart__product-name">{{$cart->product->name}}</a>
                                        <span class="ajaxcart__product-meta">{{$cart->size}}  {{$cart->color}}</span>
                                    </p>
                                    <div class="grid--full display-table">
                                        <div class="grid__item">
                                            <div class="ajaxcart__qty">
                                                
                                                <input type="number" id="quantity{{$cart->id}}" class="update_cart" value="{{$cart->quantity}}" min="1"  pattern="[0-9]*" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}">
                                               
                                            </div>
                                        </div>
                                        <div class="grid__item">
                                            <span class="money each_cart_price{{$cart->id}}">{{price_format($cart->quantity*$cart->product->current_price)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
            
                </div>
                @endforeach
                <div class="ajaxcart__footer">
                    <div class="grid--full">
                        <div class="grid__item title-total">
                            <p>
                                Subtotal
                            </p>
                        </div>
                        <div class="grid__item price-total">
                            <p>
                                <span class="money" data-currency-usd="" data-currency="USD">{{price_format(sub_total())}}</span>
                            </p>
                        </div>
                    </div>
                    <p class="text-center">
                        Shipping &amp; taxes calculated at checkout
                    </p>
                    <a class="btn btn--full cart__shoppingcart" name="shoppingCart" href="{{ route('view.cart') }}">
                    Shopping Cart → </a>
                    <a class="btn btn2 btn--full cart__checkout" name="checkout"href="{{ route('view.cart') }}">
                    Check Out → </a>
                </div>
                @else 
                <h4 style="padding:12px">Empty Cart</h4>
            @endif
      
        </div>
    </div>
    
    <div id="PageContainer" class="is-moved-by-drawer">
        <!-- Ads Banner -->
       @include('front.files.top_banner')
    
        <!-- Top Other -->
         @include('front.files.top_header')

        <!-- Main Header -->
       
        @include('front.files.header')
        <!-- Navigation Bar -->
        @include('front.files.nav')
        <main class="main-content">
        @section('main')

        @show
        </main>

        <!-- Footer -->
         @include('front.files.footer')
    </div>

    <div id="scroll-to-top" title="Scroll to Top" class="off">
        <i class="fa fa-caret-up"></i>
    </div>

   
    
    <script>
        var tada_index,tada_autosearchcomplete,tada_swiftype,tada_ads,tada_adsspeed,tada_slideshowtime,tada_block1gallery=false,tada_block1product=false, tada_newsletter=false;
          tada_index=1;
          tada_ads=1;
          tada_adsspeed=5000;
          tada_slideshowtime = 30000;
          tada_block1gallery = true;
          tada_block1product = true;
          tada_newsletter = true;
    </script>
  
    <script src="{{ asset('assets/frontend/assets/js/modernizr.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/assets/js/timber.js')}}" type="text/javascript"></script>
  
    <div id="quick-shop-modal" class="modal quick-shop" style="display:none;">
        <div class="modal-dialog fadeIn">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="quick-shop-modal-bg">
                    </div>
                    <div class="grid__item one-half qs-product-image">
                        <div id="quick-shop-image" class="product-image-wrapper">
                            <div id="featuted-image" class="main-image featured">
                                <img class="img-zoom img-responsive image-fly" src="{{ asset('assets/frontend/assets/images/demo1_qs_480x480.jpg')}}" data-zoom-image="{{ asset('assets/frontend/assets/images/demo1_qs_480x480.jpg')}}" alt="">
                            </div>
                            <div id="gallery_main_qs" class="product-image-thumb scroll scroll-mini">
                                <div class="qs-vertical-slider product-single__thumbnails">
                                        <a class="image-thumb active thumb__element"><img src="assets/images/demo1_qs1_100x100.jpg" alt="" /></a>
                                        <a class="image-thumb thumb__element"><img src="{{ asset('assets/frontend/assets/images/demo1_qs2_100x100.jpg')}}" alt="" /></a>
                                        <a class="image-thumb thumb__element"><img src="{{ asset('assets/frontend/assets/images/demo1_qs3_100x100.jpg')}}" alt="" /></a>
                                        <a class="image-thumb thumb__element"><img src="{{ asset('assets/frontend/assets/images/demo1_qs4_100x100.jpg')}}" alt="" /></a>
                                        <a class="image-thumb thumb__element"><img src="{{ asset('assets/frontend/assets/images/demo1_qs5_100x100.jpg')}}" alt="" /></a>                                      
                                </div>
                            </div>
                            <div class="vertical-slider product-single__thumbnails" style="opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="grid__item one-half qs-product-information">
                        <div id="quick-shop-container">
                            <h3 id="quick-shop-title"><a href="product.html">Corporis suscipit laboriosam</a></h3>
                            <div class="rating-star">
                                <span class="shopify-product-reviews-badge" data-id="3008529923"></span>
                            </div>
                            <div class="description">
                                <div id="quick-shop-description" class="text-left">
                                    <p>
                                        Quisque vel enim quis purus ultrices consequat, sed tincidunt massa blandit ipsum interdum tristique cras dictum, lacus eu molestie elementum nulla est auctor. Etiam dan lorem quis ligula elementum porttitor quisem. Duis eget purus urna fusce sed scelerisque ante. Lorem ipsum dolor sit amet conse...
                                    </p>
                                </div>
                            </div>
                            <form action="#" method="post" class="variants" id="AddToCartForm" enctype="multipart/form-data">
                                <div id="quick-shop-price-container" class="detail-price">
                                    <span class="price"><span class="money">$89.00</span></span>
                                </div>
                                <div class="quantity-wrapper clearfix">
                                    <label class="wrapper-title">Quantity</label>
                                    <div class="wrapper">
                                        <span class="qty-down" title="Decrease" data-src="#qs-quantity">
                                        <i class="fa fa-minus"></i>
                                        </span>
                                        <input type="text" id="qs-quantity" size="5" class="item-quantity" name="quantity" value="1">
                                        <span class="qty-up" title="Increase" data-src="#qs-quantity">
                                        <i class="fa fa-plus"></i>
                                        </span>
                                    </div>
                                </div>
                                <div id="quick-shop-variants-container" class="variants-wrapper" style="display: block;">
                                    <div class="selector-wrapper">
                                        <label for="#quick-shop-variants-3008529731-option-0">Size</label>
                                        <select class="single-option-selector" data-option="option1" id="#quick-shop-variants-3008529731-option-0">
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <div class="selector-wrapper">
                                        <label for="#quick-shop-variants-3008529731-option-1">Color</label>
                                        <select class="single-option-selector" data-option="option2" id="#quick-shop-variants-3008529731-option-1">
                                            <option value="Black">Black</option>
                                            <option value="Red">Red</option>
                                            <option value="Green">Green</option>
                                            <option value="Blue">Blue</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="others-bottom">
                                    <input id="AddToCart" class="btn btn-1 small add-to-cart" type="submit" name="add" value="Buy Now">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">   
      jQuery(document).ready(function($) {  
        if($('.quantity-wrapper').length){
          $('.quantity-wrapper').on('click', '.qty-up', function() {
            var $this = $(this);
            var qty = $this.data('src');
            $(qty).val(parseInt($(qty).val()) + 1);
          });
          $('.quantity-wrapper').on('click', '.qty-down', function() {
            var $this = $(this);
            var qty = $this.data('src');
            if(parseInt($(qty).val()) > 1)
              $(qty).val(parseInt($(qty).val()) - 1);
          });
        }                
      });
    </script>

      <script>
          @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                     toastr.info("{{ Session::get('message') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                   break;
            }
          @endif
    </script>
   
    
</body>