@extends("layouts.admin")
@section("title","Admin | Staff Create")
@section("breadcrumb","Create Staff")
@section("content")
      <div class="message_section" style="display: none">
        
      </div>
   <div class="row">

       <div class="col-lg-8 offset-2">
           <div class="card">
               <div class="card-body">
   					 <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
   					 	   <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                   <form id="submit_form" class="custom-validation" data-action="{{ route('admin.staff_store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                       <div class="form-group">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" placeholder="name"/>
                       </div>

                       <div class="form-group">
                           <label>E-mail</label>
                           <input type="email" class="form-control" name="email" placeholder="Email"/>
                           <span class="error_email text-danger"></span>
                       </div>

                       <div class="form-group">
                           <label>Password</label>
                           <div>
                               <input type="password" name="password" class="form-control" required/>
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
                        $("#submit_form")[0].reset();
                        $(".submit_button").text("Submit").prop('disabled', false)
                        $('.message_section').html('').hide();
                    },

                    error:function(response)
                    {
                      if (response.status === 422) {
                         
                              if (response.responseJSON.errors.hasOwnProperty('email')) {
                                  $('.error_email').html(response.responseJSON.errors.email)      
                              }else{
                                  $('.error_email').html('') 
                              } 
                      }
                    }

                  });
            });

    })
</script>

@endsection