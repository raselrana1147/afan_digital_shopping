@extends("layouts.admin")
@section("title","Admin | Order List")
@section("breadcrumb","Order")
@section("content")
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-body">
                    <h4 class="mt-0 header-title">Order List</h4>
                   <table id="tables_item" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Sub Total</th>
                           <th>Grand Total</th>
                           <th>Order Number</th>
                           <th>Quantity</th>
                           <th>Ordered At</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                      
                   </table>
   
               </div>
           </div>
       </div> 
   </div> 

<div class="modal fade googleMap" tabindex="-1" role="dialog" aria-labelledby="googleMap" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="googleMap">User Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14596.910330545048!2d90.40309515!3d23.84605105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1643785272162!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

 <script>
         var table = $("#tables_item").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_order') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'sub_total',name:'sub_total'},
                 { data: 'grand_total',name:'grand_total'},
                 { data: 'order_number',name:'order_number'},
                 { data: 'quantity',name:'quantity'},
                 { data: 'order_at',name:'order_at'},
                 { data: 'status',name:'status'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
    <script>
        $(document).ready(function(){
              
            $('body').on('change','.order_status',function(){

                 let order_id=$(this).attr('order_id');
                  let status=$(this).val();
                     $.ajax({
                        url:$(this).attr('data-action'),
                        method:'post',
                        data:{order_id:order_id,status:status},
                        success:function(data){
                           toastr.success(data.message);
                    }
                }); 
            })      
        })
    </script>
@endsection()