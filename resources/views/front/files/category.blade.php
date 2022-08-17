 <div class="grid__item one-quarter shop-by-collections medium-down--hide">
                        <div class="sidebar-collections">
                            <div class="sdcollections-title sb-title">
                                <i class="fa fa-list"></i>
                                <span>All Collections</span>
                            </div>
                            <div class="sdcollections-content">
                                <ul class="sdcollections-list">
                                    @foreach (categories() as $category)
                                        
                                    <li class="sdc-element vetical-menu1 site-nav--has-dropdown" aria-haspopup="true">
                                        <a href="{{ route('product.category_product',$category->id) }}" class="site-nav__link">
                                            <div class="element-main">
                                                <div class="collection-icon">
                                                   
                                                    <img src="{{ asset('assets/frontend/assets/images/'.icons())}}" alt="collection icon">
                                                </div>
                                                <div class="collection-area have-icons">
                                                    <div class="collection-name">
                                                         {{$category->category_name}}
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($category->sub_categories)>0) 
                                               <span class="icon icon-arrow-right" aria-hidden="true"></span>
                                            @endif
                                            
                                        </a>
                                        @if(count($category->sub_categories)>0) 
                                          <ul class="site-nav__dropdown vetical__dropdown vetical__dropdown1">
                                            @foreach ($category->sub_categories as $sub)
                                               
                                            <li class="nav-links nav-links01 grid__item large--one-half">
                                                <ul>
                                                    <li class="list-title"><a href="{{ route('product.subcategory_product',$sub->id) }}">{{$sub->sub_cat_name}}</a></li>
                                                    @if (count($sub->child_categories)>0)
                                                    @foreach ($sub->child_categories as $child)
                                                           <li class="list-unstyled nav-sub-mega">
                                                             <a href="{{ route('product.childcategory_product',$child->id) }}">{{$child->child_cat_name}}</a>
                                                           </li>
                                                        @endforeach
                                                       @endif
                                                 </ul>
                                            </li>
                                            @endforeach
                                            <li class="grid__item large--one-half">
                                                <ul>
                                                    <li class="list-product">
                                                    <div class="list-product-image">
                                                        <a href="product.html"><img src="{{ asset('assets/backend/image/category/small/'.$category->image)}}" alt="Example Book"></a>
                                                    </div>
                                                    
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                     @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>