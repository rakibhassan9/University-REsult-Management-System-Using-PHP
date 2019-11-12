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
					<h1>Super Admins List</h1>
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
						<th scope="col" class="subject-edit">Email</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;
						$retrieve_users_obj = new retrieveData;
						$retrieve_users = $retrieve_users_obj->retrieveByUserType('users_credentials', 1, 'id', 'ASC');
					
						foreach($retrieve_users as $retrieve_user):
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td><?php echo $retrieve_user['first_name']; ?></td>
						<td><?php echo $retrieve_user['last_name']; ?></td>
						<td class="subject-edit"><?php echo $retrieve_user['email']; ?></td>
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







    
<?php include("footer.php"); ?>