<aside class="col-sm-4 col-md-3 content-aside" id="column-left">
						<div class="module category-style">
		                	<h3 class="modtitle">Categories</h3>
		                	<div class="modcontent">
		                		<div class="box-category">
		                			<ul id="cat_accordion" class="list-group">
		                				@foreach (categories() as $category)
		                				<li class="hadchild"><a href="{{ route('product.category_product',$category->id) }}" class="cutom-parent">{{$category->category_name}}</a> 
		                					@if (count($category->sub_categories)>0)
		                						 <span class="button-view  fa fa-plus-square-o"></span>
		                					<ul style="display: block;">
		                						@foreach ($category->sub_categories as $sub)
		                							<li><a href="{{ route('product.subcategory_product',$sub->id) }}">{{$sub->sub_cat_name}}</a></li>
		                						@endforeach
		                					</ul>
		                					@endif
		                				</li>
		                				@endforeach
		                			</ul>
		                		</div>
		                	</div>
		                </div>
		            	<div class="module product-simple">
		                    <h3 class="modtitle">
		                        <span>Latest products</span>
		                    </h3>
		                    <div class="modcontent">
		                        <div class="so-extraslider" >
		                            <!-- Begin extraslider-inner -->
		                            <div class=" extraslider-inner">
		                                <div class="item ">
		                                	@foreach (new_products() as $new_product)
		                                		
		                                    <div class="product-layout item-inner style1 ">
		                                        <div class="item-image">
		                                            <div class="item-img-info">
		                                                <a href="{{ route('product.detail',$new_product->slug) }}" target="_self" title="Mandouille short ">
		                                                    <img src="{{ asset('assets/backend/image/product/small/'.$new_product->thumbnail)}}" alt="Mandouille short">
		                                                    </a>
		                                            </div>
		                                            
		                                        </div>
		                                        <div class="item-info">
		                                            <div class="item-title">
		                                                <a href="{{ route('product.detail',$new_product->slug) }}" target="_self" title="Mandouille short">{{$new_product->name}} </a>
		                                            </div>
		                                            <div class="rating">
		                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		                                            </div>
		                                            <div class="content_price price">
		                                                <span class="price-new product-price">{{price_format($new_product->current_price)}} </span>&nbsp;&nbsp;
		                                                @if ($new_product->previous_price>$new_product->current_price)
		                                                	{{-- expr --}}
		                                                @endif
		                                                <span class="price-old">{{price_format($new_product->previous_price)}} </span>&nbsp;

		                                            </div>
		                                        </div>
		                                        <!-- End item-info -->
		                                        <!-- End item-wrap-inner -->
		                                    </div>
		                                  	@endforeach

		                                    <!-- End item-wrap -->
		                                </div>
		                            </div>
		                            <!--End extraslider-inner -->
		                        </div>
		                    </div>
		                </div>
		                <div class="module banner-left hidden-xs ">
		                	<div class="banner-sidebar banners">
		                      <div>
		                        <a title="Banner Image" href="#"> 
		                          <img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner-sidebar.jpg') }}" alt="Banner Image"> 
		                        </a>
		                      </div>
		                    </div>
		                </div>
		            </aside>