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
			<form action="signupProcess.php" method="post" class="signup-form">
				<div class="form-group signup-first-name-wrapper">
					<label for="First Name">First Name</label>
					<input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="First Name" placeholder="First Name" >					
				</div>
				<div class="form-group signup-last-name-wrapper">
					<label for="Last Name">Last Name</label>
					<input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="Last Name" placeholder="Last Name" >					
				</div>
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="email" name="email_address" class="form-control" id="email_address" aria-describedby="Email Address" placeholder="Email" >					
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" name="password" class="form-control" id="password" aria-describedby="Password" placeholder="Password">					
				</div>				
				<div class="form-check signup-as-radio-student">
					<input class="form-check-input" type="radio" name="registerAs" id="radio-student" value="4" checked>
					<label class="form-check-label" for="exampleRadios1">
						Student
					</label>
				</div>
				<div class="form-check signup-as-radio-teacher">
					<input class="form-check-input" type="radio" name="registerAs" id="radio-teacher" value="3">
					<label class="form-check-label" for="exampleRadios1">
						Teacher
					</label>
				</div>
				<div class="form-group signup-submit-button">
					<button type="submit" name="submit" class="btn btn-primary btn-block">
						Register As Student
					</button>
				</div>			
				
			</form>
		</div><!--signup form main wrapper-->
		
	</div><!--Signup image overlay wrapper-->
</div><!--signup main wrapper-->

<?php include("footer.php"); ?>




<script type="text/javascript">
	
	$(document).ready(function(){
		/*Change Submit Button Text On Radio Button Click*/
		$("#radio-student").click(function(){
			$(".signup-submit-button > button").html('Register As Student');
		});
		$("#radio-teacher").click(function(){
			$(".signup-submit-button > button").html('Register As Teacher');
		});
		
		
		/*Change height of wrapper div as per display size*/
		var displayHeight = $(window).height();
		$(".signup-main-wrapper").css('height',displayHeight);
		$(".sigup-image-overlay-wrapper").css('height',displayHeight);
	});
</script> 




