@extends("layouts.admin")
@section("title","Admin | Product List")
@section("breadcrumb","Product List")
@section('css')
<link href="{{ asset('assets/backend/style/css/jquery-ui.css') }}" rel = "stylesheet">
 <style>
   .product-status{
           margin-left: 100px
      }
   .product-status span{
       position: absolute;
       padding-left: 10px;
      
   }

   .ui-widget-header{

    border: #ddd solid red !important;
    background: #000 !important
  }
 </style>
@endsection
@section("content")
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-body">
                     <a href="{{ route('admin.product_create') }}" class="btn btn-primary btn-icon float-right"><span class="btn-icon-label"><i class="fas fa-plus mr-2"></i></span>Add New</a>
                    <h4 class="mt-0 header-title">Product List</h4>
                   <table id="tables_item" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>Sale Price</th>
                           <th>Attributes</th>
                           <th>Action</th>

                       </tr>
                       </thead>
                      
                   </table>
   
               </div>
           </div>
       </div> <!-- end col -->
   </div> <!-- end row -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Product Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <div class="product-status">
                 
                    <input type="hidden" class="store_product_id" name="store_product_id" value="" data-action="{{ route('admin.update_product_status') }}">
                 

                  <div>
                      <input type="checkbox" id="featured" switch="dark" class="change_product_status" status_type="featured"/>
                      <label for="featured" data-on-label="Yes" data-off-label="No"></label><span>Featured</span>
                  </div>

                  <div>
                      <input type="checkbox" id="best_sale" switch="dark" class="change_product_status" status_type="best_sale"/>
                      <label for="best_sale" data-on-label="Yes" data-off-label="No"></label><span>Best Sale</span>
                  </div>

                  <div>
                      <input type="checkbox" id="trending" switch="dark" class="change_product_status" status_type="trending"/>
                      <label for="trending" data-on-label="Yes" data-off-label="No"></label><span>Treanding</span>
                  </div>

                   <div>
                      <input type="checkbox" id="new_arrival" switch="dark" class="change_product_status" status_type="new_arrival"/>
                      <label for="new_arrival" data-on-label="Yes" data-off-label="No"></label><span>New Arrival</span>
                  </div>

                  <div>
                      <input type="checkbox" id="publish" switch="dark" class="change_product_status" status_type="publish"/>
                      <label for="publish" data-on-label="Yes" data-off-label="No"></label><span>Publish</span>
                  </div>
                  

                 </div>
            </div>
            
        </div>
    </div>
     </div>
@endsection
@section('js')
<script src="{{ asset('assets/backend/style/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/backend/style/js/product.js') }}"></script>
 <script>
         var table = $("#tables_item").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_product') }}',
             columns: [
                
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                 { data: 'thumbnail',name:'thumbnail'},
                 { data: 'name',name:'name'},
                 { data: 'current_price',name:'current_price'},
                 { data: 'attribute',name:'attribute'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
@endsection()