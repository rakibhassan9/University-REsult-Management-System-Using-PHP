<?php 
	
	if(isset($_POST['subject_id']) && !empty($_POST['subject_id'])){
		$subject_id = trim($_POST['subject_id']);
		
		if(is_numeric($subject_id)){
			$subject_id = $subject_id;
		}
		else{
			header("LOCATION: subject.php?wrong_id=1");
			exit();
		}
	}
	else{
		header("LOCATION: subjects.php?noSubjectId=1");
	}

?>

<?php include("classes/master.class.php"); ?> 
<?php include("header.php"); ?>
<?php include("leftPanel.php"); ?>
       

<?php 
	if(isset($subject_id) && !empty($subject_id)){
		
		//setting some variables
		$subject_name = "";
		$subject_code = "";
		$semester = "";
		
		$subject_data_obj = new retrieveData;
		$subject_data = $subject_data_obj->retrieveById('subjects', $subject_id);
		
		//var_dump($subject_data);
		//exit();
		
		$subject_name = $subject_data['subject_name'];
		$subject_code = $subject_data['subject_code'];
		$semester = $subject_data['semester'];
	}
?>


<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Subject</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">

			<div class="add-subject-form-main-wrapper">
				<form action="editSubjectProcess.php" method="post" class="add-subject-form">
					<div class="form-group">
						<!--<label for="Subject Code">Subject Code</label>-->
						<input type="text" name="subject_code" class="form-control" id="subject_code" aria-describedby="Subject Code" value="<?php echo $subject_code; ?>">					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="subject_name" class="form-control" id="subject_name" aria-describedby="Subject Name" value="<?php echo $subject_name; ?>">					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="semester" class="form-control" id="semester" aria-describedby="semester" value="<?php echo $semester; ?>">					
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block">
							Save Changes
						</button>
					</div>
					
					<?php 
						if(isset($_GET['status']) && $_GET['status']==1):
					?>
					
					<div class="form-group">
						<label for="success" id="add-subject-confirm">Subject Edited Successfully</label>
					</div>
					
					<?php endif; ?>

				</form>
			</div><!--signup form main wrapper-->

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->







    
<?php include("footer.php"); ?>