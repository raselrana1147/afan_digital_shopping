<nav class="nav-bar">
            <div class="wrapper">
                <div class="medium-down--hide">
                    <!-- begin site-nav -->
                    <ul class="site-nav" id="AccessibleNav">
                        <li class="{{Route::is('front.index') ? 'site-nav--active' : '' }}">
                            <a href="{{ route('front.index') }}" class="site-nav__link">
                                <span>Home</span>
                            </a>
                        </li>
                       
                      
                        <li class="{{Route::is('about_us') ? 'site-nav--active' : '' }}">
                            <a href="{{ route('about_us') }}" class="site-nav__link">
                                <span>About Us</span>
                               
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}" class="site-nav__link">
                                <span>Contact Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy_policy') }}" class="site-nav__link">
                                <span>Privacy Policy</span>
                               
                            </a>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </nav>    <!-- Main Content -->
    