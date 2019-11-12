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
					<h1>All Teachers List</h1>
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
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col" class="subject-delete">Delete</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;
						$retrieve_users_obj = new retrieveData;
						$retrieve_users = $retrieve_users_obj->retrieveByUserType('users_credentials', 3, 'id', 'ASC');
					
						foreach($retrieve_users as $retrieve_user):
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td><?php echo $retrieve_user['first_name']; ?></td>
						<td><?php echo $retrieve_user['last_name']; ?></td>
						<td><?php echo $retrieve_user['email']; ?></td>
						<td class="subject-delete" >
							<!-- Button trigger modal -->
							<button type="button" class="deleteButtonIcon" data-toggle="modal" data-target="#deleteTeacherConfirmation">
								<input type="hidden" value="<?php echo $retrieve_user['id']; ?>">
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
<div class="modal fade" id="deleteTeacherConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
		<form action="deleteTeacher.php" method="post">
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