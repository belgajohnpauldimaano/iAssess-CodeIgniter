
    <div class="main-content col s12 m9">
    <h4>Class List</h4>
    
    <div class="section">
    	<div class="row">
        	<div class="col s12 m3">
            	<!--<div class="input-field">
		    		<input type="text" id="searchpc" />
                    <label>Search</label>-
                </div>-->
            </div>
        	<div class="col s12 m3">
            	<div class="input-field">
					<select id="acad_yr">
                    	<option value="" selected>All</option>
                    	<?php if(!empty($acad_years)): foreach( $acad_years as $acad_year ): ?>
                    		<option value='<?php echo $acad_year['cls_ay']; ?>'><?php echo $acad_year['cls_ay']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Academic Year</label>
                </div>
            </div>
            <div class="col s12 m3">
            	<div class="input-field">
					<select id="course">
                    	<option value="" selected>All</option>
                    	<?php  if(!empty($courses)): foreach($courses as $course ): ?>
                    		<option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Courses</label>
                </div>
            </div>
        	<div class="col s12 m2">
            	<div class="input-field">
            	<button id="cls-search-btn" class="btn waves-effect waves-light" >Search</button>
                </div>
            </div>
            <div class="col s12 m4" style="height:10px;">
            		
                    
                <div class="loader-container">
                <div class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-blue">
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
                    
                    <div class="spinner-layer spinner-red">
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
                    
                    <div class="spinner-layer spinner-green">
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
                    
                    <div class="spinner-layer spinner-yellow">
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
                </div><!--LOADER ENDS-->
                </div><!--LOADER CONTAINER ENDS-->
                    
                    
                    
                    
            </div>
        </div>
    </div>
    	<div class="fixed-action-btn" style="top: 100px;right:45px">
            <a class=" btn-floating btn-large waves-effect waves-light purple" onclick="add_Class()"><i class="material-icons">add</i></a>
    	</div>
    
        <div class='row'>
            <div id="table-result">	
                <?php
                    
                    echo $this->table->generate();
                    echo $this->ajax_pagination->create_links(); 
                ?>
            </div>	
        </div>
    
    </div>
</div> <!-- end of row class-->
<script>
	$(document).ready(function(e) {
		// Initialize the select
		$('select').material_select();
		
		$('.loader-container').hide('slow'); //show the loading
		
		$('#cls-search-btn').click(function(e) { // when the search button clicked
            search_Class(); // call the search director function
        });
		
		// on change the course 
		$('#cmd-course').change(function(e) {
			var course_id = $(this).val();
						
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/find_subj_by_course/'+course_id,
				beforeSend: function(){
					$('.cbo-preloader').fadeIn('slow');
				},
				success: function(data){
					$('#cmd-subj').html(data);
					$('.cbo-preloader').fadeOut('slow');
				}
			});
			
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/find_faculty_by_course/'+course_id,
				beforeSend: function(){
					$('.cbo-preloader').fadeIn('slow');
				},
				success: function(data){
					$('#cmd-fa').html(data);
					$('.cbo-preloader').fadeOut('slow');
				}
			});	
        });
		// on change the subject select
		/*$('#cmd-subj').change(function(e){
			alert($(this).val());	
		});*/
		
		
		
		
		$('#frmupdate').submit(function(e) {
            e.preventDefault();
			var type = $('#cmd-type').val();
			var serializedData = $(this).serialize();
			
			var fa_id = ( $('#cmd-fa').val() == null ? '' : $('#cmd-fa').val() ) ;
			var subj_id = ( $('#cmd-subj').val() == null ? '' : $('#cmd-subj').val() ) ;
			
			if( fa_id == '' || subj_id == '' ){
				alert('You must fill the required fields');
				return;
			}
			if(type == 'add'){
				//Send data to server to add director
				$.ajax({
					url:'<?php echo base_url(); ?>index.php/Director/Add_class',
					type:'POST',
					data: serializedData,
					beforeSend: function(){
					},
					success: function(data){
						alert(data);
						$('#modal1').closeModal();
					}
				});
			}else{
				//Send data to server to add director
				$.ajax({
					url:'<?php echo base_url(); ?>index.php/Director/Edit_class',
					type:'POST',
					data: serializedData,
					beforeSend: function(){
					},
					success: function(data){
						alert(data);
						$('#modal1').closeModal();
					}
				});
			}
			search_Class();
        });
		
	});
	
	function cbo_change(course_id, subj_id, fa_id){
		$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/find_subj_by_course/'+course_id+'/'+subj_id,
				beforeSend: function(){
					$('.cbo-preloader').fadeIn('slow');
				},
				success: function(data){
					$('#cmd-subj').html(data);
					$('.cbo-preloader').fadeOut('slow');
				}
			});
			
					
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/find_faculty_by_course/'+course_id+'/'+fa_id,
				beforeSend: function(){
					$('.cbo-preloader').fadeIn('slow');
				},
				success: function(data){
					$('#cmd-fa').html(data);
					$('.cbo-preloader').fadeOut('slow');
				}
			});	
	}
	
	function run_pagination(page){ // pagination function
		var acad_yr = ($('#acad_yr').val() == null ? "" : $('#acad_yr').val());
		var crs = ($('#course').val() == null ? "" : $('#course').val());
		
		$('.loader-container').show('slow');
		$.post(
			'<?php echo base_url(); ?>index.php/Faculty/list_Class/'+page, 
			{'page' : page, 'acad_yr' : ''+ acad_yr+'', 'crs' : crs},
			function(data){
				$('#table-result').fadeOut('fast').fadeIn('slow').html(data);
				$('.loader-container').hide('slow'); 
			}
		);
		return false;
	}
	function search_Class(){ // Search
		var acad_yr = ($('#acad_yr').val() == null ? "" : $('#acad_yr').val());
		var crs = ($('#course').val() == null ? "" : $('#course').val());
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Faculty/list_Class",
			data:"acad_yr="+acad_yr+"&crs="+crs,
			type:'POST',
			beforeSend: function(){
				$('.loader-container').show('slow');
			},
			success: function(data){
				$('#table-result').fadeOut('fast').fadeIn('fast').html(data);
				$('.loader-container').hide('slow');
			}
		}); 	
	}
