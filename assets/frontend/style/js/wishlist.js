 $(document).ready(function(){

	$('body').on('click','.add_to_wishlist',function(){
		  
		   let product_id=$(this).attr("product_id");
		 //  alert(product_id)
		  
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
		        }else{

		        	toastr.success(data.message);
		        	$('.total_wishlist').html(data.total_wishlist);
		        }
		         
		     },
		   });
	});


	$('body').on('click','.delete_wishlist',function(e){
		e.preventDefault();
		let wishlist_id=$(this).attr('wishlist_id');

	       $.ajax({
	          url:$(this).attr('data-action'),
	          method:'post',
	          data:{wishlist_id:wishlist_id},
	          success:function(response){
	             let data=JSON.parse(response)
	             if (data.type=="success") 
	             {
	             	toastr.success(data.message);
	             	if (data.total_wishlist==0)
	             	{
	             		$('.wishlist_section').html('<h4>Wishlist empty</h4>')
	             	}
	             	$(".total_wishlist").html(data.total_wishlist)
	             	$(".wishlist_row"+wishlist_id).hide();
	             	
	             }
	          }
	       }); 
	})
	
})