@extends("layouts.admin")
@section("title","Admin | Brand Update")
@section("breadcrumb","Brand Update")
@section("content")
      <div class="message_section" style="display: none"></div>
   <div class="row">

       <div class="col-lg-8 offset-2">
           <div class="card">
               <div class="card-body">
   					 <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
   					 	   <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a>
                   <form id="submit_form" class="custom-validation" data-action="{{ route('admin.brand_update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                       <input type="hidden" name="id" value="{{$brand->id}}">
                       <div class="form-group">
                           <label>Brand Name</label>
                           <input type="text" class="form-control" name="brand_name" required value="{{$brand->brand_name}}" />
                       </div>

                       <div class="form-group">
                           <label>Type</label>
                          <select class="form-control" name="type">
                             <option value="">Select Type</option>
                             <option {{$brand->type=='feature' ? 'selected' : ''}} value="feature">Feature</option>
                             <option {{$brand->type=='new_arrival' ? 'selected' : ''}} value="new_arrival">New Arrival</option>
                             <option {{$brand->type=='trending' ? 'selected' : ''}}value="trending">Trending</option>
                             <option {{$brand->type=='best_sale' ? 'selected' : ''}} value="best_sale">Best Sale</option>
                          </select>
                       </div>
   
                       <div class="form-group">
                           <label>Image</label>
                           <div>
                               <input type="file" name="image" class="form-control dropify" data-default-file="{{($brand->image !=null) ?  asset('assets/backend/image/brand/small/'.$brand->image) : asset('assets/backend/image/default.png') }}"/>
                           </div>
                           
                       </div>
                       <div class="form-group mb-0">
                           <div>
                               <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                   Submit
                               </button>
                           </div>
                       </div>
                   </form>
   
               </div>
           </div>
       </div> <!-- end col -->
   </div> <!-- end row -->
@endsection

@section('js')

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
                         toastr.success(data.message);
                        $(".submit_button").text("Submit").prop('disabled', false)
                        $('.message_section').html('').hide();
                    },

                    error:function(response){
                        var errors=response.responseJSON
                         if (response.responseJSON.errors['brand_name']) 
                         {
                             $('.message_section').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">`+response.responseJSON.errors['brand_name']+`<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>`).show();
                           $(".submit_button").text("Submit").prop('disabled', false)
                          }

            
                    }

                  });
            });
    })
</script>

@endsection