@extends("layouts.admin")
@section("title","Admin | Banner Update")
@section("breadcrumb",'Update Banner')
@section("content")
      <div class="message_section" style="display: none"></div>
   <div class="row">

       <div class="col-lg-8 offset-2">
           <div class="card">
               <div class="card-body">
   					 <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
   					 	   <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a>
                   <form id="submit_form" class="custom-validation" data-action="{{ route('admin.banner_update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                     
                       <div class="form-group">
                           <label>Type</label>
                          <select class="form-control" name="type" required="">
                             <option value="">Select Type</option>
                             <option {{$data->type==='feature' ? 'selected' : ''}} value="feature">Feature</option>
                             <option {{$data->type==='new' ? 'selected' : ''}} value="new">New Arrival</option>
                             <option {{$data->type==='trending' ? 'selected' : ''}} value="trending">Trending</option>
                             <option {{$data->type==='best' ? 'selected' : ''}} value="best">Best Sale</option>
                           
                          </select>
                       </div>

                       <div class="form-group">
                           <label>Link</label>
                           <input type="url" class="form-control" name="url" value="{{$data->url}}"/>
                       </div>

                       <div class="form-group">
                           <label>@lang('admin.image')</label>
                           <div>
                               <input type="file" name="image" class="form-control dropify" data-default-file="{{($data->image !=null) ?  asset('assets/backend/image/banner/small/'.$data->image) : asset('assets/backend/image/'.default_image()) }}" />
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
                  
                    }

                  });
            });
    })
</script>

@endsection