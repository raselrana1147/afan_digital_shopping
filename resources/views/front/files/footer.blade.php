<footer class="site-footer">       
            <div class="grid__item footer_newsletter">
                <div class="wrapper">
                    <h3><i class="fa fa-envelope"></i> Make sure you don't miss interesting happenings by joining our newsletter program</h3>
                    <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" class="input-group">
                        <input type="email" value="" placeholder="Enter your email here ..." name="EMAIL" id="mail" class="input-group-field" aria-label="email@example.com">
                        <span class="input-group-btn">
                        <input type="button" class="btn" name="subscribe" id="subscribe" value="subscribe">
                        </span>
                    </form>
                </div>
            </div>
            <div class="grid__item footer_information">
                <div class="wrapper">
                    <div class="grid-uniform">
                        <div class="fi-about-block grid__item one-quarter small--one-whole medium--one-whole">
                            <div class="fi-title">
                                About us
                            </div>
                            <div class="fi-content">
                                <ul class="group_information">
                                    <li><i class="fa fa-map-marker"></i> {{config('constant.company_address')}}</li>
                                    <li><i class="fa fa-phone"></i>{{config('constant.company_phone')}}</li>
                                    <li><i class="fa fa-envelope"></i>{{config('constant.company_email')}}</li>
                                </ul>
                            </div>
                            <div class="fi-content inline-list social-icons">
                                @foreach (social_link() as $social)
                                    
                                <a href="index.html" title="Twitter" class="icon-social twitter" data-toggle="tooltip" data-placement="top"><i class="{{$social->icon}}"></i></a>
                            @endforeach
                            </div>
                        </div>
                        <div class="fi-links grid__item one-quarter small--one-whole medium--one-whole">
                            <div class="fi-title">
                                Information
                            </div>
                            <div class="fi-content">
                                <ul class="grid__item one-half">
                                    <li>
                                        <a href="{{ route('front.index') }}"><span>Home</span></a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('contact_us') }}"><span>Contact Us</span></a>
                                    </li>
                                </ul>

                                <ul class="grid__item one-half">
                                    <li>
                                        <a href="{{ route('about_us') }}"><span>About us</span></a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('privacy_policy') }}"><span>Privacy</span></a>
                                    </li>
                                   
                                </ul>
                               
                            </div>
                        </div>
                        <div class="fi-tags grid__item one-quarter small--one-whole medium--one-whole">
                            <div class="fi-title">
                                Product Brands
                            </div>
                            <div class="fi-content">
                                <ul>
                                    @foreach (brands() as $brand)
                                       <li><a href="{{ route('product.brand_wise_product',$brand->id) }}">{{$brand->brand_name}}</a></li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                        <div class="fi-block grid__item one-quarter small--one-whole medium--one-whole">
                            <div class="fi-title">
                                Recent Post
                            </div>
                            <ul class="fi-content post-element">
                                <li>
                                <div class="post-title">
                                    <a href="article.html">Quisque porta felis est ut malesuada lorem dignissim</a>
                                </div>
                                
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid__item footer_product_categories">
                <div class="wrapper">
                    <div class="fi-title">
                        Product Categories
                    </div>
                    <div class="fi-content">
                        <ul class="product_categories_list">
                            <li class="pc-items">
                            <a href="collection.html">Beauty &amp; Health</a>
                            </li>
                           
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="grid__item footer_copyright">
                <div class="wrapper">
                    <div class="grid">
                        <div class="grid__item footer-copyright one-half small--one-whole medium--one-whole small--text-center">
                            <p>
                                © {{date('Y')}} Home Market - Red. All rights Reserved
                            </p>
                        </div>
                    
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
              $(function () {
                $(".fi-title").click(function(){
                  $(this).toggleClass('opentab');
                });
              });
            </script>         
        </footer>