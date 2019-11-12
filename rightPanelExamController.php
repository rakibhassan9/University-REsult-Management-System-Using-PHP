<?php include_once("classes/master.class.php"); ?>
<!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php include("rightPanelHeader.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
			
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count">
								<?php 
									$students_count_obj = new retrieveData;
									$students_count = count($students_count_obj->retrieveByUserType(
										'users_credentials',
										4,
										'user_type'
									));
								
									echo $students_count;
								?>
							</span>
                        </h4>
                        <p class="text-light">
							<?php 
								if($students_count>1){
									echo "Registered Students";
								}
								else{
									echo "Registered Student";
								}
							?>
						</p>
                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">                       
                        <h4 class="mb-0">
                            <span class="count">
								<?php 
									$teachers_count_obj = new retrieveData;
									$teachers_count = count($teachers_count_obj->retrieveByUserType(
										'users_credentials',
										3,
										'user_type'
									));
								
									echo $teachers_count;
								?>
							</span>
                        </h4>
                        <p class="text-light">
							<?php 
								if($teachers_count>1){
									echo "Registered Teachers";
								}
								else{
									echo "Registered Teacher";
								}
							?>
						</p>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count">
								<?php 
									$exam_controller_count_obj = new retrieveData;
									$exam_controller_count = count($exam_controller_count_obj->retrieveByUserType(
										'users_credentials',
										2,
										'user_type'
									));
								
									echo $exam_controller_count;
								?>
							</span>
                        </h4>
                        <p class="text-light">
							<?php 
								if($exam_controller_count>1){
									echo "Registered Exam Controllers";
								}
								else{
									echo "Registered Exam Controller";
								}
							?>
						</p>

                    </div>
                </div>
            </div>
            <!--/.col-->

        </div> <!-- .content -->
    </div><!-- /#right-panel -->