<?php include("header.php"); ?>
<?php include("leftPanel.php"); ?>
        




<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>	

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Add Subject</h1>
				</div>
			</div>
		</div>            
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">

			<div class="add-subject-form-main-wrapper">
				<form action="addSubjectProcess.php" method="post" class="add-subject-form">
					<div class="form-group">
						<!--<label for="Subject Code">Subject Code</label>-->
						<input type="text" name="subject_code" class="form-control" id="subject_code" aria-describedby="Subject Code" placeholder="Subject Code" >					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="subject_name" class="form-control" id="subject_name" aria-describedby="Subject Name" placeholder="Subject Name" >					
					</div>
					<div class="form-group">
						<!--<label for="Subject Name">Subject Name</label>-->
						<input type="text" name="semester" class="form-control" id="semester" aria-describedby="semester" placeholder="Semester" >					
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block">
							Add Subject
						</button>
					</div>
					
					<?php 
						if(isset($_GET['status']) && $_GET['status']==1):
					?>
					
					<div class="form-group">
						<label for="success" id="add-subject-confirm">Subject Added Successfully</label>
					</div>
					
					<?php endif; ?>

				</form>
			</div><!--signup form main wrapper-->

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->







    
<?php include("footer.php"); ?>