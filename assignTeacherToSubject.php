<?php include_once("classes/master.class.php"); ?>
<?php include("header.php"); ?>
<?php include("leftPanel.php"); ?>
        




<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Assign Teacher To Sbujects</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">

			<div class="add-subject-form-main-wrapper">
				<form action="assignSubjectProcess.php" method="post" class="add-subject-form">
					
					<div class="form-group">
						<select name="teacher_id" data-placeholder="Choose a Teacher..." class="chosen-select teacher-select" tabindex="2">
							<option></option>
							<?php
								$retrieve_users_obj = new retrieveData;
								$retrieve_users = $retrieve_users_obj->retrieveByUserType('users_credentials', 3, 'id', 'ASC');

								foreach($retrieve_users as $retrieve_user):
							?>
									<option value="<?php echo $retrieve_user['id'] ?>">
										<?php 
											echo $retrieve_user['first_name'] . " " . 
												 $retrieve_user['last_name'];
										?>
									</option>
							
							<?php 
								endforeach; 
							?>
													
						</select>
					</div>	
					
					<div class="form-group">
						<select name="subjects[]" data-placeholder="Choose a Subjects..." class="chosen-select teacher-select" multiple tabindex="4">
							<?php								
								$retrieve_subjects_obj = new retrieveData;
								$retrieve_subjects = $retrieve_subjects_obj->retrieveAll('subjects', 'id', 'ASC');

								foreach($retrieve_subjects as $retrieve_subject):
							?>
								<option value="<?php echo $retrieve_subject['id'] ?>">
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
					<div class="form-group">
						
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block">
							Assign Subjects
						</button>
					</div>
					
					<?php 
						if(isset($_GET['status']) && $_GET['status']==1):
					?>
					
					<div class="form-group">
						<label for="success" id="add-subject-confirm">Subjects Assigned Successfully</label>
					</div>
					
					<?php 
						elseif(isset($_GET['status']) && $_GET['status']==0):
					?>
					
					<div class="form-group">
						<label for="success" id="add-subject-confirm">Subjects already assigned, please try different subjects</label>
					</div>
					
					<?php endif; ?>

				</form>
			</div><!--signup form main wrapper-->

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->







    
<?php include("footer.php"); ?>