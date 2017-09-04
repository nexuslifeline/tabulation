<!DOCTYPE html>
<html lang="en" class="coming-soon">


<head>
    <meta charset="utf-8">
    <title>JCORE - LOGIN</title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style-blessed3ef7a.css"> -->


    <style>
	    .ui-pnotify-title {
	    	color: white !important;
	    }

	    .input-group-addon {
	    	border: 1px solid #aaa!important;
	    	border-right: none!important;
	    	background: transparent!important;
	    	color: white;
	    }

	    .login-background {
	    	background: rgba(145,45,45,1);
			background: -moz-linear-gradient(left, rgba(145,45,45,1) 0%, rgba(2,5,0,1) 100%);
			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(145,45,45,1)), color-stop(100%, rgba(2,5,0,1)));
			background: -webkit-linear-gradient(left, rgba(145,45,45,1) 0%, rgba(2,5,0,1) 100%);
			background: -o-linear-gradient(left, rgba(145,45,45,1) 0%, rgba(2,5,0,1) 100%);
			background: -ms-linear-gradient(left, rgba(145,45,45,1) 0%, rgba(2,5,0,1) 100%);
			background: linear-gradient(to right, rgba(145,45,45,1) 0%, rgba(2,5,0,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#912d2d', endColorstr='#020500', GradientType=1 );
	    }

	    .form-control {
	    	border-radius: 0;
	    	background: transparent;
	    	color: white;
	    }

	    .form-control:focus {
	    	color: #28353b;
	    	background: #e9eef0;
	    }

	    #login {
	    	border-radius: 20px;
			-webkit-box-shadow: 0px 0px 140px 0px rgba(255,255,255,1);
			-moz-box-shadow: 0px 0px 140px 0px rgba(255,255,255,1);
			box-shadow: 0px 0px 140px 0px rgba(255,255,255,1);
	    }

        #modal_register input , #modal_verification input{
            color : black !important;
        }

    </style>

    </head>

<body class="focused-form animated-content login-background">
        
        
<div class="container" id="login-form">
	<a href="Login" class="login-logo"></a>
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-8">
				<span class="text-center" style="position: absolute; top: 10000%; left: 11%; font-size: 40px; font-family: 'Segoe UI', sans-serif; color: white; font-weight: 200;"><img src="" style="max-width: 150px;max-height: 100px;"><br><b>VOTING</b> SYSTEM
				<br>
					<span style="padding-right:15px;">

                    </span>
				</span>
			</div>
			<div class="col-md-4">
				<div style="border:none; margin-top: 15%;">
					<div id="login">
						<div class="panel-body">
							<!-- <h2>Login Form</h2> -->
							<div class="col-xs-12 text-center" style="margin-bottom: 20px;">
								<H4 style="color: white;"><strong>SIGN IN</strong> <span style="font-weight: 200;">TO YOUR ACCOUNT</span></H4>
							</div>
							<form action="#" class="form-horizontal" id="validate-form">
								<div class="form-group mb-md" id="userdiv">
			                        <div class="col-xs-12">
			                        	<div class="input-group">
			                        		<div class="input-group-addon">
			                        			<i class="fa fa-user"></i>
			                        		</div>
			                        		<input name="user_name" id="user" type="text" class="form-control " placeholder="Username" data-parsley-minlength="20" placeholder="At least 6 characters" required>
			                        	</div>
										
			                        </div>
								</div>

								<div class="form-group mb-md" id="passdiv">
			                        <div class="col-xs-12">
			                        	<div class="input-group">
			                        		<div class="input-group-addon">
			                        			<i class="fa fa-key"></i>
			                        		</div>
										<input name="user_pword" id="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>
			                        </div>
								</div>

								<div class="row">

									<div class="col-sm-offset-6"></div>								
									<div class="col-xs-12 col-sm-12">
										<button id="btn_login" type="button" class="btn btn-primary btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 0px;">
                                            <span class=""></span> Login
                                        </button>
                                        <button id="btn_register" type="button" class="btn btn-success btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 50px;">
                                            <span class=""></span> Register
                                        </button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
				<div class="clearfix">
					
				</div>


                <div id="modal_register" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog" style="width: 40%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title"><span id="modal_mode"> </span>Register</h4>
                            </div>

                            <div class="modal-body">
                                <form id="frmRegister">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <label>Username * : </label>
                                            <input type="text" name="voter_username" class="form-control" data-error-msg="Username is required." required />
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Password * : </label>
                                            <input type="password" name="voter_pword" class="form-control" data-error-msg="Password is required." required />
                                        </div>

                                        <div class="col-lg-12">
                                            <label>Firstname * : </label>
                                            <input type="text" name="voter_fname" class="form-control" data-error-msg="Firstname is required." required />
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Lastname : </label>
                                            <input type="text" name="voter_lname" class="form-control" />
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Middlename : </label>
                                            <input type="text" name="voter_mname" class="form-control" />
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Mobile # * : </label>
                                            <input type="text" name="voter_mobile" class="form-control" data-error-msg="Mobile # is required." required />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button id="btn_save_registration" type="button" class="btn btn-primary">Register</button>
                                <button id="btn_close" type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal_verification" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                    <div class="modal-dialog" style="width: 40%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title"><span id="modal_mode"> </span>Verification</h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <label>Please enter verification * : </label>
                                        <input type="text" id="txt_verification_code" class="form-control" />
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button id="btn_verify" type="button" class="btn btn-primary" data-voter-id="" >Verify</button>
                                <button id="btn_close" type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>
