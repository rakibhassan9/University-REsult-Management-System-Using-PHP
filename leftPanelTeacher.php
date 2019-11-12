<?php include_once('classes/master.class.php'); ?>
<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo_teacherDashboard.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Add Results</h3><!-- /.menu-title -->
					
					<?php
						$user_credentials = $_SESSION['user_credentials'];
						$teacher_id = $user_credentials['id'];
						$retrieve_subjects_obj = new retrieveData;
						$retrieve_subjects = $retrieve_subjects_obj->retrieveByTeacherId('assign_subjects', $teacher_id);
					
						foreach($retrieve_subjects as $retrieve_subject):
							$retrieve_subject_by_id = $retrieve_subjects_obj->retrieveById('subjects', $retrieve_subject['subject_id']);
					?>
					
					<li>
                        <a href="addResultsTeacher.php?subject_id=<?php echo $retrieve_subject_by_id['id']; ?>"> 
							<i class="menu-icon fa fa-book"></i>
							<?php 
								echo $retrieve_subject_by_id['subject_code'];
							?>
						</a>
                    </li>
					
					<?php 
						endforeach;
					?>
					
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->