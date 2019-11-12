<?php 
	include_once("classes/master.class.php");

	if(isset($_SESSION['user_credentials']) && !empty($_SESSION['user_credentials'])){		
		$user_credentials = $_SESSION['user_credentials'];
	
		$id = $user_credentials['id'];
		$first_name = $user_credentials['first_name'];
		$last_name = $user_credentials['last_name'];
		$email = $user_credentials['email'];
	}
	else{
		header("LOCATION: login.php");
	}

	if(isset($id) && !empty($id)){
		$student_profile_obj = new retrieveData;
		$student_profile = $student_profile_obj->retrieveById('students_profile', $id, 'user_id');
		
		$student_roll = $student_profile['roll'];
		$current_semester = $student_profile['current_semester'];
	}
	
?>


<?php include("header.php"); ?>
<?php include("leftPanel.php"); ?>
        




<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>My Profile</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-super-admin-main-wrapper">

			<div class="add-super-admin-form-main-wrapper">
				<form action="myProfileStudentProcess.php" method="post" class="signup-form">
				<input type="hidden" name="id" value="<?php if(isset($id)){echo $id;} ?>">
				<div class="form-group signup-first-name-wrapper">
					<label for="First Name">First Name</label>
					<input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="First Name" placeholder="First Name" value="<?php if(isset($first_name)){echo $first_name;} ?>">					
				</div>
				<div class="form-group signup-last-name-wrapper">
					<label for="Last Name">Last Name</label>
					<input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="Last Name" placeholder="Last Name" value="<?php if(isset($last_name)){echo $last_name;} ?>" >					
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="email" name="email_address" class="form-control" id="email_address" aria-describedby="Email Address" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>" >					
				</div>					
				<div class="form-group">
					<label for="studentId">Stuent Id</label>
					<input type="text" name="student_roll" class="form-control" id="student_roll" aria-describedby="student roll" placeholder="Student Id" value="<?php if(isset($student_roll)){echo $student_roll;} ?>" >					
				</div>					
				<div class="form-group">
					<label for="currentsemester">Current Semester</label>
					<select class="form-control" name="current_semester">
						<option <?php if(isset($current_semester) && $current_semester==1){ echo "selected";} ?> value="1">Semester 1</option>
						<option <?php if(isset($current_semester) && $current_semester==2){ echo "selected";} ?> value="2">Semester 2</option>
						<option <?php if(isset($current_semester) && $current_semester==3){ echo "selected";} ?> value="3">Semester 3</option>
						<option <?php if(isset($current_semester) && $current_semester==4){ echo "selected";} ?> value="4">Semester 4</option>
						<option <?php if(isset($current_semester) && $current_semester==5){ echo "selected";} ?> value="5">Semester 5</option>
						<option <?php if(isset($current_semester) && $current_semester==6){ echo "selected";} ?> value="6">Semester 6</option>
						<option <?php if(isset($current_semester) && $current_semester==7){ echo "selected";} ?> value="7">Semester 7</option>
						<option <?php if(isset($current_semester) && $current_semester==8){ echo "selected";} ?> value="8">Semester 8</option>
						<option <?php if(isset($current_semester) && $current_semester==9){ echo "selected";} ?> value="9">Semester 9</option>
						<option <?php if(isset($current_semester) && $current_semester==10){ echo "selected";} ?> value="10">Semester 10</option>
						<option <?php if(isset($current_semester) && $current_semester==11){ echo "selected";} ?> value="11">Semester 11</option>
						<option <?php if(isset($current_semester) && $current_semester==12){ echo "selected";} ?> value="12">Semester 12</option>
					</select>				
				</div>
				
				<div class="form-group add-super-admin-submit-button">
					<button type="submit" name="submit" class="btn btn-primary btn-block">
						Update My Profile
					</button>
				</div>
				
				<?php 
					if(isset($_GET['status']) && $_GET['status']==1):
				?>

				<div class="form-group">
					<label for="success" id="add-super-admin-confirm">
						Data Updated Successfully
					</label>
				</div>

				<?php endif; ?>
				
			</form>
			</div><!--signup form main wrapper-->

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->







    
<?php include("footer.php"); ?>