</script>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container modal-title">
        	<h5>Add Class</h5>
        </div>
        <div class="divider"></div>
        <div class="container">
        	<div class="row">
            	<form id="frmupdate">
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="cmd-type" id="cmd-type" />
                
                <div class="input-field s12 m12">
                	<div class="row">
                    	<div class="input-field col	s12 m4 offset-m1">
                            <input type="text" name="sec" id="sec" placeholder="Section" required="required"/>
                            <label for="#sec">Section</label>
	                    </div>
                    	
                    	<div class="input-field col s12 m5">
                            <input type="text" name="ay" id="ay"  placeholder="Academic Year"  required="required"/>
                            <label for="ay">Academic Year</label>
	                    </div>
                    </div>
                </div>
                <div class="row">
                	<div class="input-field col s12 m9 offset-m1">
						<div id='combo-for-course'>
                            <select name="cmd-course" id="cmd-course"  required="required" class="browser-default">
                                <option disabled="disabled" selected="selected">Choose Course</option>
                                <?php  if(!empty($courses)): foreach($courses as $course ): ?>
                                    <option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <!--<label>Courses</label>-->
                        </div>
                    </div>
                    <div class="input-field col s12 m9  offset-m1" id="combo-for-branch">
                        <select name="cmd-subj" id="cmd-subj"  required="required" class="browser-default">
                            <option disabled="disabled">Choose Subject</option>
                        </select>
                    </div>
                    <div class="input-field col s2 m2">
                    	<div class='cbo-preloader' style="display:none">
                            <div class="preloader-wrapper small active">
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
                </div>
                <div class="row">
                    <div class="input-field col s12 m9  offset-m1" id="combo-for-branch">
                        <select name="cmd-fa" id="cmd-fa"  required="required" class="browser-default">
                            <option value="" disabled="disabled">Choose Faculty</option>
                        </select>
                    </div>
                    <div class="input-field col s2 m2">
                    	<div class='cbo-preloader' style="display:none">
                            <div class="preloader-wrapper small active">
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
                </div>
			</div>
        </div>
    </div>
    <div class="modal-footer">
    	<button type="submit" class="btn" >Done</button>
    </div>
    			</form>
</div>

