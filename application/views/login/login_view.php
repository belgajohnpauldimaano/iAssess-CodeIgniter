<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
	
	
   <link href="<?php echo base_url('materializecss/css/materialize.css');?>" rel="stylesheet">
   <link href="<?php echo base_url('materializecss/css/icon.css');?>" rel="stylesheet">
   <script src="http://127.0.0.1/jquery/jquery-1.9.1.js"></script>
   
   <style>
   		footer.page-footer{
			margin:0 0 0;	
		}
		/* label color */
	    #content-wrapper li{
			opacity:0;
		}
   </style>
</head>
<body style="" class="deep-purple">
	<?php echo $this->session->userdata('g_id');
		$this->session->sess_destroy();
	?>
    
    <ul id='content-wrapper'>
    
	<div class="container">
        <div class="container">
            <div class="container">
                    <div class="section">
                        <div class="section">
                            <div class="section">
                                <div class="section card hoverable ">
                                	
                                    <!--Header-->
                                	<li>
                                    <div class="card-title container section">
                                        <span class="orange-text hoverable">PUP</span><span class="brown-text"><i class="light">i</i>Assess</span>
                                    </div>
                                    </li>
                                    <!--Header-->
                                    
                                    <!--Content-->
                                    <li>
                                        <div class="divider"></div>
                                        <div class="card-content">
                                            <div class="row ">
                                                <form id="frm_login" action="<?php echo base_url(); ?>" method="post">
                                                    <div class="col s12 m12 input-field brown-text">
                                                        <i class="mdi-action-account-circle prefix"></i>
                                                        <input type="text" id="username" name="username" />
                                                        <label for="username">Username</label>
                                                    </div>
                                                    <div class="col s12 m12 input-field brown-text">
                                                        <i class="mdi-action-lock-open prefix"></i>
                                                        <input type="password" id="password" name="password" />
                                                        <label for="password">Password</label>
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--Content-->
                                    
                                    <!--Footer-->
                                    <li>
                                    <div class="card-action right-align ">
                                        <div class=" light">
                                        	<div class="row">
                                            	<div class="col m4 s4">                  
                                                	<button class="btn waves-effect waves-purple orange white-text light" type="submit" id="submit_form">Login</button>
                                                </div>
                                            	<div class="col m8 s8">
                                                	<span id="msg" class="red-text">
                                                    </span>
                                                    <div class="preloader-wrapper active small  hide" id="progress">
                                                        <div class="spinner-layer spinner-blue-only">
                                                            <div class="circle-clipper left">
                                                                <div class="circle"></div>
                                                            </div>
                                                            <div class="gap-patch">
                                                                <div class="circle"></div>
                                                            </div>
                                                            <div class="circle-clipper right">
                                                                <div class="circle"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </li>
                                    </div>
                                </div>
                                    </li>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
    <script>
		$(document).ready(function(e) {				
	  		Materialize.showStaggeredList("#content-wrapper");
			$('#msg').hide('fast');
			$('#frm_login').submit(function(e) {
                e.preventDefault();
				$('#msg').hide('fast');	
				$('#progress').addClass('hide');
				var frm = $('#frm_login');
				
				$.ajax({
					type:'POST',
					url: '<?php echo base_url(); ?>index.php/user/validate_user',
					data: frm.serialize(),
					beforeSend: function(){						
						$('#progress').removeClass('hide');
					},
					dataType:'json',
					success: function(data){				
						$('#progress').addClass('hide');
						$('#msg').fadeIn(1000).text(data.msg).fadeOut(5000);
						
					}
				}).done(function(data){
					
						if(data.isLoggedIn == true){						
							window.location.href = '<?php echo base_url(); ?>index.php';		
						}else{
							$('#frm_login')[0].reset();
						}
				});
            });
        });
	</script>
	
<script src="<?php echo base_url('materializecss/js/materialize.js');?>"></script>
</body>
</html>
