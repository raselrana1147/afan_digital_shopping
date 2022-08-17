@extends("layouts.admin")
@section("title","Admin | Product List")
@section("breadcrumb","Product Detail")
@section('css')
 
@endsection
@section("content")
<a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2"> <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a><br><br><br>
   <div class="row">

       <div class="col-md-6">
           <div class="card">
               <div class="card-body">
                
                <table class="my_table table">
                  <tr>
                    <th>Name:</th>
                    <td>{{$product->name}}</td>
                  </tr>
                  <tr>
                    <th>Title:</th>
                    <td>{{$product->title}}</td>
                  </tr>
                  <tr>
                    <th>Thumbnail:</th>
                    <td><img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}" style="width: 60px;height: 60px;border-radius: 5px"></td>
                  </tr>
                  <tr>
                    <th>Category:</th>
                    <td>{{$product->category->category_name}}</td>
                  </tr>
                  @if ($product->sub_category_id !=null)
                  	<tr>
	                    <th>Sub Category:</th>
	                    <td>{{$product->sub_category->sub_cat_name}}</td>
	                 </tr>
                  @endif

                    @if ($product->child_category_id !=null)
                    	<tr>
  	                    <th>Child Category</th>
  	                    <td>{{$product->child_category->child_cat_name}}</td>
  	                 </tr>
                    @endif

                    <tr>
                      <th>Brand:</th>
                      <td>{{$product->brand->brand_name}}</td>
                    </tr>

                    <tr>
                      <th>Purchase Price:</th>
                      <td>{{currency().number_format($product->purchase_price)}}</td>
                    </tr>

                    <tr>
                      <th>Previos Price:</th>
                      <td>{{currency().number_format($product->previous_price)}}</td>
                    </tr>

                    <tr>
                      <th>Sale Price:</th>
                      <td>{{currency().number_format($product->current_price)}}</td>
                    </tr>

                    <tr>
                      <th>Model:</th>
                      <td>{{$product->model}}</td>
                    </tr>

                    <tr>
                      <th>Total View:</th>
                      <td>{{$product->view}}</td>
                    </tr>

                    <tr>
                      <th>Total Order:</th>
                      <td>{{$product->total_order}}</td>
                    </tr>
                   
                </table> 
                      
   
               </div>
           </div>
       </div>

        <div class="col-md-6">
           <div class="card">
               <div class="card-body">
                
                <table class="my_table table">
                  <tr>
                    <th>Sale Type</th>
                    <td>{{$product->sale_type}}</td>
                  </tr>
                  @if ($product->sale_type=="whole")
                  <tr>
                    <th>Whole Sale Quantity</th>
                    <td>{{$product->whole_sale_quantity}}</td>
                  </tr>
                  @endif
                  
                  <tr>
                    <th>Tags</th>
                    @php
                    	$tags=json_decode($product->tag);
                    @endphp
                    <td>
	                    @foreach ($tags as $tag)
	                    	{{$tag.", "}}
	                    @endforeach
                   </td>
                  </tr>
                  
                  @if ($product->meta_title !=null)
                  	<tr>
	                    <th>Meta Title:</th>
	                    <td>{{$product->meta_title}}</td>
	                 </tr>

		              @php
	               	     $keywords=json_decode($product->meta_keyword);
	                   @endphp
	                    <tr>
	                      <th>Meta Keyword</th>
	                      <td>@foreach ($keywords as $keyword)
	                      	{{$keyword.", "}}
	                      @endforeach
	                    </td>
	                    </tr>
	                    <tr>
	                      <th>Meta Description</th>
	                      <td>
	                      	{!!$product->meta_description!!}
	                    </td>
	                    </tr>
                  @endif

                    <tr>
                      <th>Description:</th>
                      <td>{!!$product->description!!}</td>
                    </tr>

                    <tr>
                      <th>Specification:</th>
                      <td>{!!$product->specification!!}</td>
                    </tr>

                </table> 
                      
   
               </div>
           </div>
       </div> 
   </div> 
   
@endsection
@section('js')
@endsection()