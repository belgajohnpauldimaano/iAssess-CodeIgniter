
    <div class="main-content col s12 m9">
    <h4>Student List</h4>
    
    
    <div class="section">
    	<div class="row">
        	<div class="col s12 m3">
            	<div class="input-field">
		    		<input type="text" id="searchstud" />
                    <label>Search</label>
                </div>
            </div>
        	<!--<div class="col s12 m3">
            	<div class="input-field">
					<select id="branch">
                    	<option value="" selected>All</option>
                    	<?php /* if(!empty($branches)): foreach($branches as $branch ): ?>
                    		<option value='<?php echo $branch['br_id']; ?>'><?php echo $branch['br_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; */?>
                    </select>
                    <label>Branch</label>
                </div>
            </div>-->
            <div class="col s12 m3">
            	<div class="input-field">
					<select id="course">
                    	<option value="" selected>All</option>
                    	<?php if(!empty($courses)): foreach($courses as $course ): ?>
                    		<option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Courses</label>
                </div>
            </div>
        	<div class="col s12 m2">
            	<div class="input-field">
            	<button id="search-btn" class="btn waves-effect waves-light" >Search</button>
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
		$('#course').material_select();
		
		$('.loader-container').hide('slow'); //show the loading
		
		$('#search-btn').click(function(e) { // when the search button clicked
            search_student(); // call the search director function
        });
		
	});
	
	function run_pagination(page){ // pagination function
		var srch = ""+ $('#searchstud').val() +"";
		var crs = ($('#course').val() == null ? 0 : $('#course').val());
		
		$('.loader-container').show('slow');
		$.post(
			'<?php echo base_url(); ?>index.php/Faculty/List_student_info/'+page, 
			{'page' : page, 'srch' : srch, 'crs' : crs },
			function(data){
				$('#table-result').fadeToggle().html(data).fadeToggle();
				$('.loader-container').hide('slow'); 
			}
		);
		return false;
	}
	function add_Faculty(){ // clear and opens modal
		$('.modal-title h5').html("Add Practicum Coordinator Information")
		$('#id').val('');
		$('#cmd-type').val('add');
		$('#fn').val('');
		$('#mn').val('');
		$('#ln').val('');
		$('#un').val('');
		$('#cmd-type').focus();
		$('#un-container').css('display', 'block');
		$('#modal1').openModal();
	}
	function update_Faculty(id){ // get Data from the database and opens the modal Update
		var dataid = 'id='+ id;
		$('#un-container').css('display', 'none');
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Director/view_individual_Faculty",
			type:'POST',
			data: dataid,
			dataType:'json',
			beforeSend: function(){
			},
			success: function(data){
				$('#id').val(data['id']);
				$('#cmd-type').val('edit');
				
				$('#fn').focus();
				$('#fn').val(data['fn']);
				$('#mn').val(data['mn']);
				$('#mn').focus();
				$('#ln').val(data['ln']);
				$('#ln').focus();
				/*$('#combo-for-branch .select-wrapper input').val(data['br_name']);
				$('#cmd-branch').val(data['br_id']);*/
				$('#combo-for-course .select-wrapper input').val(data['crs_name']);
				$('#cmd-course').val(data['crs_id']);
			}
		}); 	
		
		$('.modal-title h5').html("Edit Director Information")
		$('#modal1').openModal();
		
	}
	function delete_Faculty(id){
		var c = confirm("Are you sure you want to deactivate?");
		if(c){
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/deactivate_Faculty',
				type:'POST',
				data: 'id='+id,
				beforeSend: function(){},
				success: function(data){
					search_student();
					alert(data);
				}
			});
		}
	}
	function search_student(){ // Search
		var searchstud = $('#searchstud').val();
		var crs = ($('#course').val() == "" ? 0 : $('#course').val());
		var cls_id = <?php echo $_GET['cls_id']; ?>;
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Faculty/List_student_info",
			data:"srch="+searchstud+"&crs="+crs+"&cls_id="+cls_id,
			type:'POST',
			beforeSend: function(){
				$('.loader-container').show('slow');
			},
			success: function(data){
				$('#table-result').fadeToggle().html(data).fadeToggle();
				$('.loader-container').hide('slow');
			}
		}); 	
	}
</script>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container modal-title">
        	<h5>Update Director Information</h5>
        </div>
        <div class="divider"></div>
        <div class="container">
        	<div class="row">
            	<form id="frmupdate-pc">
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="cmd-type" id="cmd-type" />
                
                <div class="input-field s12 m12">
                	<div class="row">
                    	<div class="input-field col	s12 m12">
                            <label>Firstname</label>
                            <input type="text" name="fn" id="fn"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Middlername</label>
                            <input type="text" name="mn" id="mn"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Lastname</label>
                            <input type="text" name="ln" id="ln"  required="required"/>
	                    </div>
                    </div>
                </div>
                <!--<div class="input-field col s12 m12" id="combo-for-branch">
					<select name="cmd-branch" id="cmd-branch"  required="required">
                    	<?php /* if(!empty($branches)): foreach($branches as $branch ): ?>
                    		<option value='<?php echo $branch['br_id']; ?>'><?php echo $branch['br_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; */?>
                    </select>
                    <label>Branch</label>
                </div>-->
                <div class="col s12 m12" id="combo-for-course">
                    <div class="input-field">
                        <select name="cmd-course" id="cmd-course"  required="required">
                            <?php  /*if(!empty($courses)): foreach($courses as $course ): ?>
                                <option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                            <?php endforeach; ?>
                            <?php endif; */?>
                        </select>
                        <label>Courses</label>
                    </div>
                </div>
                <div class="input-field col s12 m12" id="un-container">
                    <label>Username</label>
                    <input type="text" name="un" id="un" required="required" />
                </div>
			</div>
        </div>
    </div>
    <div class="modal-footer">
    	<button type="submit" class="btn" >Done</button>
    </div>
    			</form>
</div>

