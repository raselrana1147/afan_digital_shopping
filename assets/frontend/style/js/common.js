 $(document).ready(function(){

   $('body').on('click','.add_to_cart_single',function(e){
       e.preventDefault();
       let product_id=$(this).attr('product_id');

       $.ajax({
         url: $(this).attr('data-action'),
         method: "POST",
         data: {product_id:product_id},
         success:function(response){
             let data=JSON.parse(response)
             if (data.type=="success") 
             {
              toastr.success(data.message);
                $('.cart-count').html(data.total_item)
                $('.cart-item-added').html(data.carts);
                $('.grand_total').html(data.grand_total);
                $('.sub_total').html(data.sub_total);
             }else
             {
              toastr.error(data.message);
             }
         },

         error:function(response){}

       });
   });


  $('body').on('click','.header_cat',function(){
      let cat_id=$(this).attr('cat_id');
      let cat_name=$(this).text()
      
      $('.set_cat_id').val(cat_id)
      $('.set_cat_name').text(cat_name)
    })
    
    $('body').on('input','#slider1',function(){
  	let min=$(this).val();
  	$(this).prev('span').text(min)
  	$('.min_price').val(min);
  })

  $('body').on('input','#slider2',function(){
  	let max=$(this).val();
  	$(this).prev('span').text(max)
  	$('.max_price').val(max);
  })

})