</div>

<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>

    <script>
        $(document).ready(function(){


            var bindEventHandlers=(function(){

                $('#btn_verify').click(function () {
                    var data = [];
                    data.push({name:"verification_code",value : $('#txt_verification_code').val() });
                    data.push({name:"voter_id",value : $(this).data('voter-id') });

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"Voters/transaction/verify",
                        "data":data,
                        "beforeSend": function(){

                        }
                    }).done(function(response){
                        showNotification(response);
                        if(response.stat=='success'){
                            $('#modal_verification').modal('hide');
                        }

                    });


                });

                $('#btn_save_registration').click(function () {
                    if( validateRequiredFields($('#frmRegister')) ){
                        var data = $('#frmRegister').serializeArray();

                        $.ajax({
                            "dataType":"json",
                            "type":"POST",
                            "url":"Voters/transaction/register",
                            "data":data,
                            "beforeSend": function(){

                            }
                        }).done(function(response){
                            showNotification(response);
                            if(response.stat=='success'||response.stat=='info'){
                                $('#btn_verify').data('voter-id' , response.voter_id );
                                $('#modal_register').modal('hide');
                                $('#modal_verification').modal('show');
                            }

                        });
                    }


                });

                $('#btn_register').click(function () {
                    event.preventDefault();
                    $('#modal_register').modal('show');
                });

                $('#btn_login').click(function(){

                    var l = Ladda.create(this);
                    l.start();


                    validateUser().done(function(response){

                        showNotification(response);

                        if(response.stat=="success"){
                            setTimeout(function(){
                                window.location.href = "dashboard";
                            },600);
                        }

                    }).always(function(){
                        l.stop();
                    });


                });

                $('input').keypress(function(evt){
                    if(evt.keyCode==13){
                    	evt.preventDefault();
                    	$('#btn_login').click();
                    }
                });

            })();

            var validateUser=function(){
                var _data={uname : $('input[name="user_name"]').val() , pword : $('input[name="user_pword"]').val()};

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validate",
                    "data" : _data,
                    "beforeSend": function(){
                    }
                });
            };


            var validateRequiredFields=function(f){
                var stat=true;

                $('div.form-group').removeClass('has-error');
                $('input[required],textarea[required],select[required]',f).each(function(){

                    if($(this).is('select')){
                        if($(this).select2('val')==0||$(this).select2('val')==null){
                            showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                            $(this).closest('div.form-group').addClass('has-error');
                            $(this).focus();
                            stat=false;
                            return false;
                        }
                    }else{
                        if($(this).val()==""){
                            showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                            $(this).closest('div.form-group').addClass('has-error');
                            $(this).focus();
                            stat=false;
                            return false;
                        }
                    }

                });

                return stat;
            };

            var showNotification=function(obj){
                PNotify.removeAll(); //remove all notifications
                new PNotify({
                    title:  obj.title,
                    text:  obj.msg,
                    type:  obj.stat
                });
            };

	        $('#user').focus(function()
			{ 
				$(this).attr('placeholder','');
				$(this).animate({
				    height: '40px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).attr('placeholder','Username');
				$(this).animate({
				    height: '32px',
				    'font-size': '14px'
				  }, 100, function() {
				    // Animation complete.
				  });	
			});

			$('#pass').focus(function()
			{ 
				$(this).attr('placeholder','');
				$(this).animate({
				    height: '40px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).attr('placeholder','Password');
				$(this).animate({
				    height: '32px',
				    'font-size': '14px',
				  }, 100, function() {
				    // Animation complete.
				  });	
			});

			$('#btn_login').focus(function()
			{ 
				$(this).animate({
				    height: '60px',
				    'font-size': '18px'
				  }, 100, function() {
				    // Animation complete.
				  });
			}).blur(function()
			{
				$(this).animate({
				    height: '33px',
				    'font-size': '14px',
				  }, 100, function() {
				    // Animation complete.
				  });	
			});
        });
    </script>


</body>

<!-- Mirrored from avenxo.kaijuthemes.com/extras-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:14:53 GMT -->
</html>