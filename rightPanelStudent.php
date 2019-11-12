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
									$subjects_count_obj = new retrieveData;
									$subjects_count = count($subjects_count_obj->retrieveAll(
										'subjects',
										'id'
									));
								
									echo $subjects_count;
								?>
							</span>
                        </h4>
                        <p class="text-light">
							<?php 
								if($subjects_count>1){
									echo "Subjects";
								}
								else{
									echo "Subject";
								}
							?>
						</p>
                    </div>

                </div>
            </div>
            <!--/.col-->          

            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->