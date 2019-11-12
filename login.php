<?php 
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

	if(isset($_SESSION['user_credentials'])){
		$user_credentials = $_SESSION['user_credentials'];
		
		if($user_credentials['user_type']){
			header("LOCATION: index.php");
		}
		else{}
	}
?>

<?php include("header.php"); ?>

<div class="signup-main-wrapper">
	<div class="sigup-image-overlay-wrapper">
		<div class="signup-uoda-logo-wrapper">
			<a href="index.php">
				<img src="images/uoda-logo.png">
			</a>
		</div><!--Signup uoda logo wrapper-->
		
		<div class="signup-form-main-wrapper">
			<form action="loginProcess.php" method="post" class="signup-form">				
				<div class="form-group">					
					<input type="email" name="email_address" class="form-control" id="email_address" aria-describedby="Email Address" placeholder="Email" >					
				</div>
				<div class="form-group">					
					<input type="password" name="password" class="form-control" id="password" aria-describedby="Password" placeholder="Password">					
				</div>				
				<button type="submit" name="submit" class="btn btn-primary btn-block">
					Login
				</button>
				<br><br>
				
			</form>
		</div><!--signup form main wrapper-->
		
	</div><!--Signup image overlay wrapper-->
</div><!--signup main wrapper-->

<?php include("footer.php"); ?>




<script type="text/javascript">
	
	$(document).ready(function(){			
		/*Change height of wrapper div as per display size*/
		var displayHeight = $(window).height();
		$(".signup-main-wrapper").css('height',displayHeight);
		$(".sigup-image-overlay-wrapper").css('height',displayHeight);
	});
</script> 


