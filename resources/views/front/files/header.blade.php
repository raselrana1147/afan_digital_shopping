<header class="site-header">
            <div class="wrapper">
                <div id="main-header" class="grid--full grid--table">
                    <div class="grid__item small--one-whole medium--one-whole two-eighths">
                        <h1 class="site-header__logo large--left" itemscope="" itemtype="http://schema.org/Organization">
                        <a href="{{ route('front.index') }}" itemprop="url" class="site-header__logo-link">
                            <img src="{{ logo()}}" alt="Home Market Red" itemprop="logo">
                        </a>
                        </h1>
                    </div>
                    <div class="grid__item small--one-whole medium--one-whole four-eighths mobile-bottom">
                        <div class="large--hide medium-down--show navigation-icon">
                            <div class="grid">
                                <div class="grid__item one-half">
                                    <div class="site-nav--mobile">
                                        <button type="button" class="icon-fallback-text site-nav__link js-drawer-open-left" aria-controls="NavDrawer" aria-expanded="false">
                                        <span class="icon icon-hamburger" aria-hidden="true"></span>
                                        <span class="fallback-text">Menu</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-header__search">
                            <form action="{{ route('product.search') }}" method="POST" class="input-group search-bar">
                                @csrf
                                <div class="collections-selector">
                                    <select class="single-option-selector" data-option="collection-option" name="category_id" name="collection">
                                        <option value="all">All Collections</option>
                                        @foreach (categories() as $category)
                                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                        
                                      
                                    </select>
                                </div>
                               
                                <input type="search" name="keyword" value="" placeholder="Search our store" class="input-group-field st-default-search-input" aria-label="Search our store">
                                <span class="input-group-btn">
                                <button type="submit" class="btn icon-fallback-text">
                                <i class="fa fa-search"></i>
                                <span class="fallback-text">Search</span>
                                </button>
                                </span>
                            </form>
                        </div>
                        <div class="large--hide medium-down--show navigation-cart">
                            <div class="grid__item text-right">
                                <div class="site-nav--mobile">
                                    <a href="cart.html" class="js-drawer-open-right site-nav__link" aria-controls="CartDrawer" aria-expanded="false">
                                    <span class="icon-fallback-text">
                                    <span class="icon icon-cart" aria-hidden="true"></span>
                                    <span class="fallback-text">Shopping Cart</span>
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__item small--one-whole two-eighths medium-down--hide">
                        <ul class="link-list">
                            <li class="track-order">
                                <a href="{{ route('wishlist') }}">
                                    <i class="fa fa-heart"></i>
                                    <span class="name">Favourite</span>
                                </a>
                            </li>
                            <li class="header-account">
                                 @auth()
                                    <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-user"></i>
                                        <span class="name">Logout</span>
                                    </a>
                               
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                    
                                    @else
                                    <a href="{{ route('login') }}" id="login_link">
                                        <i class="fa fa-user"></i>
                                        <span class="name">Login</span>
                                    </a>
                                @endauth

                                <div id="loginBox" class="loginLightbox" style="display:none;">
                                    <div id="lightboxlogin">
                                        <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                                            <input type="hidden" value="customer_login" name="form_type"><input type="hidden" name="utf8" value="✓">
                                            <div id="bodyBox">
                                                <h3>Login</h3>
                                                <label for="CustomerEmail" class="hidden-label">Email</label>
                                                <input type="email" name="customer[email]" id="CustomerEmail" class="input-full" placeholder="Email">
                                                <label for="CustomerPassword" class="hidden-label">Password</label>
                                                <input type="password" value="" name="customer[password]" id="CustomerPassword" class="input-full" placeholder="Password">
                                                <input type="submit" class="btn btn2 btn--full" value="Sign In">
                                                <div>
                                                    <p class="forgot">
                                                        <a href="#recover" onclick="showRecoverPasswordForm();return false;" id="RecoverPassword">Forgot your password?</a>
                                                    </p>
                                                    <p class="create">
                                                        <a href="#create_accountBox" onclick="showCreateAccountForm();return false;" id="CreateAccountPassword">Create New Account</a>
                                                    </p>
                                                </div>
                                                <p>
                                                    <a href="#" onclick="$.fancybox.close();">Close</a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="recover-password" style="display:none;">
                                        <h3>Reset your password</h3>
                                        <p class="note">
                                            We will send you an email to reset your password.
                                        </p>
                                        <form method="post" action="https://demo.tadathemes.com/HTML_Homemarket/demo/recover.html" accept-charset="UTF-8">
                                            <input type="hidden" value="recover_customer_password" name="form_type"><input type="hidden" name="utf8" value="✓">
                                            <p>
                                                <label for="recover-email" class="label">Email</label>
                                            </p>
                                            <input type="email" value="" size="30" name="email" id="recover-email" class="text">
                                            <div class="action_bottom">
                                                <input class="btn btn2" type="submit" value="Submit">
                                                <a class="btn back" href="#" onclick="hideRecoverPasswordForm();return false;">Back to Login</a>
                                            </div>
                                            <p class="close">
                                                <a href="#" onclick="$.fancybox.close();">Close</a>
                                            </p>
                                        </form>
                                    </div>
                                    <div id="create_accountBox" style="display:none;">
                                        <h3>Create Account</h3>
                                        <div class="form-vertical">
                                            <form method="post" action="https://demo.tadathemes.com/HTML_Homemarket/demo/account.html" id="create_customer" accept-charset="UTF-8">
                                                <input type="hidden" value="create_customer" name="form_type"><input type="hidden" name="utf8" value="✓">
                                                <label for="FirstName" class="hidden-label">First Name</label>
                                                <input type="text" name="customer[first_name]" id="FirstName" class="input-full" placeholder="First Name">
                                                <label for="LastName" class="hidden-label">Last Name</label>
                                                <input type="text" name="customer[last_name]" id="LastName" class="input-full" placeholder="Last Name">
                                                <label for="Email" class="hidden-label">Email</label>
                                                <input type="email" name="customer[email]" id="Email" class="input-full" placeholder="Email">
                                                <label for="CreatePassword" class="hidden-label">Password</label>
                                                <input type="password" name="customer[password]" id="CreatePassword" class="input-full" placeholder="Password">
                                                <p>
                                                    <input type="submit" value="Create" class="btn btn2 btn--full">
                                                </p>
                                                <p>
                                                    <span><a class="btn" href="#" onclick="hideRecoverPasswordForm();return false;">Back to Login</a></span>
                                                </p>
                                                <p class="close">
                                                    <a href="#" onclick="$.fancybox.close();">Close</a>
                                                </p>
                                            </form>
                                        </div>

                                    </div>
                                    <script>
                                            function showRecoverPasswordForm() {
                                              $('#recover-password').css("display",'block');
                                              $('#lightboxlogin').css("display",'none');
                                              $('#create_accountBox').css("display",'none');
                                            }
                                            function hideRecoverPasswordForm() {
                                              $('#recover-password').css("display",'none');
                                              $('#lightboxlogin').css("display",'block');
                                              $('#create_accountBox').css("display",'none');
                                            }
                                            function showCreateAccountForm(){
                                              $('#recover-password').css("display",'none');
                                              $('#lightboxlogin').css("display",'none');
                                              $('#create_accountBox').css("display",'block');
                                            }
                                          </script>
                                </div>
                            </li>
                            <li class="header-cart">
                                <a href=".cart.html" class="site-header__cart-toggle js-drawer-open-right" aria-controls="CartDrawer" aria-expanded="false">
                                    <i class="fa fa-shopping-basket"></i>
                                    <span class="cart-count" id="CartCount">{{total_item()}}</span>
                                    <span class="name">Shopping Cart</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>       
            </div>
        </header>