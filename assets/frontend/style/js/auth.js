 $(document).ready(function(){
        $('body').on('submit','#submit_singin',function(e){
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

                   $('#HideRecoverPasswordLink').trigger('click')
                     toastr.success(data.message);
                   }  
               },

               error:function(response){

                    if (response.status === 422) {
                       // $.each(response.responseJSON.errors, function (i, error) {
                           // var el = $(document).find('[name="'+i+'"]');
                           // console.log(response.responseJSON.errors)
                           if (response.responseJSON.errors.hasOwnProperty('name')) {
                                $('.error_name').html(response.responseJSON.errors.name)      
                            }else{
                                $('.error_name').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('email')) {
                                $('.error_email').html(response.responseJSON.errors.email)      
                            }else{
                                $('.error_email').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('phone')) {
                                $('.error_phone').html(response.responseJSON.errors.phone)      
                            }else{
                                $('.error_phone').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('password')) {
                                $('.error_password').html(response.responseJSON.errors.password)      
                            }else{
                                $('.error_password').html('') 
                            }
                           // el.after($('<span class="valids" style="color: red;">'+error+'</span>'));
                       // });
                    }
               }

             });
        });

      })