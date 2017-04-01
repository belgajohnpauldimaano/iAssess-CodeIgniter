
    <div class="main-content col s12 m9">
    <h4>Practicum Coordinator List</h4>
    
    
    <div class="section">
    	<div class="row">
        	<div class="col s12 m3">
            	<div class="input-field">
		    		<input type="text" id="searchpc" />
                    <label>Search</label>
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
        	<div class="col s12 m2">
            	<div class="input-field">
            	<button id="pc-search-btn" class="btn waves-effect waves-light" >Search</button>
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
            <a class=" btn-floating btn-large waves-effect waves-light purple" onclick="add_Practicum_Coordinator()"><i class="material-icons">add</i></a>
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
		
		$('#pc-search-btn').click(function(e) { // when the search button clicked
            search_Practicum_Coordinator(); // call the search director function
        });
		
		$('#frmupdate-pc').submit(function(e) {
            e.preventDefault();
			var type = $('#cmd-type').val();
			var serializedData = $(this).serialize();
			
			if(type == 'add'){
				//Send data to server to add director
				$.ajax({
					url:'<?php echo base_url(); ?>index.php/Director/add_Practicum_Coordinator',
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
					url:'<?php echo base_url(); ?>index.php/Director/edit_Practicum_Coordinator',
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
			search_Practicum_Coordinator();
        });
		
	});
	
	function run_pagination(page){ // pagination function
		var srch = ""+ $('#searchpc').val() +"";
		var brnch = ($('#branch').val() == null ? "" : $('#branch').val());
		
		$('.loader-container').show('slow');
		$.post(
			'<?php echo base_url(); ?>index.php/Director/list_Practicum_Coordinator/'+page, 
			{'page' : page, 'srch' : srch},
			function(data){
				$('#table-result').fadeOut('fast').fadeIn('slow').html(data);
				$('.loader-container').hide('slow'); 
			}
		);
		return false;
	}
	function add_Practicum_Coordinator(){ // clear and opens modal
		$('.modal-title h5').html("Add Practicum Coordinator Information")
		$('#id').val('');
		$('#cmd-type').val('add');
		$('#fn').val('');
		$('#mn').val('');
		$('#ln').val('');
		$('#un').val('');
		$('#un-container').css('display', 'block');
		$('#modal1').openModal();
	}
	function update_Practicum_Coordinator(id){ // get Data from the database and opens the modal Update
		var dataid = 'id='+ id;
		$('#un-container').css('display', 'none');
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Director/view_individual_Practicum_Coordinator",
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
				$('#combo-for-branch .select-wrapper input').val(data['br_name']);
				$('#cmd-branch').val(data['br_id']);
			}
		}); 	
		
		$('.modal-title h5').html("Edit Director Information")
		$('#modal1').openModal();
		
	}
	function delete_Practicum_Coordinator(id){
		var c = confirm("Are you sure you want to deactivate?");
		if(c){
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/Director/deactivate_Practicum_Coordinator',
				type:'POST',
				data: 'id='+id,
				beforeSend: function(){},
				success: function(data){
					alert(data);
					search_Practicum_Coordinator();
				}
			});
		}
	}
	function search_Practicum_Coordinator(){ // Search
		var searchpc = $('#searchpc').val();
		var brnch = ($('#branch').val() == null ? "" : $('#branch').val());
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Director/list_Practicum_Coordinator",
			data:"srch="+searchpc,//+"&brnch="+brnch,
			//data:{"srch="+dirsrch},
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
        	<h5>Update Director Information</h5>
        </div>
        <div class="divider"></div>
        <div class="container">
        	<div class="row">
            	<form id="frmupdate-pc">
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="cmd-type" id="cmd-type"  required="required"/>
                
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
                    	<?php if(!empty($branches)): foreach($branches as $branch ): ?>
                    		<option value='<?php echo $branch['br_id']; ?>'><?php echo $branch['br_name']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <label>Branch</label>
                </div>-->
                <div class="input-field col s12 m12" id="un-container">
                    <label>Username</label>
                    <input type="text" name="un" id="un"  required="required"/>
                </div>
			</div>
        </div>
    </div>
    <div class="modal-footer">
    	<button type="submit" class="btn" >Done</button>
    </div>
    			</form>
</div>

