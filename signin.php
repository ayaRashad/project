<?php
session_start();

require 'validation.php' ;
require 'dbConnection.php' ;


if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$errors= [];
    $email =Clean($_POST['email']);
    $password =Clean($_POST['password']);

    # Validate Email
    if (!validate($email, 1)) {
        $errors['Email'] = 'Field Required';
    } elseif (!validate($email, 2)) {
        $errors['Email'] = 'Invalid Email Format';
    }

    # Validate Password
    if (!validate($password, 1)) {
        $errors['password'] = 'Field Required';
    } elseif (!validate($password, 3)) {
        $errors['password'] = 'Length Must >= 6 chs';
    }

    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

        // Login Code ....... 
        $password = md5($password);

        $sql = "select * from user where email = '$email' and password = '$password' ";

        $op = mysqli_query($connect,$sql);

            if(mysqli_num_rows($op) == 1){
                
            $data = mysqli_fetch_assoc($op);
            
            $_SESSION['user'] = $data;

			header("Location: index.php") ;


            }else{
                echo 'Error in Email || Password Try Again !!!';
            }

    }

}
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<style>

	</style>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('');">
			<img style="   margin: 150px; width: 50%;" src="images/download.png" class="rounded-circle" alt="Cinque Terre">
        </div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					
						   
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

				
					

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
								<span class="txt1">
									
								</span>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Sign in
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign up
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>