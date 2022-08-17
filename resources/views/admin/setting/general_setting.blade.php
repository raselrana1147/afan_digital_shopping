@extends("layouts.admin")
@section("title","Admin | General Setting")
@section("breadcrumb",'General Setting')
@section("content")
      <div class="message_section" style="display: none"></div>
   <div class="row">

       <div class="col-lg-8 offset-2">
           <div class="card">
               <div class="card-body">
   					
                   <form id="submit_form" class="custom-validation" data-action="{{ route('admin.update_setting') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                       <div class="form-group">
                           <label>Shipping Charge</label>
                           <input type="text" class="form-control" name="shipping_charge" value="{{$data->shipping_charge}}"/>
                       </div>

                       <div class="form-group">
                           <label>Vat or tax</label>
                           <input type="text" class="form-control" name="tax" value="{{$data->tax}}"/>
                       </div>

                       <div class="form-group">
                           <label>Currency</label>
                           <input type="text" class="form-control" name="currency" value="{{$data->currency}}"/>
                       </div>


                       <div class="form-group">
                           <label>Logo</label>
                           <div>
                               <input type="file" name="logo" class="form-control dropify" data-default-file="{{($data->logo !=null) ?  asset('assets/backend/image/'.$data->logo) : asset('assets/backend/image/default.png') }}"/>
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