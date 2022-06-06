<?php 

if(!isset($_SESSION)) { 
    session_start(); 
} 

$_SESSION['previous_location'] = 'login';

if(!isset($username)){
	$username = '';
}

if(!isset($password)){
	$password = '';}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style.css">
		
<!--===============================================================================================-->
</head>
<body>
	
	<!-- <div class="limiter"> -->
		<div class="container-login">
			<div class="wrap-login">
				<form method="POST" action="validation.php" class="login-form" >
                
					<span class="login-form-title">
						Login
					</span>

					<div class="wrap-input" data-validate="Please enter username">
						<input class="input" type="text" name="username" placeholder="Username" value="<?php echo $username?>" > 
						<br />
						<?php if (isset($username_error)){?>
							<div class="invalid-header">
								<label><?php echo $username_error?></label>
							</div> 
						<?php } ?>
					</div>

					<div class="wrap-input" data-validate = "Please enter password">
						<input class="input" type="password" name="password" placeholder="Password" value="<?php echo $password?>">
						<br />
						<?php if (isset($password_error)){?>
							<div class="invalid-header">
								<label><?php echo $password_error?></label>
							</div>
						<?php } ?>
					</div>
					<div class="container-login-form-btn">
						<button type="submit" class="login-form-btn">
							Login
						</button>
					</div>
					
					<div class="container-reservation">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a href="signup.php" class="txt3">
							Create reservation now
						</a>
					</div>
				</form>
			</div>
		</div>
	<!-- </div> -->
</body>
</html>