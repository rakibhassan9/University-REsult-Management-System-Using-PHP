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
					<h1>Subjects</h1>
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
						<th scope="col">Semester</th>
						<th scope="col" class="subject-edit">Edit</th>
						<th scope="col" class="subject-delete">Delete</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;
						$semester = array(
							1 => "Year-1, Semester-1",
							2 => "Year-1, Semester-2",
							3 => "Year-1, Semester-3",
							4 => "Year-2, Semester-4",
							5 => "Year-2, Semester-5",
							6 => "Year-2, Semester-6",
							7 => "Year-3, Semester-7",
							8 => "Year-3, Semester-8",
							9 => "Year-3, Semester-9",
							10 => "Year-4, Semester-10",
							11 => "Year-4, Semester-11",
							12 => "Year-4, Semester-12",
						);
						$retrieve_subjects_obj = new retrieveData;
						$retrieve_subjects = $retrieve_subjects_obj->retrieveAll('subjects', 'id', 'ASC');
					
						foreach($retrieve_subjects as $retrieve_subject):
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td><?php echo $retrieve_subject['subject_code']; ?></td>
						<td><?php echo $retrieve_subject['subject_name']; ?></td>
						<td><?php echo $semester[$retrieve_subject['semester']]; ?></td>
						<td class="subject-edit">
							<form action="editSubject.php" method="post">
								<input name="subject_id" type="hidden" value="<?php echo $retrieve_subject['id']; ?>">
								<button type="submit" >
									<i class="fas fa-edit"></i>
								</button>
							</form>							
						</td>
						<td class="subject-delete" >
							<!-- Button trigger modal -->
							<button type="button" class="deleteButtonIcon" data-toggle="modal" data-target="#deleteSubjectConfirmation">
								<input type="hidden" value="<?php echo $retrieve_subject['id']; ?>">
							 	<i class="fas fa-trash"></i>
							</button>							
						</td>
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