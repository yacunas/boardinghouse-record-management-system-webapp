<?php 

if(!isset($_SESSION)) { 
    session_start(); 
} 

$_SESSION['previous_location'] = 'signup';


if(!isset($username)){
	$username = '';
}

if(!isset($password1)){
	$password1 = '';}

if(!isset($password2)){
	$password2 = '';
}

if(!isset($firstName)){
	$firstName = '';
}

if(!isset($lastName)){
	$lastName = '';
}

if(!isset($address)){
	$address = '';
}

if(!isset($contact)){
	$contact = '';
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style.css">	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-signup">
				<form method="post" action="validation.php" class="login-form validate-form">
					<span class="login-form-title">
						Sign Up
					</span>

                    <div>
                        <span class="txt2">
							Account
						</span>
                    </div>


					<div class="wrap-input validate-input"  >
						<input class="input" type="text" name="username" placeholder="Username" value="<?php echo $username?>">
						<br />
						<?php if (isset($username_error)){?>
							<div class="invalid-header">
								<label><?php echo $username_error?></label>
							</div> 
						<?php } ?>
					</div>

					<div class="wrap-input validate-input" >
						<input class="input" type="password" name="password_1" placeholder="Password" value="<?php echo $password1?>"> 
						<br />
						<?php if (isset($password1_error)){?>
							<div class="invalid-header">
								<label><?php echo $password1_error?></label>
							</div> 
						<?php } ?>
					</div>
                    
					<div class="wrap-input validate-input" >
						<input class="input" type="password" name="password_2" placeholder="Re-Password" value="<?php echo $password2?>">
						<br />
						<?php if (isset($password2_error)){?>
							<div class="invalid-header">
								<label><?php echo $password2_error?></label>
							</div> 
						<?php } ?>
					</div>


                    <div>
                        <span class="txt2">
							Basic Information
						</span>
                    </div>


                    <div class="wrap-input validate-input">
						<input class="input" type="text" name="firstName" placeholder="Firstname" value="<?php echo $firstName?>">
						<br />
						<?php if (isset($firstName_error)){?>
							<div class="invalid-header">
								<label><?php echo $firstName_error?></label>
							</div> 
						<?php } ?>
					</div>
                    
                    <div class="wrap-input validate-input" >
						<input class="input" type="text" name="lastName" placeholder="Lastname" value="<?php echo $lastName?>">
						<br />
						<?php if (isset($lastName_error)){?>
							<div class="invalid-header">
								<label><?php echo $lastName_error?></label>
							</div> 
						<?php } ?>
					</div>
                    

                    <div class="radiobutton-container">

                        <label class="gender-label">Gender</label>

                        <label class="gender-container">Male
                            <input type="radio" checked="checked" name="radio_gender" value="Male">
                            <span class="checkmark"></span>
                        </label>
                      
                        <label class="gender-container">Female
                            <input type="radio" name="radio_gender" value="Female">
                            <span class="checkmark"></span>
                         </label>
                    </div>
                    

                    <div class="wrap-input validate-input" >
						<input class="input" type="text" name="address" placeholder="Address" value="<?php echo $address?>">
						<br />
						<?php if (isset($address_error)){?>
							<div class="invalid-header">
								<label><?php echo $address_error?></label>
							</div> 
						<?php } ?>
					</div>
                    
                    <div class="wrap-input validate-input" >
						<input class="input" type="text" name="contact" placeholder="Contact number" value="<?php echo $contact?>">
						<br />
						<?php if (isset($contact_error)){?>
							<div class="invalid-header">
								<label><?php echo $contact_error?></label>
							</div> 
						<?php } ?>
					</div>

					<div class="container-login-form-btn">
						<button type="submit" name="register_btn" class="login-form-btn">
							Create Account
						</button>
					</div>
					
					<div class="container-reservation">
						<span class="txt1">
							Already have an account?
						</span>

						<a href="login.php" class="txt3">
							Login now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>