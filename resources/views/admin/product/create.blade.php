@extends("layouts.admin")
@section("title","Admin | Product Create")
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  {{-- <link href="{{ asset('assets/style/css/summernote.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('assets/backend/style/css/select2.css') }}" rel="stylesheet" />
@endsection
@section("breadcrumb","Product Create")
@section("content")
      <div class="message_section" style="display: none">
        
      </div>
  <form id="submit_form" class="custom-validation" data-action="{{ route('admin.product_store') }}" enctype="multipart/form-data" method="POST">
   <div class="row">
   
       <div class="col-lg-6">
        
           <div class="card">
               <div class="card-body">
   
                     @csrf
                       <div class="form-group">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" required placeholder="Enter Name"/>
                       </div>

                    
   
                       <div class="form-group">
                           <label>Short Description</label>
                           <div>
                               <input type="text" name="title" class="form-control" required placeholder="Enter short description"/>
                           </div>
                   
                       </div>
   
                       <div class="form-group">
                           <label>Category</label>
                           <div>
                              <select class="form-control" name="category_id" id="find_sub_category" data-action="{{ route('find_sub_category') }}" required="">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Sub Category</label>
                           <div>
                              <select class="form-control load_sub_cat" name="sub_category_id" id="find_child_category" data-action="{{ route('find_child_category') }}">
                              </select>
                           </div>
                       </div>

                         <div class="form-group">
                           <label>Child Category</label>
                           <div>
                              <select class="form-control load_child_cat" name="child_category_id">
                              </select>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Brand</label>
                           <div>
                              <select class="form-control" name="brand_id" required="">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                   <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                               
                              </select>
                           </div>
                       </div>

                       
                       <div class="form-group">
                           <label>Previous Price</label>
                           <div>
                               <input type="number" class="form-control" name="previous_price" required placeholder="Enter price" step="any" />
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Current Price</label>
                           <div>
                               <input type="number" class="form-control" name="current_price" required placeholder="Enter price" step="any" />
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Sale Type</label><span class="pl-1 text-danger">*</span><i data-toggle="tooltip" data-placement="top" 
                           data-original-title="How you want to sale your product.If you select whole sale option you have whole sale quantity." 
                           class="mdi mdi-information"></i>
                           <div>
                               
                               <div class="custom-control custom-radio mb-2">
                                   <input type="radio" id="sale_type_retail" name="sale_type" class="custom-control-input" checked value="retail" >
                                   <label class="custom-control-label" for="sale_type_retail" >Retail</label>
                               </div>
                               <div class="custom-control custom-radio">
                                   <input type="radio" id="sale_type_whole" name="sale_type" class="custom-control-input" value="whole">
                                   <label class="custom-control-label" for="sale_type_whole">Whole Sale</label>
                               </div>
                           </div> 
                       </div>

                       <div class="form-group show_whole_section"  style="display: none">
                           <label>Whole Sale quantity</label><span class="pl-1 text-danger">*</span>
                           <i data-toggle="tooltip" data-placement="top" 
                           data-original-title="When any the customers will order this product they have to select minimum quantity that you will set below field" 
                           class="mdi mdi-information"></i>
                           <div>
                               <input type="number" class="form-control" id="whole_sale_quantity" name="whole_sale_quantity" min="1" />
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Tag</label><span class="pl-1 text-danger">*</span><i data-toggle="tooltip" data-placement="top" 
                           data-original-title="These tag will the customer on searching product" 
                           class="mdi mdi-information"></i>
                           <select class="form-control add_tag" name="tags[]" multiple="multiple" required>
                             
                           </select>
                       </div> 

                       <div class="form-group">
                           <label>Size (Option)</label><i data-toggle="tooltip" data-placement="top" 
                           data-original-title="Product size if available. This is option for product" 
                           class="mdi mdi-information"></i>
                           <select class="form-control add_size" name="sizes[]" multiple="multiple" required>
                             
                           </select>
                       </div> 


                       <div class="form-group">
                           <label>Color (Option)</label><i data-toggle="tooltip" data-placement="top" 
                           data-original-title="Product color if available. This is option for product" 
                           class="mdi mdi-information"></i>
                           <select class="form-control add_color" name="colors[]" multiple="multiple" required>
                             
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
                               <input type="file" class="form-control dropify" name="thumbnail" required />
                           </div>
                       </div>

                       <div class="custom-control custom-checkbox mb-2">
                           <input type="checkbox" id="will_seo" name="will_seo" class="custom-control-input" value="will_seo" >
                           <label class="custom-control-label" for="will_seo" >SEO Info</label>
                           <i data-toggle="tooltip" data-placement="top" 
                             data-original-title="" 
                           class="mdi mdi-information"></i>
                       </div>
                       <div class="form-group show_seo_section ml-4" style="display:none">
                           <label>Meta Title</label><span class="pl-1 text-danger">*</span>
                           <div>
                               <input type="text" class="form-control" id="meta_title" name="meta_title"/>
                           </div>

                           <label>Meta Keyword</label><span class="pl-1 text-danger">*</span>
                           <div>
                               <select class="form-control add_tag" multiple="multiple" id="meta_keyword" name="meta_keywords[]">
                               </select>
                           </div>

                           <label>Meta Description</label><span class="pl-1 text-danger">*</span>
                           <div>
                                <textarea class="form-control summernote" id="meta_description" name="meta_description"></textarea>
                           </div>
                       </div>
  
                       <div class="form-group">
                           <label>Description</label>
                           <div>
                               <textarea class="form-control summernote" name="description" required="true"></textarea>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Specification</label>
                           <div>
                               <textarea class="form-control summernote" name="specification"  required="true"></textarea>
                           </div>
                       </div>

                        <div class="form-group">
                           <label>Return Policy</label>
                           <div>
                               <textarea class="form-control summernote" name="return_policy" required="true"></textarea>
                           </div>
                       </div>
                        <div class="form-group mb-0">
                           <div>
                               <button type="submit" class="submit_button btn btn-primary waves-effect waves-light mr-1">
                                   Add Product
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
                              $("#submit_form")[0].reset();
                              $(".submit_button").text("Submit").prop('disabled', false)
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