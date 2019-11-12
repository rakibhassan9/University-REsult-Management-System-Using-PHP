<?php include_once("classes/master.class.php"); ?>
<?php include_once("header.php"); ?>
<?php include_once("leftPanel.php"); ?>
        


<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<?php
						if(isset($_GET['subject_id'])){
							$subject_id = $_GET['subject_id'];
							$retrive_subject_code_obj = new retrieveData;
							$retrieve_subject_code = $retrive_subject_code_obj->retrieveById('subjects', $subject_id);
							
							$semester = $retrieve_subject_code['semester'];
						}
						
					?>
					<h1>
						<?php 
							if(isset($retrieve_subject_code) && !empty($retrieve_subject_code)){
								echo "Add [" . $retrieve_subject_code['subject_code'] . "] Results"; 
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
			<form action="addResultsTeacherProcess.php" class="form-inline" method="post">
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
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;
						$retrieve_users_obj = new retrieveData;
						$retrieve_users = $retrieve_users_obj->studentsBySemester($semester);
					
						foreach($retrieve_users as $retrieve_user):
					
						$retrieve_student_name = $retrieve_users_obj->retrieveById(
							'users_credentials',
							$retrieve_user['user_id'],
							'id'
						);
					
					
						$retrieve_student_profile = $retrieve_users_obj->retrieveById(
							'students_profile',
							$retrieve_user['user_id'],
							'user_id'
						);
					
						$student_roll = $retrieve_student_profile['roll'];
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td>
							<?php echo $retrieve_student_name['first_name'] . " " . $retrieve_student_name['last_name']; ?>
						</td>
						<td>
							<input type="hidden" name="student_id[]" value="<?php echo $retrieve_user['user_id']; ?>">
							<?php echo $student_roll; ?>
						</td>
						<td class="subject-delete">
							<?php 
								$retrieve_result_obj = new retrieveData;
								$retrieve_result = $retrieve_result_obj->retrieveResultTeacher($subject_id, $retrieve_user['user_id']);
							?>
							<input class="form-control" type="number" name="midterm[]" value="<?php echo $retrieve_result['midterm']; ?>" min="0" max="99" dir="rtl" required>
						</td>
						<td class="subject-delete">
							<input class="form-control" type="number" name="final[]" value="<?php echo $retrieve_result['final']; ?>" min="0" max="99" dir="rtl" required>
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