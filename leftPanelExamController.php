<?php include_once('classes/master.class.php'); ?>
<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo_exaxmController.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Add Results</h3><!-- /.menu-title -->
					
					<li>
                        <a href="addResultsExamController.php"> 
						<i class="menu-icon fa fa-book"></i>
							Add Results By Subject
						</a>
                    </li>	
					
					<h3 class="menu-title">View Results</h3><!-- /.menu-title -->
					
					<li>
                        <a href="resultsBySubject.php"> 
						<i class="menu-icon fa fa-book"></i>
							View Results By Subject
						</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->