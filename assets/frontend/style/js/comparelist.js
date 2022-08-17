 $(document).ready(function(){

	$('body').on('click','.add_to_comparelist',function(){
		
		   let product_id=$(this).attr("product_id");

		   $.ajax({
		     url: $(this).attr('data-action'),
		     method: "POST",
		     data: {product_id:product_id},
		     
		     success:function(response){
		         let data=JSON.parse(response)

		        if (data.status==401) {
		        	 window.location=data.route
		        }else if(data.status==201){
		        	toastr.warning(data.message);
		        	$('.total_comparelist').html(data.total_comparelist)
		        }else{
		        	toastr.success(data.message);
		        	$('.total_comparelist').html(data.total_comparelist)
		        } 
		     },
		   });
	});


	$('body').on('click','.delete_comparelist',function(e){
		e.preventDefault();
		let comparelist_id=$(this).attr('comparelist_id');

	       $.ajax({
	          url:$(this).attr('data-action'),
	          method:'post',
	          data:{comparelist_id:comparelist_id},
	          success:function(response){
	             let data=JSON.parse(response)
	             if (data.type=="success") 
	             {
	             	toastr.success(data.message);
	             	$(".comparelist_row"+comparelist_id).hide();
	             	location.reload();
	             	
	             }

	             if (data.total_wishlist==0) 
	             {
	                 $('.comparelist-section').html('<h4 class="text-center">Your comparelist is cleared</h4>')
	             }
	          }
	       }); 
	})
	
})