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
				<form action="myProfileTeacherProcess.php" method="post" class="signup-form">
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