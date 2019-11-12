<?php include_once("classes/master.class.php"); ?>
<?php include_once("header.php"); ?>
<?php include_once("leftPanel.php"); ?>
        


<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>
	
	<div class="breadcrumbs">
		<form action="resultsBySubject.php" method="GET" class="add-subject-form">
			<div class="form-group mt-3">
				<select name="subject_id" data-placeholder="Choose a Subject..." class="chosen-select teacher-select" tabindex="2" onchange="this.form.submit()">
					<option></option>
					<?php								
						$retrieve_subjects_obj = new retrieveData;
						$retrieve_subjects = $retrieve_subjects_obj->retrieveAll('subjects', 'id', 'ASC');

						foreach($retrieve_subjects as $retrieve_subject):
					?>
						<option <?php if(isset($_GET['subject_id']) && $_GET['subject_id'] == $retrieve_subject['id']){echo "selected";} ?> value="<?php echo $retrieve_subject['id'] ?>">
							<?php 
								echo $retrieve_subject['subject_code'] . " : " . 
									 $retrieve_subject['subject_name'];
							?>
						</option>

					<?php 
						endforeach; 
					?>
				</select>
			</div>
		</form>
	</div>

	<div class="breadcrumbs mt-2">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<?php
						if(isset($_GET['subject_id'])){
							$subject_id = $_GET['subject_id'];
							$retrive_subject_code_obj = new retrieveData;
							$retrieve_subject_code = $retrive_subject_code_obj->retrieveById('subjects', $subject_id);
						}
						
					?>
					<h1>
						<?php 
							if(isset($retrieve_subject_code) && !empty($retrieve_subject_code)){
								echo "Change [" . $retrieve_subject_code['subject_code'] . "] Status"; 
							}
							else{
								echo "No Subjects Selected";
							}
						?>
					</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">
			<form action="resultsBySubjectProcess.php" class="form-inline" method="post">
				<input type="hidden" name="subject_id" value="<?php 
					if(isset($_GET['subject_id'])){
						$subject_id = $_GET['subject_id'];
						echo $subject_id;
					}
				?>">
				
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Student ID</th>
						<th scope="col" class="subject-delete">Mid Term</th>
						<th scope="col" class="subject-delete">Final Term</th>
						<th scope="col" class="subject-delete">Status</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						if(isset($subject_id) && !empty($subject_id)):
						$row_number = 1;
						$retrieve_users_obj = new retrieveData;
						$retrieve_users = $retrieve_users_obj->retrieveByUserType('users_credentials', 4, 'id', 'ASC');
					
						foreach($retrieve_users as $retrieve_user):
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td>
							<?php echo $retrieve_user['first_name'] . " " . $retrieve_user['last_name']; ?>
						</td>
						<td>
							<input type="hidden" name="student_id[]" value="<?php echo $retrieve_user['id']; ?>">
							<?php echo $retrieve_user['id']; ?>
						</td>
						<td class="subject-delete">
							<?php 
								$retrieve_result_obj = new retrieveData;
								$retrieve_result = $retrieve_result_obj->retrieveResultTeacher($subject_id, $retrieve_user['id']);
							?>
							<?php echo $retrieve_result['midterm']; ?>
						</td>
						<td class="subject-delete">
							<?php echo $retrieve_result['final']; ?>
						</td>
						<td class="subject-delete">
							<select name="status[]" class="form-control">
								<option <?php if($retrieve_result['status'] == 1){echo "selected"; } ?> value="1">Publish</option>
								<option <?php if($retrieve_result['status'] == 0){echo "selected"; } ?>  value="0">Unpublish</option>
							</select>
						</td>
					</tr>
					
					<?php
						$row_number++;
						endforeach;
					?>
						
					
				</tbody>
			</table>
				<br>
				<button type="submit" name="submit" class="btn btn-primary">Save</button>				
			</form>
			<?php endif; ?>
			<?php
				if(isset($_GET['status']) && $_GET['status']==1):
			?>
			<div class="alert alert-success col-md-2 mt-3" id="success-alert" role="alert">
			  Results Added
			</div>
			<?php 
				endif;
			?>

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->

    
<?php include("footer.php"); ?>



<script type="text/javascript">
	$(document).ready(function(){
		
		$("#success-alert").fadeTo(2000, 100).slideUp(100, function(){
			$("#success-alert").slideUp(100);
		});
	});
</script>