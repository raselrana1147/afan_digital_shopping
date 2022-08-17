@extends("layouts.admin")
@section("title","Admin | Product Update")
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link href="{{ asset('assets/backend/style/css/select2.css') }}" rel="stylesheet" />
@endsection
@section("breadcrumb","Product Update")
@section("content")

      <div class="message_section" style="display: none">
        
      </div> 
      <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
                 <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a><br><br><br>
  <form id="submit_form" class="custom-validation" data-action="{{ route('admin.product_update') }}" enctype="multipart/form-data" method="POST">
   <div class="row">
      <input type="hidden" name="id"  value="{{$product->id}}">
       <div class="col-lg-6">
        
           <div class="card">
               <div class="card-body">
   
                     @csrf
                       <div class="form-group">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" required value="{{$product->name}}" />
                       </div>
   
                       <div class="form-group">
                           <label>Short Description</label>
                           <div>
                               <input type="text" name="title" class="form-control" required value="{{$product->title}}"/>
                           </div>
                   
                       </div>
   
                       <div class="form-group">
                           <label>Category</label>
                           <div>
                              <select class="form-control" name="category_id" id="find_sub_category" data-action="{{ route('find_sub_category') }}" required="">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                   <option {{($category->id==$product->category_id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Sub Category</label>
                           <div>
                              <select class="form-control load_sub_cat" name="sub_category_id" id="find_child_category" data-action="{{ route('find_child_category') }}">
                                @if ($product->sub_category_id !=null)
                                 <option value="{{$product->sub_category_id}}">{{$product->sub_category->sub_cat_name}}</option>
                                @endif
                               
                              </select>
                           </div>
                       </div>

                         <div class="form-group">
                           <label>Child Category</label>
                           <div>
                              <select class="form-control load_child_cat" name="child_category_id">
                                @if ($product->child_category_id !=null)
                                 <option value="{{$product->child_category_id}}">{{$product->child_category->child_cat_name}}</option>
                                @endif
                              </select>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Brand</label>
                           <div>
                              <select class="form-control" name="brand_id" required="">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                   <option {{($brand->id==$product->brand_id) ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                               
                              </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Purchase Price</label>
                           <div>
                               <input type="number" class="form-control" name="purchase_price" required readonly="true" value="{{$product->purchase_price}}"step="any" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label>Previous Price</label>
                           <div>
                               <input type="number" class="form-control" name="previous_price" required value="{{$product->previous_price}}" step="any" />
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Current Price</label>
                           <div>
                               <input type="number" class="form-control" name="current_price" required value="{{$product->current_price}}" step="any" />
                           </div>
                       </div>

                      

                        <div class="form-group">
                           <label>Sale type</label><span class="pl-1 text-danger">*</span>
                           <i data-toggle="tooltip" data-placement="top" 
                             data-original-title="@lang('seller.sale_type_tooltip')" 
                             class="mdi mdi-information"></i>
                           <div>
                               <div class="custom-control custom-radio mb-2">
                                   <input type="radio" id="sale_type_retail" name="sale_type" class="custom-control-input" checked value="retail" {{($product->sale_type=='retail') ? 'checked' : ''}}>
                                   <label class="custom-control-label" for="sale_type_retail" >Retail</label>
                               </div>
                               <div class="custom-control custom-radio">
                                   <input type="radio" id="sale_type_whole" name="sale_type" class="custom-control-input" value="whole" {{($product->sale_type=='whole') ? 'checked' : ''}}>
                                   <label class="custom-control-label" for="sale_type_whole">Whole Sale</label>
                               </div>
                           </div> 
                       </div>

                       <div class="form-group show_whole_section"  style="display: {{ ($product->sale_type==="retail") ? 'none':''}}">
                           <label>Whole Sale quantity</label>
                           <i data-toggle="tooltip" data-placement="top" 
                           data-original-title="When any the customers will order this product they have to select minimum quantity that you will set below field" 
                           class="mdi mdi-information"></i>
                           <div>
                               <input type="number" class="form-control" id="whole_sale_quantity" name="whole_sale_quantity" min="1" value="{{$product->whole_sale_quantity}}" />
                           </div>
                       </div>

                     <div class="form-group">
                         @php
                             $tags=json_decode($product->tag);
                         @endphp
                         <label>Tag</label><span class="pl-1 text-danger">*</span><i data-toggle="tooltip" data-placement="top" 
                         data-original-title="These tag will the customer on searching product" 
                         class="mdi mdi-information"></i>
                         <select class="form-control add_tag" name="tags[]" multiple="multiple" required>
                            @if (!is_null($tags))
                             @foreach ($tags as $tag)
                                 <option selected="selected">{{$tag}}</option>
                             @endforeach
                           @endif
                         </select>
                     </div>


                    <div class="form-group">
                      @php
                          $sizes=json_decode($product->size);
                      @endphp
                        <label>Size (Option)</label><span class="pl-1 text-danger">*</span><i data-toggle="tooltip" data-placement="top" 
                        data-original-title="Product size if available. This is option for product" 
                        class="mdi mdi-information"></i>
                        <select class="form-control add_size" name="sizes[]" multiple="multiple" required>
                           @if (!is_null($sizes))
                            @foreach ($sizes as $size)
                                <option selected="selected">{{$size}}</option>
                            @endforeach
                          @endif
                        </select>
                    </div> 


                    <div class="form-group">
                      @php
                          $colors=json_decode($product->color);
                      @endphp
                        <label>Color (Option)</label><span class="pl-1 text-danger">*</span><i data-toggle="tooltip" data-placement="top" 
                        data-original-title="Product color if available. This is option for product" 
                        class="mdi mdi-information"></i>
                        <select class="form-control add_color" name="colors[]" multiple="multiple" required>
                           @if (!is_null($colors))
                            @foreach ($colors as $color)
                                <option selected="selected">{{$color}}</option>
                            @endforeach
                          @endif
                        </select>
                    </div>

               </div>
           </div>
       </div> <!-- end col -->
   
       <div class="col-lg-6">
           <div class="card">
               <div class="card-body">

                      <div class="form-group">
                           <label>Thumbnail</label>
                           <div>
                               <input type="file" class="form-control dropify" name="thumbnail" data-default-file="{{($product->thumbnail !==null) ? asset('assets/backend/image/product/small/'.$product->thumbnail) : asset('assets/backend/image/default.png') }}"/>
                           </div>
                       </div>

                       <div class="custom-control custom-checkbox mb-2">
                           <input type="checkbox" id="will_seo" name="will_seo" class="custom-control-input" value="will_seo" {{$product->meta_title !=null ? "checked" : ""}}>
                           <label class="custom-control-label" for="will_seo">SEO Info</label>
                          <i data-toggle="tooltip" data-placement="top" 
                             data-original-title="The SEO information will you website for search engine optimization" 
                           class="mdi mdi-information"></i>
                       </div>

                       <div class="form-group show_seo_section ml-4" style="display:{{$product->meta_title ==null? "none" : "";}}">
                           <label>Meta Title</label><span class="pl-1 text-danger">*</span>
                           <div>
                               <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$product->meta_title}}" />
                           </div>

                           <label>Meta Keyword</label><span class="pl-1 text-danger">*</span>
                           @php
                               $meta_keywords=json_decode($product->meta_keyword);
                           @endphp
                           <div>
                               <select class="form-control add_tag" multiple="multiple" id="meta_keyword" name="meta_keywords[]">
                                   @if (!is_null($meta_keywords))
                                   @foreach ($meta_keywords as $meta_keyword)
                                       <option selected="selected">{{$meta_keyword}}</option>
                                   @endforeach
                                   @endif
                               </select>
                           </div>

                           <label>Meta Description</label><span class="pl-1 text-danger">*</span>
                           <div>
                                <textarea class="form-control summernote" id="meta_description" name="meta_description">{{$product->meta_description}}</textarea>
                           </div>
                       </div>
  
                       <div class="form-group">
                           <label>Description</label>
                           <div>
                               <textarea class="form-control summernote" name="description" required="true">{{$product->description}}</textarea>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Specification</label>
                           <div>
                               <textarea class="form-control summernote" name="specification"  required="true">{{$product->specification}}</textarea>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Return Policy</label>
                           <div>
                               <textarea class="form-control summernote" name="return_policy" required="true">{{$product->return_policy}}</textarea>
                           </div>
                       </div>
                        <div class="form-group mb-0">
                           <div>
                               <button type="submit" class="submit_button btn btn-primary waves-effect waves-light mr-1">
                                  Save Changes
                               </button>
                             
                           </div>
                       </div>
               </div>
           </div>

       </div> <!-- end col -->
         
   </div> <!-- end row -->
    </form>
@endsection

@section('js')
<script src="{{ asset('assets/backend/style/js/summernote.js') }}"></script>
<script src="{{ asset('assets/backend/style/js/select2.js') }}"></script>

  <script>
    $(document).ready(function(){
              
        $('body').on('submit','#submit_form',function(e){
            
                  e.preventDefault();
                  let formDta = new FormData(this);
                 $(".submit_button").html("Processing...").prop('disabled', true)
            
                  $.ajax({
                    url: $(this).attr('data-action'),
                    method: "POST",
                    data: formDta,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        
                         if (data.status_code==201) 
                         {
                           $('.message_section').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">`+data.message+`<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>`).show();
                            $(".submit_button").text("Submit").prop('disabled', false)
                         }else{
                              $(".submit_button").text("Save Changes").prop('disabled', false)
                              $('.message_section').html('').hide();
                               toastr.success(data.message);
                          }
                       
                    },
                    error:function(response){
                        var errors=response.responseJSON   
                    }

                  });
            });

        $('body').on('change','#find_sub_category',function(){
                  let category_id=$(this).val();

                  $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data:{category_id:category_id},

                  success:function(data){
                    
                    var setItem='';
                    data.subcategoryes.forEach(function(item,index){
                       // console.log(item.name)
                        setItem+='<option value="'+item.id+'">'+item.sub_cat_name+'</option>'
                    });
                     $('.load_sub_cat').html(setItem);
                    $('.load_child_cat').html("");
                  },

                  error:function(response){
                  }
                });
          });


          $('body').on('change','#find_child_category',function(){
                  let sub_category_id=$(this).val();

                  $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data:{sub_category_id:sub_category_id},

                  success:function(data){
                    
                    var setItem='';
                    data.childcategories.forEach(function(item,index){
                    
                        setItem+='<option value="'+item.id+'">'+item.child_cat_name+'</option>'
                    });
                     $('.load_child_cat').html(setItem);
                  },

                  error:function(response){
                  }
                });
          });

             $('body').on('change','#find_child_category',function(){
                  let sub_cat_id=$(this).val();

                  $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data:{category_id:category_id},

                  success:function(data){
                    
                    var setItem='';
                    data.subcategoryes.forEach(function(item,index){
                       // console.log(item.name)
                        setItem+='<option value="'+item.id+'">'+item.sub_cat_name+'</option>'
                    });
                     $('.load_sub_cat').html(setItem);
                  },

                  error:function(response){
                  }
                });
          });

             $('#sale_type_whole').on('click',function(){
               
                if ($(this).is(':checked')) {
                  $('.show_whole_section').show();
                  $('#whole_sale_quantity').attr('required', 'true');
                }
              
              });

               $('#sale_type_retail').on('click',function(){
                  if ($(this).is(':checked')) {
                    $('.show_whole_section').hide();
                    $('#whole_sale_quantity').removeAttr('required');
                  }
                })


               // SEO Section
               $('#will_seo').on('click',function(){
                  if ($(this).is(':checked')) {
                      $('.show_seo_section').show();
                       $('#meta_title').attr('required', 'true');
                       $('#meta_keyword').attr('required', 'true');
                       $('#meta_description').attr('required', 'true');
                  }else{
                     $('.show_seo_section').hide();
                      $('#meta_title').removeAttr('required');
                      $('#meta_keyword').removeAttr('required');
                      $('#meta_description').removeAttr('required');
                  }
                })

         $('.summernote').summernote();

         //===select2=====
         $(".add_tag").select2({
             tags: true,
             tokenSeparators: [',', ' ']
         })
         $(".add_meta_keyword").select2({
             tags: true,
             tokenSeparators: [',', ' ']
         })

         $(".add_color").select2({
             tags: true,
             tokenSeparators: [',', ' ']
         })

         $(".add_size").select2({
             tags: true,
             tokenSeparators: [',', ' ']
         })

    })
</script>

@endsection