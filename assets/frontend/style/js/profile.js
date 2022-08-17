 $(document).ready(function(){

  $('body').on('submit','#change_password',function(e){
       e.preventDefault();
       let formDta = new FormData(this);
       $('.submit_button').text('Save Changes...');
       $.ajax({
         url: $(this).attr('data-action'),
         method: "POST",
         data: formDta,
         cache: false,
         contentType: false,
         processData: false,
         success:function(response){
            let data=JSON.parse(response);
            if (data.status  !=200) { 
                toastr.error(data.message);
             }else{
              toastr.success(data.message);
              $("#change_password")[0].reset();
            }
         },

         error:function(response){

              if (response.status === 422) {
                 
                     if (response.responseJSON.errors.hasOwnProperty('old_password')) {
                          $('.error_old_pass').html(response.responseJSON.errors.old_password)      
                      }else{
                          $('.error_old_pass').html('') 
                      }

                      if (response.responseJSON.errors.hasOwnProperty('password')) {
                          $('.error_new_pass').html(response.responseJSON.errors.password)      
                      }else{
                          $('.error_new_pass').html('') 
                      }
                    $('.submit_button').text('Save Changes');   
              }
         }
       });
  });
  //profile update
  $('body').on('submit','#update_profile',function(e){
       e.preventDefault();
       let formDta = new FormData(this);
       $('.submit_button').text('Save Changes...');
       $.ajax({
         url: $(this).attr('data-action'),
         method: "POST",
         data: formDta,
         cache: false,
         contentType: false,
         processData: false,
         success:function(response){
            let data=JSON.parse(response);
            if (data.status==200) 
            {
                toastr.success(data.message);
                $('.submit_button').text('Save Changes');  
            }
            
         },

         error:function(response){
              
              if (response.status === 422) {
                 
                     if (response.responseJSON.errors.hasOwnProperty('name')) {
                          $('.error_name').html(response.responseJSON.errors.name)      
                      }else{
                          $('.error_name').html('') 
                      }


                    $('.submit_button').text('Save Changes');   
              }
           }
       });
  });

  // trigger image profile image feild 
  $('body').on('click','.upload_button',function(){
        $('.get_image').trigger('click')
    })

  $('.get_image').on('change',function(){
      const profile_image_path = document.querySelector('#profile_image_path');
      const image_path = document.querySelector('#image_path').files[0];
      const reader = new FileReader();
      reader.addEventListener("load", function () {
        profile_image_path.src = reader.result;
      }, false);

      if (image_path) {
        reader.readAsDataURL(image_path);
      }
  });

  //=====track order====

  $('body').on('submit','#track_order',function(e){
       e.preventDefault();
       let formDta = new FormData(this);
       $('.show_spinner').show();
       $.ajax({
         url: $(this).attr('data-action'),
         method: "POST",
         data: formDta,
         cache: false,
         contentType: false,
         processData: false,
         success:function(response){
            let data=JSON.parse(response);
            console.log(data.message);
            if (data.status==200) {
                    $('#order_track_area').html(data.message)
                    $('.show_spinner').hide();

            }else{

                $('.message_section').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">`+`<i class="fas fa-exclamation-triangle"></i> `+data.message+`<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                 </button>
                </div>`).show();
                $('#order_track_area').html("")
                 $('.show_spinner').hide();
            }
            
         },
       });
  });



})