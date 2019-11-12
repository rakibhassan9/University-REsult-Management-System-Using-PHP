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


	//grading system by number
	function grading($total_number){
		if($total_number >= 80){
			$grade = array(
				'letter_grade' => 'A+',
				'grade_point'  => '4.00'
			);
		}
		elseif( $total_number >= 75 && $total_number < 80){
			$grade = array(
				'letter_grade' => 'A',
				'grade_point'  => '3.75'
			);
		}
		elseif( $total_number >= 70 && $total_number < 75){
			$grade = array(
				'letter_grade' => 'A-',
				'grade_point'  => '3.50'
			);
		}
		elseif( $total_number >= 65 && $total_number < 70){
			$grade = array(
				'letter_grade' => 'B+',
				'grade_point'  => '3.25'
			);
		}
		elseif( $total_number >= 60 && $total_number < 65){
			$grade = array(
				'letter_grade' => 'B',
				'grade_point'  => '3.00'
			);
		}
		elseif( $total_number >= 55 && $total_number < 60){
			$grade = array(
				'letter_grade' => 'B-',
				'grade_point'  => '2.75'
			);
		}
		elseif( $total_number >= 50 && $total_number < 55){
			$grade = array(
				'letter_grade' => 'C+',
				'grade_point'  => '2.50'
			);
		}
		elseif( $total_number >= 45 && $total_number < 50){
			$grade = array(
				'letter_grade' => 'C',
				'grade_point'  => '2.25'
			);
		}
		elseif( $total_number >= 40 && $total_number < 45){
			$grade = array(
				'letter_grade' => 'D',
				'grade_point'  => '2.00'
			);
		}
		elseif( $total_number < 40 ){
			$grade = array(
				'letter_grade' => 'F',
				'grade_point'  => '0.00'
			);
		}
		else{
			echo "No Number";
		}
		
		return $grade;
	}








	//grading system by point
	function grading_by_point($point){
		if($point >= 4.00){
			$letter_grade = 'A+';
		}
		elseif($point >= 3.75 && $point < 4.00){
			$letter_grade = 'A';
		}
		elseif($point >= 3.50 && $point < 3.75){
			$letter_grade = 'A-';
		}
		elseif($point >= 3.25 && $point < 3.50){
			$letter_grade = 'B+';
		}
		elseif($point >= 3.00 && $point < 3.25){
			$letter_grade = 'B';
		}
		elseif($point >= 2.75 && $point < 3.00){
			$letter_grade = 'B-';
		}
		elseif($point >= 2.50 && $point < 2.75){
			$letter_grade = 'C+';
		}
		elseif($point >= 2.25 && $point < 2.50){
			$letter_grade = 'C';
		}
		elseif($point >= 2.00 && $point < 2.25){
			$letter_grade = 'D';
		}
		elseif($point >= 0.00 && $point < 2.00){
			$letter_grade = 'F';
		}
		
		
		else{
			echo "No Number";
		}
		
		return $letter_grade;
	}

?>
        
<!-- Right Panel -->

<div id="right-panel" class="right-panel">
	<?php include("rightPanelHeader.php"); ?>

	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Semester <?php echo $semester; ?> | Final Result</h1>
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
						<th scope="col" class="subject-edit">Mark</th>
						<th scope="col" class="subject-edit">Grade Point</th>
						<th scope="col" class="subject-edit">Letter Grade</th>
						<th scope="col" class="subject-edit">Grade X Credit</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$row_number = 1;						
						$retrieve_subjects_obj = new retrieveData;
						$retrieve_subjects = $retrieve_subjects_obj->retrieveBySemester($semester);
						$row_span = count($retrieve_subjects);
						$subject_credit = 3;
						$total_creditxpoint = 0;
						$total_credit = $row_span*$subject_credit;
					
						foreach($retrieve_subjects as $retrieve_subject):
						
						$subject_id = $retrieve_subject['id'];					
						$midResult = $retrieve_subjects_obj->studentMidResults($subject_id, $student_id);
						$finalResult = $retrieve_subjects_obj->studentFinalResults($subject_id, $student_id);					
						$teachers_result = $midResult + $finalResult;
					
					
						$exam_controller_results = $retrieve_subjects_obj->retrieveResultExamController($subject_id, $student_id);
					
						$exam_controller_result = $exam_controller_results['attendance'];
						$exam_controller_result += $exam_controller_results['assignment'];
						$exam_controller_result += $exam_controller_results['tutorial'];
						$exam_controller_result += $exam_controller_results['viva'];
						$exam_controller_result += $exam_controller_results['presentation'];
					
						
						$subject_total_number = $exam_controller_result + $teachers_result;
						$subject_grading = grading($subject_total_number);
						$subject_grade_point = $subject_grading['grade_point'];
						$subject_letter_grade = $subject_grading['letter_grade'];
					
						$creditxpoint = $subject_grade_point * $subject_credit;
						$total_creditxpoint += $creditxpoint;
					
						
									
						
						
					?>
					
					
					<tr>
						<th scope="row"><?php echo $row_number; ?></th>
						<td><?php echo $retrieve_subject['subject_code']; ?></td>
						<td><?php echo $retrieve_subject['subject_name']; ?></td>
						<td class="subject-edit"><?php echo $subject_total_number; ?></td>
						<td class="subject-edit"><?php echo $subject_grade_point; ?></td>
						<td class="subject-edit"><?php echo $subject_letter_grade; ?></td>
						<td class="subject-edit"><?php echo $creditxpoint; ?></td>
					</tr>
					
					<?php
						$row_number++;
						endforeach; 
					?>
					
					
					
					
					
				</tbody>
			</table>
			
			<?php 
				$grade_point_average = $total_creditxpoint/$total_credit;
			
				if($grade_point_average >= 2.00){
					$letter_grade = grading_by_point($grade_point_average);
					$grade_point = $grade_point_average;
				}
				else{
					$letter_grade = "F";
					$grade_point = 0.00;
				}				
			
			?>
			
			<div class="row final_result_wrapper">
				<div class="col-md-6 grade_point">
					<p>Grade Point Average</p>
					<?php echo $grade_point; ?>
				</div>
				<div class="col-md-6 letter_grade">
					<p>Letter Grade</p>
					<?php echo $letter_grade; ?>
				</div>
			</div>
			
			

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