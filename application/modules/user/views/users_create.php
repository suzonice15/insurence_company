
<div class="col-md-offset-0 col-md-12">
<div class="box box-success ">
        <div class="box-header with-border">
         <h3 class="box-title"><?php if (isset($title)) echo $title ?></h3>


        </div>
        <div class="box-body">


		<form action="<?php echo base_url()?>user-save"  method="post" enctype="multipart/form-data" >
		<?php $this->load->view('users_form');?>

			<div class="box-footer">
				<input type="submit" class="btn btn-success pull-left" value="Save"/>

			</div>
		</form>
        </div>
        </div>



    <script>
        $(document).ready(function(){
            $('#user_email').blur(function(){
                var error_email = '';
                var email = $('#user_email').val();

                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!filter.test(email))
                {
                    $('#user_email_error').html('<label class="text-danger">Invalid Email</label>');
                    $('#user_email_error .text-danger').fadeOut(300000);
                }
                else
                {

                    $.ajax({
                        url:"<?php echo base_url()?>user/userController/email_check",
                        method:"POST",
                        data:{email:email},
                        success:function(result)
                        {
                            if(result == 'unique')
                            {

                            }
                            else
                            {
 $('#user_email_error').html('<label class="text-danger">Duplicated email Enter another email</label>');
                                $('#user_email_error .text-danger').fadeOut(300000);


                            }
                        },
                        errors:function (result) {
                            alert('ok');

                        }
                    });
                }
            });
        });
    </script>
