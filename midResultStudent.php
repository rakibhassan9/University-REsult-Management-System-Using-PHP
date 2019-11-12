<?php include_once("classes/master.class.php"); ?>
<?php include_once("header.php"); ?>
<?php include_once("leftPanel.php"); ?>

<?php 
	if(isset($_SESSION['user_credentials'])){
		$user_credentials = $_SESSION['user_credentials'];
		if($user_credentials['user_type'] == 4){
			$student_id = $user_credentials['id'];
		}
		else{
			header("LOCATION: index.php");
		}
	}

	if(isset($_GET['semester']) && !empty($_GET['semester'])){
		$semester = $_GET['semester'];
	}
	
?>
        
<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Semester <?php echo $semester; ?> | Midterm Result</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="content mt-3">
		<div class="add-subject-main-wrapper">

			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Code</th>
						<th scope="col">Name</th>
						<th scope="col" class="subject-edit">Result</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;						
						$retrieve_subjects_obj = new retrieveData;
						$retrieve_subjects = $retrieve_subjects_obj->retrieveBySemester($semester);
					
						foreach($retrieve_subjects as $retrieve_subject):
						
						$subject_id = $retrieve_subject['id'];
						
						$midResult = $retrieve_subjects_obj->studentMidResults($subject_id, $student_id);
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td><?php echo $retrieve_subject['subject_code']; ?></td>
						<td><?php echo $retrieve_subject['subject_name']; ?></td>
						<td class="subject-edit"><?php echo $midResult; ?></td>
					</tr>
					
					<?php
						$row_number++;
						endforeach; 
					?>
					
				</tbody>
			</table>

		</div><!--signup main wrapper-->
	   

	</div> <!-- .content -->
</div><!-- /#right-panel -->






<!-- Modal -->
<div class="modal fade" id="deleteSubjectConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		<form action="deleteSubject.php" method="post">
			<input type="hidden" class="postId" name="id" value="">
			<button type="submit" class="btn btn-danger">Delete</button>
		</form>       
      </div>
    </div>
  </div>
</div>
    
<?php include("footer.php"); ?>



<script type="text/javascript">
	$(document).ready(function(){		
		$('.deleteButtonIcon').click(function(){
			var id = $(this).children('input').val();
			$(".postId").val(id);
		});
	});
</script>