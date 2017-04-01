<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $current_page ?></title>
	<!--<?php echo base_url('materializecss/css/materialize.css');?>-->
   <link href="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/materializecss/css/materialize.css" rel="stylesheet">
   <script src="http://127.0.0.1/jquery/jquery-1.9.1.js"></script>
   <script>
		$(document).ready(function(){
			//$('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
  			$(".button-collapse").sideNav();
			
		});
	   
   </script>
   
   <style>
   		footer.page-footer{
			margin:0 0 0;	
		}
		.main-content{
			min-height: 480px;	
		}
   </style>
</head>
<body>
<nav>
	<div class="container">
    <a href="#" class="brand-logo">PUP<span><i class="light">i</i></span>Assess
    </a>
    <!--<ul class=" right col m2  hide-on-small-only" >
        <li class="section">
            <div class="chip ">
                <img src="<?php echo base_url('materializecss/img/user.png');?>" alt="Contact Person">
                Richard Parker
            </div>
        </li>
    </ul>-->	
    <ul id="slide-out" class="side-nav ">
        <li><a href="#!">First Sidebar Link</a></li>
        <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
	<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
</nav>
<!--<div class="section light">-->
	<div class="row">
		<!--<div class="col s1 m3 hide-on-small-only" id="menu-left-container">
			<ul class="collapsible black-text" data-collapsible="accordion">
				<li>
					<div class="collapsible-header waves-effect waves-red"><a href="#" class="black-text">Home</a></div>
				<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
		<!--		</li>
				<li>
					<div class="collapsible-header active waves-effect waves-red">Second</div>
					<div class="collapsible-body">
                    	<p>Lorem ipsum dolor sit amet.</p>
                    </div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red">Third</div>
					<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
				</li>
				<li>
					<div class="collapsible-header waves-effect waves-red"><a href="#"  class="black-text">Logout</a></div>
					<!--<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>-->
		<!--		</li>
			</ul>
		</div>-->
        <?php echo $side_menu; ?>