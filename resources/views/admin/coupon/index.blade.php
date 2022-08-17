@extends("layouts.admin")
@section("title","Admin | Coupon List")
@section("breadcrumb","Coupon List")
@section('css')

@endsection
@section("content")
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-body">
                     <a href="{{ route('admin.coupon_create') }}" class="btn btn-primary btn-icon float-right"><span class="btn-icon-label"><i class="fas fa-plus mr-2"></i></span>Add New</a>
                    <h4 class="mt-0 header-title">Coupon List</h4>
                   <table id="tables_item" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Title</th>
                           <th>Coupon Code</th>
                           <th>Shopping Account</th>
                           <th>Discount</th>
                           <th>Type</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                      
                   </table>
   
               </div>
           </div>
       </div> <!-- end col -->
   </div> <!-- end row -->
@endsection
@section('js')

 <script>
         var table = $("#tables_item").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_coupon') }}',
             columns: [
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                 { data: 'title',name:'title'},
                 { data: 'coupon_code',name:'coupon_code'},
                 { data: 'shopping_amount',name:'shopping_amount'},
                 { data: 'discount',name:'discount'},
                 { data: 'type',name:'type'},
                 { data: 'start_date',name:'start_date'},
                 { data: 'end_date',name:'end_date'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
    <script>
        $(document).ready(function(){
              
              $('body').on('click','.delete_item',function(){
                let item_id=$(this).attr('item_id');
                swal({
                  title: "Do you want to delete?",
                  icon: "info",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       $.ajax({
                          url:$(this).attr('data-action'),
                          method:'post',
                          data:{item_id:item_id},
                          success:function(data){
                             toastr.success(data.message);
                             $('#tables_item').DataTable().ajax.reload();
                             
                          }

                       }); 
                
                  } 
                });
              })
     
        })
    </script>
@endsection()