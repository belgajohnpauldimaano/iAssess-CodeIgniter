
    <div class="main-content col s12 m9">
    <h4>List of Training Stations</h4>
    
    
    <div class="section">
    	<div class="row">
        	<div class="col s12 m3">
            	<div class="input-field">
		    		<input type="text" id="search" name="search" />
                    <label for="search">Search</label>
                </div>
            </div>
        	<div class="col s12 m3">
            	<!--<div class="input-field">
					<select id="branch">
                    	<option value="" selected>All</option>
                    	<?php if(!empty($branches)): foreach($branches as $branch ): ?>
                    		<option value='<?php echo $branch['br_id']; ?>'><?php echo $branch['br_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Branch</label>
                </div>-->
            </div>
            <div class="col s12 m3">
            	<!--<div class="input-field">
					<select id="course">
                    	<option value="" selected>All</option>
                    	<?php  if(!empty($courses)): foreach($courses as $course ): ?>
                    		<option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Courses</label>
                </div>-->
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
    	<div class="fixed-action-btn" style="top: 100px;right:45px">
            <a class=" btn-floating btn-large waves-effect waves-light purple" onclick="add_ts()"><i class="material-icons">add</i></a>
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
		//$('select').material_select();
		
		$('.loader-container').hide('slow'); //show the loading
		
		$('#search-btn').click(function(e) { // when the search button clicked
            Search_ts(); // call the search director function
        });
		
		$('#frm').submit(function(e) {
            e.preventDefault();
			var type = $('#cmd-type').val();
			var serializedData = $(this).serialize();
			
			if(type == 'add'){
				//Send data to server to add director
				
				$.ajax({
					url:'<?php echo base_url(); ?>index.php/Practicum_coordinator/Add_training_station',
					type:'POST',
					data: serializedData,
					beforeSend: function(){
						alert(serializedData);
					},
					success: function(data){
						alert(data);
						$('#modal1').closeModal();
					}
				});
			}else{
				//Send data to server to add director
				alert(type);
				return;
				$.ajax({
					url:'<?php echo base_url(); ?>index.php/Director/edit_Faculty',
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
			Search_ts();
        });
		
	});
	
	function run_pagination(page){ // pagination function
		var srch = $('#searchpc').val();
		$('.loader-container').show('slow');
		$.post(
			'<?php echo base_url(); ?>index.php/Practicum_coordinator/List_training_station/'+page, 
			{'page' : page, 'srch' : srch },
			function(data){
				$('#table-result').html(data);
				$('.loader-container').hide('slow'); 
			}
		);
		return false;
	}
	function add_ts(){ // clear and opens modal
		$('.modal-title h5').html("Add Training Station Information")
		$('#id').val('');
		$('#cmd-type').val('add');
		$('#cn').val('');
		$('#cp').val('');
		$('#pos').val('');
		$('#cnum').val('');
		$('#address').val('');
		$('#modal1').openModal();
	}
	function update_ts(id){ // get Data from the database and opens the modal Update
		var dataid = 'id='+ id;
		
		$('#un-container').css('display', 'none');
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Practicum_coordinator/View_individual_training_station",
			type:'POST',
			data: dataid,
			dataType:'json',
			beforeSend: function(){;
			},
			success: function(data){
				$('#id').val(data['id']);
				$('#cmd-type').val('edit');
				
				$('#cn').val(data['name']);
				$('#cn').focus();
				$('#cp').val(data['cpp']);
				$('#cp').focus();
				$('#pos').val(data['cpp']);
				$('#pos').focus();
				$('#cnum').val(data['cpn']);
				$('#cnum').focus();
				$('#address').val(data['adr']);
				$('#address').focus();
				
			}
		}); 	
				$('.modal-title h5').html("Edit Training Station Information");
				$('#modal1').openModal();
		
	}
	function delete_ts(id){
		var c = confirm("Are you sure you want to deactivate?");
		if(c){
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/deactivate_Faculty',
				type:'POST',
				data: 'id='+id,
				beforeSend: function(){},
				success: function(data){
					Search_ts();
					alert(data);
				}
			});
		}
	}
	function Search_ts(){ // Search
		var search_ts = $('#search').val();
		//var brnch = ($('#branch').val() == null ? "" : $('#branch').val());
		//var crs = ($('#course').val() == null ? "" : $('#course').val());
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Practicum_coordinator/List_training_station",
			data:"srch="+search_ts,//+"&crs="+crs,//+"&brnch="+brnch
			type:'POST',
			beforeSend: function(){
				$('.loader-container').show('slow');
			},
			success: function(data){
				$('#table-result').html(data);
				$('.loader-container').hide('slow');
			}
		}); 	
	}
</script>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="container modal-title">
        	<h5></h5>
        </div>
        <div class="divider"></div>
        <div class="container">
        	<div class="row">
            	<form id="frm">
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="cmd-type" id="cmd-type" />
                
                <div class="input-field s12 m12">
                	<div class="row">
                    	<div class="input-field col	s12 m12">
                            <label>Company</label>
                            <input type="text" name="cn" id="cn"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Contact Person</label>
                            <input type="text" name="cp" id="cp"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Position</label>
                            <input type="text" name="pos" id="pos"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Contact Number</label>
                            <input type="text" name="cnum" id="cnum"  required="required"/>
	                    </div>
                    	<div class="input-field col s12 m12">
                            <label>Address</label>
                            <input type="text" name="address" id="address"  required="required"/>
	                    </div>
                    </div>
                </div>
                <!--<div class="input-field col s12 m12" id="combo-for-branch">
					<select name="cmd-branch" id="cmd-branch"  required="required">
                    	<?php if(!empty($branches)): foreach($branches as $branch ): ?>
                    		<option value='<?php echo $branch['br_id']; ?>'><?php echo $branch['br_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Branch</label>
                </div>
                <div class="col s12 m12" id="combo-for-course">
                    <div class="input-field">
                        <select name="cmd-course" id="cmd-course"  required="required">
                            <?php  if(!empty($courses)): foreach($courses as $course ): ?>
                                <option value='<?php echo $course['crs_id']; ?>'><?php echo $course['crs_name']; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <label>Courses</label>
                    </div>
                </div>
                <div class="input-field col s12 m12" id="un-container">
                    <label>Username</label>
                    <input type="text" name="un" id="un" required="required" />
                </div>-->
			</div>
        </div>
    </div>
    <div class="modal-footer">
    	<button type="submit" class="btn" >Done</button>
    </div>
    			</form>
</div>

