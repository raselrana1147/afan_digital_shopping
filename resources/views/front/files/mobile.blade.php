 <div id="NavDrawer" class="drawer drawer--left">
        <div class="drawer__header">
            <div class="drawer__title h3">
                Menu
            </div>
            <div class="drawer__close js-drawer-close">
                <button type="button" class="icon-fallback-text">
                <span class="icon icon-x" aria-hidden="true"></span>
                <span class="fallback-text">Close menu</span>
                </button>
            </div>
        </div>
        <!-- begin mobile-nav -->
        <ul class="mobile-nav">
            <li class="mobile-nav__item mobile-nav__item--active">
                <a href="{{ route('front.index') }}" class="mobile-nav__link">Home</a>
            </li>

            <li class="mobile-nav__item mobile-nav__item--active">
                <a href="{{ route('about_us') }}" class="mobile-nav__link">About Us</a>
            </li>

            <li class="mobile-nav__item mobile-nav__item--active">
                <a href="{{ route('contact_us') }}" class="mobile-nav__link">Contact Us</a>
            </li>

            <li class="mobile-nav__item mobile-nav__item--active">
                <a href="{{ route('privacy_policy') }}" class="mobile-nav__link">Privacy Policy</a>
            </li>
            @auth
            
             <li class="mobile-nav__item mobile-nav__item--active" >
                <a class="mobile-nav__link" href="javascript:;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                   Logout
                </a>
            </li>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            @else
             <li class="mobile-nav__item mobile-nav__item--active">
                <a href="{{ route('login') }}" class="mobile-nav__link">Login</a>
            </li>
            @endauth
        </ul>


        <div class="drawer__header">
            <div class="drawer__title h3">
                Categories
            </div>
            
        </div>

        <ul class="mobile-nav">
            @foreach (categories() as $category)
               
            <li class="mobile-nav__item" aria-haspopup="true">
               
                    
               
                <div class="mobile-nav__has-sublist">
                    <a href="{{ route('product.category_product',$category->id) }}" class="mobile-nav__link">{{$category->category_name}}</a>
                    @if (count($category->sub_categories)>0)
                    <div class="mobile-nav__toggle">
                        <button type="button" class="icon-fallback-text mobile-nav__toggle-open">
                        <span class="icon icon-plus" aria-hidden="true"></span>
                        <span class="fallback-text">See More</span>
                        </button>
                        <button type="button" class="icon-fallback-text mobile-nav__toggle-close">
                        <span class="icon icon-minus" aria-hidden="true"></span>
                        <span class="fallback-text">"Close Cart"</span>
                        </button>
                    </div>
                     @endif
                </div>
                <ul class="mobile-nav__sublist">
                     @if (count($category->sub_categories)>0)
                     @foreach ($category->sub_categories as $sub_cat)
                        <li class="mobile-nav__item ">
                        <a href="{{ route('product.subcategory_product',$sub_cat->id) }}" class="mobile-nav__link">{{$sub_cat->sub_cat_name}}</a>
                        </li>
                     @endforeach
                    @endif  
                </ul>
                
            </li>
            @endforeach
           </ul>
    </div>