$(document).ready(function(){
	// check whole sell
	 $('#sale_type_whole').on('click',function(){
	   
	    if ($(this).is(':checked')) {
	      $('.show_whole_section').show();
	      $('#whole_sale_quantity').attr('required', 'true');
	    }
	  
	  });

	   $('#sale_type_retail').on('click',function(){
	      if ($(this).is(':checked')) {
	        $('.show_whole_section').hide();
	        $('#whole_sale_quantity').removeAttr('required');
	      }
	    })


	   // SEO Section
	   $('#will_seo').on('click',function(){
	      if ($(this).is(':checked')) {
	          $('.show_seo_section').show();
	           $('#meta_title').attr('required', 'true');
	           $('#meta_keyword').attr('required', 'true');
	           $('#meta_description').attr('required', 'true');
	      }else{
	         $('.show_seo_section').hide();
	          $('#meta_title').removeAttr('required');
	          $('#meta_keyword').removeAttr('required');
	          $('#meta_description').removeAttr('required');
	      }
	    })
})