@extends("layouts.admin")
@section("title","Admin | Coupon Create")
@section("breadcrumb","Coupon Create")
@section('css')
<link href="{{ asset('assets/backend/style/css/jquery-ui.css') }}" rel = "stylesheet">
<style type="text/css">
  .ui-widget-header{

    border: #ddd solid red !important;
    background: #000 !important
  }
</style>
@endsection
@section("content")
      <div class="message_section" style="display: none"></div>
  <form id="submit_form" class="custom-validation" data-action="{{ route('admin.coupon_store') }}" method="POST">
   <div class="row">
   
       <div class="col-lg-8 offset-2">
        
           <div class="card">
               <div class="card-body">
   
                     @csrf
                       <div class="form-group">
                           <label>Title</label>
                           <input type="text" class="form-control" name="title" required placeholder="Enter title"/>
                       </div>
                        <div class="form-row">
                       <div class="form-group col-md-10">
                           <label>Coupon Code</label>
                           <div>
                               <input type="text" id="coupon_code" name="coupon_code" class="form-control" required placeholder="Enter code"/>
                           </div>
                          
                       </div>

                       <div class="form-group col-md-2">
                         
                           <div class="mt-4">
                                <a href="javascript:;" class="btn btn-primary generat_code">Generat Code</a>
                           </div>
                          
                       </div>
                       </div>

                       <div class="form-group">
                           <label>Shopping Amount</label>
                           <div>
                               <input type="number" class="form-control" name="shopping_amount" required placeholder="Enter price" min="1" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label>Discount</label>
                           <div>
                               <input type="number" class="form-control" name="discount" required placeholder="Enter discount" min="1" />
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Coupon Type</label>
                           <div>
                              <select class="form-control" name="type" required="">
                                <option value="">Select Category</option>
                                   <option value="flat">Flat</option>
                                   <option value="percent">Percent</option>
                              </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label>Start Date</label>
                           <div>
                               <input type="text" class="form-control" name="start_date" required placeholder="Enter start date" id="start_date"/>
                           </div>
                       </div>
                       <div class="form-group">
                           <label>End Date</label>
                           <div>
                               <input type="text" class="form-control" name="end_date" required placeholder="Enter end date" id="end_date"/>
                           </div>
                       </div>

                    
                       <div class="form-group">
                           <label>Description</label>
                           <div>
                              <textarea cols="20" rows="4" name="description" class="form-control" required="" placeholder="Coupon details.."></textarea>
                           </div>
                       </div>
                       <div class="form-group mb-0">
                           <div>
                              <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                   Submit
                               </button>
                           </div>
                       </div>
               </div>
           </div>
       </div>
   
   </div>
    </form>
@endsection

@section('js')
<script src="{{ asset('assets/backend/style/js/jquery-ui.js') }}"></script>
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
                  });
            });
        // generate coupon code
        $('body').on('click','.generat_code',function(){
            let code= Math.floor(100000 + Math.random() * 900000);
            $('#coupon_code').val("CO"+code);
          
        })

        // jquery date time
        $( "#start_date" ).datepicker({
                  minDate:0
            });
        $( "#end_date" ).datepicker({
              minDate:1 
        });

    })
</script>

@endsection