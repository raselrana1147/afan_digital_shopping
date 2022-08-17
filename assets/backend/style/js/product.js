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

              // show product status

        $('body').on('click','.show_product_status',function(e){
          e.preventDefault();
          let product_id=$(this).attr('product_id');
           $.ajax({
              url: $(this).attr('data-action'),
              method: "POST",
              data:{product_id:product_id},
              success:function(response){
                let data=response.product;
                
                $(".store_product_id").val(data.id)

                  if (data.featured==0) 
                  {
                    $('#featured').prop('checked', true)
                  }else
                  {
                    $('#featured').prop('checked', false)
                  }
                  if (data.best_sale==0) 
                  {
                    $('#best_sale').prop('checked', true)
                  }else
                  {
                    $('#best_sale').prop('checked', false)
                  }
              
                  if (data.trending==0) 
                  {
                    $('#trending').prop('checked', true)
                  }else
                  {
                    $('#trending').prop('checked', false)
                  }

                  if (data.new_arrival==0) 
                  {
                    $('#new_arrival').prop('checked', true)
                  }else
                  {
                    $('#new_arrival').prop('checked', false)
                  }
                  if (data.publish==0) 
                  {
                    $('#publish').prop('checked', true)
                  }else
                  {
                    $('#publish').prop('checked', false)
                  }
              },
           })

        });

        //  FLASH DEAL 
          $('body').on('click','.show_flash_deal',function(e){
          e.preventDefault();
          let product_id=$(this).attr('product_id');
           $.ajax({
              url: $(this).attr('data-action'),
              method: "POST",
              data:{product_id:product_id},
              success:function(response){
                let data=response.product;
                
                $(".keep_product_id").val(data.id)
                $(".current_discount").text("Current Discount: "+data.discount+" %")
                $("#end_date").val(data.end_date)

                  if (data.flash_deal==0) 
                  {
                    $('#flash_deal').prop('checked', true)
                  }else
                  {
                    $('#flash_deal').prop('checked', false)
                  }
              },
           })

        });


        // change product status

        $('body').on('click','.change_product_status',function(){

              let type=$(this).attr('status_type');
              let product_id=$(".store_product_id").val();

              $.ajax({
                 url: $(".store_product_id").attr('data-action'),
                 method: "POST",
                 data:{product_id:product_id,type:type},
                 success:function(data){
                   
                    toastr.success(data.message);
                 },
              })
        })

        $('body').on('submit','#set_flash_deal',function(e){
               e.preventDefault();
               let formDta = new FormData(this);

               $.ajax({
                 url: $(this).attr('data-action'),
                 method: "POST",
                 data: formDta,
                 cache: false,
                 contentType: false,
                 processData: false,
                 success:function(data){
                      toastr.success(data.message);
                      $("#set_flash_deal")[0].reset();
                 },

                 error:function(response){
                     var errors=response.responseJSON   
                 }

               });
        })

        $( "#end_date" ).datepicker({
              minDate:1 
        })

        })