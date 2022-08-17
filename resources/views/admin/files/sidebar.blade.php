 <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Overview</li>

                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <i class="ion ion-md-speedometer"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Apps</li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-cog"></i><span>Reports<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.custom_report') }}">Custom Report</a></li>
                                    <li><a href="{{ route('admin.daily_report') }}">Daily Report</a></li>
                                    <li><a href="{{ route('admin.weekly_report') }}">Weekly Report</a></li>
                                    <li><a href="{{ route('admin.monthly_report') }}">Monthly Report</a></li>
                                </ul>
                            </li>

                             <li>
                               <a href="{{ route('admin.order_list') }}" class="waves-effect"><i class="fas fa-list"></i><span>Orders<span class="float-right menu-arrow"></span> </span></a>
                            </li>


                              <li>
                               <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Product<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                               <ul class="submenu">
                                   <li><a href="{{ route('admin.product_create') }}">Create Product</a></li>
                                   <li><a href="{{ route('admin.product_list') }}">Product List</a></li>
                               </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Categories<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.category_create') }}">Create Category</a></li>
                                    <li><a href="{{ route('admin.category_list') }}">Category List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Sub Categories<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.subcategory_create') }}">Create Sub Category</a></li>
                                    <li><a href="{{ route('admin.subcategory_list') }}">Sub Category List</a></li>
                                </ul>
                            </li>


                             <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Child Categories<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.childcategory_create') }}">Create Child Category</a></li>
                                    <li><a href="{{ route('admin.childcategory_list') }}">Child Category List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Brand<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.brand_create') }}">Create Brand</a></li>
                                    <li><a href="{{ route('admin.brand_list') }}">Brand List</a></li>
                                </ul>
                            </li>

                             @if (Auth::guard('admin')->user()->IsAdmin())
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Coupon<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.coupon_create') }}">Create Coupon</a></li>
                                    <li><a href="{{ route('admin.coupon_list') }}">Coupon List</a></li>
                                </ul>
                            </li>
                            @endif

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Payment<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.payment_create') }}">Create Payment</a></li>
                                    <li><a href="{{ route('admin.payment_list') }}">Payment List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Sliders<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.slider_create') }}">Create Slider</a></li>
                                    <li><a href="{{ route('admin.slider_list') }}">Slider List</a></li>
                                </ul>
                            </li>

                           <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Site Settings<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('admin.general_setting') }}">General Setting</a></li>
                                    <li><a href="{{ route('admin.social_list') }}">Social List</a></li>
                                     @if (Auth::guard('admin')->user()->IsAdmin())
                                       <li><a href="{{ route('admin.staff_list') }}">Staff List</a></li>
                                    @endif
                                    <li><a href="{{ route('admin.banner_list') }}">Banner List</a></li>
                                </ul>
                            </li>

                           
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>