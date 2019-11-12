<?php include("header.php"); ?>
<?php include("leftPanel.php"); ?>
        




<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Change Password</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">

			<div class="add-subject-form-main-wrapper">
				<form action="changePasswordProcess.php" method="post" class="add-subject-form">
					<div class="form-group">
						<!--<label for="Subject Code">Subject Code</label>-->
						<input type="text" name="current_pass" class="form-control" id="subject_code" aria-describedby="Subject Code" placeholder="Current Password" >					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="new_pass" class="form-control" id="subject_name" aria-describedby="Subject Name" placeholder="New Password" >					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="confirm_pass" class="form-control" id="semester" aria-describedby="semester" placeholder="Confirm Password" >					
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block">
							Change Password
						</button>
					</div>
					
					<?php 
						if(isset($_GET['status']) && $_GET['status']==1):
					?>
					
					<div class="form-group">
						<label for="success" id="add-subject-confirm">Password Changed Successfully</label>
					</div>
					
					<?php endif; ?>

				</form>
			</div><!--signup form main wrapper-->

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->







    
<?php include("footer.php"); ?>