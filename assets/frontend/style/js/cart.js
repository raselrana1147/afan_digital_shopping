 $(document).ready(function(){

	$('body').on('submit','#submit_cart_form',function(e){
		   e.preventDefault();
		    let formDta = new FormData(this);
		  	
		   $.ajax({
		     url: $(this).attr('data-action'),
		     method: "POST",
		     data: formDta,
		     cache: false,
		     contentType: false,
		     processData: false,
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

		//apply coupon
		$('body').on('submit','#apply_coupon',function(e){
		   e.preventDefault();
		   let formDta = new FormData(this);
		   $.ajax({
		     url: $(this).attr('data-action'),
		     method: "POST",
		     data: formDta,
		     cache: false,
		     contentType: false,
		     processData: false,
		     success:function(response){
		         let data=JSON.parse(response)
		         if (data.status=="200") 
		         {
		         	toastr.success(data.message);
		         	
		         	$('.grand_total').html(data.grand_total);
		         	
		         }else
		         {
		         	toastr.error(data.message);
		         }
		     },

		     error:function(response){}

		   });
	});

	/// cart remove

	$('body').on('click','.delete_cart',function(e){
		e.preventDefault();
		let cart_id=$(this).attr('cart_id');

	       $.ajax({
	          url:$(this).attr('data-action'),
	          method:'post',
	          data:{cart_id:cart_id},
	          success:function(response){
	             let data=JSON.parse(response)
	             if (data.type=="success") 
	             {
	             	toastr.success(data.message);
	             	$(".cart-count").html(data.total_item)
	             	$(".cart-item-added").html(data.carts);
	             	$(".total_price").html(data.sub_total);
	             	$(".sub_total").html(data.sub_total);
	             	$(".grand_total").html(data.grand_total);
	             	$(".cart_row"+cart_id).hide();
	             	if (data.total_item==0) 
	             	{
	             	    $('.cart_section').html('<h4 class="text-center">Empty Cart</h4>')
	             	}
	             }
	          }
	       }); 
	})

		/// cart update

	$('body').on('change','.update_cart',function(e){

		e.preventDefault();
		let cart_id=$(this).attr('cart_id');
		let quantity=$(this).val();

	       	   $.ajax({
		          url:$(this).attr('data-action'),
		          method:'post',
		          data:{cart_id:cart_id,quantity:quantity},
		          success:function(response){
		             let data=JSON.parse(response)
		             if (data.type=="success") 
		             {
		             	
		             	$(".cart-count").html(data.total_item)
		             	$(".cart-item-added").html(data.carts);
		             	$(".sub_total").html(data.sub_total);
		             	$(".grand_total").html(data.grand_total);
		             	$(".each_cart_price"+cart_id).html(data.each_cart_price);
		             	toastr.success(data.message);
		             	
		             }else
		             {
		             	toastr.error(data.message);
		             }
		          }
	         }); 
		       	
	})

})