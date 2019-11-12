<?php include_once("classes/master.class.php"); ?>
<?php include_once("header.php"); ?>
<?php include_once("leftPanel.php"); ?>
        


<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>
	
	<div class="breadcrumbs">
		<form action="addResultsExamController.php" method="GET" class="add-subject-form">
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
			<form action="addResultsExamControllerProcess.php" class="form-inline" method="post">
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
						<th scope="col" class="subject-delete">Attendance</th>
						<th scope="col" class="subject-delete">Assignment</th>
						<th scope="col" class="subject-delete">Tutorial</th>
						<th scope="col" class="subject-delete">Viva</th>
						<th scope="col" class="subject-delete">Presentation</th>
						<th scope="col" class="subject-delete">Status</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						if(isset($subject_id) && !empty($subject_id)):
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
						<?php
							$student_id = $retrieve_user['user_id'];
							
							$exam_controllers_result_obj = new retrieveData;
							$exam_controllers_result = $exam_controllers_result_obj->retrieveResultExamController(
								$subject_id,
								$student_id								
							);
						
							$attendance = $exam_controllers_result['attendance'];
							$assignment = $exam_controllers_result['assignment'];
							$tutorial = $exam_controllers_result['tutorial'];
							$viva = $exam_controllers_result['viva'];
							$presentation = $exam_controllers_result['presentation'];
							$status = $exam_controllers_result['status'];
						
						?>
						
						<td class="subject-delete">							
							<input class="form-control" type="number" name="attendance[]" value="<?php echo $attendance; ?>" min="0" max="99" dir="rtl" required>
						</td>
						<td class="subject-delete">
							<input class="form-control" type="number" name="assignment[]" value="<?php echo $assignment; ?>" min="0" max="99" dir="rtl" required>
						</td>	
						<td class="subject-delete">
							<input class="form-control" type="number" name="tutorial[]" value="<?php echo $tutorial; ?>" min="0" max="99" dir="rtl" required>
						</td>	
						<td class="subject-delete">
							<input class="form-control" type="number" name="viva[]" value="<?php echo $viva; ?>" min="0" max="99" dir="rtl" required>
						</td>	
						<td class="subject-delete">
							<input class="form-control" type="number" name="presentation[]" value="<?php echo $presentation; ?>" min="0" max="99" dir="rtl" required>
						</td>
						<td class="subject-delete">
							<select class="form-control" name="status[]">
								<option <?php if($status ==1){echo "selected" ;} ?> value="1">Publish</option>
								<option <?php if($status ==0){echo "selected" ;} ?> value="0">Unpublish</option>
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