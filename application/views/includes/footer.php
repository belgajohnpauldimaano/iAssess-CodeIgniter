
	<footer class="page-footer ">
		<div class="footer-copyright">
			<div class="container">
				Theme by <i class="brown-text text-lighten-3">Materializecss</i>
			</div>
		</div>
	</footer>
	<!--<?php echo base_url('materializecss/js/materialize.js');?>-->
	<script src="http://127.0.0.1/ci/ci_materializecss/CodeIgniter-3.0.2/materializecss/js/materialize.js"></script>
	<script>
		$(document).ready(function(e){
			$(window).resize(function(e) {
				var window_width = $(window).width();
				if(window_width <= 975){
					//$('#search-dir').val(window_width);
					$('.main-content').removeClass('m9').addClass('m12');
					$('#menu-left-container').removeClass('hide-on-small-only').addClass('hide');

				}else{
					$('.main-content').removeClass('m12').addClass('m9');	
					$('#menu-left-container').removeClass('hide').addClass('hide-on-small-only');
				}
			});	
			
			$(window).load(function(e) {
				var window_width = $(window).width();
				if(window_width <= 975){
					//$('#search-dir').val(window_width);
					$('.main-content').removeClass('m9').addClass('m12');
					$('#menu-left-container').removeClass('hide-on-small-only').addClass('hide');

				}else{
					$('.main-content').removeClass('m12').addClass('m9');	
					$('#menu-left-container').removeClass('hide').addClass('hide-on-small-only');
				}
			});
			
		});
	</script>
</body>
</html>
