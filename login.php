<?php

require 'validation.php' ;
require 'dbConnection.php' ;


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name =Clean($_POST['name']);
    $email =Clean($_POST['email']);
    $address =Clean($_POST['address']);
    $password =Clean($_POST['password']);
    $phone =Clean($_POST['phone']);

	 # Validate Name
	 if (!validate($name, 1)) {
        $errors['Name'] = 'Field Required';
    } elseif (!validate($name, 7)) {
        $errors['Name'] = 'Invalid String';
    }

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


    # Validate phone
    if (!validate($phone, 1)) {
        $errors['phone'] = 'Field Required';
    } elseif (!validate($phone, 6)) {
        $errors['phone'] = 'Invalid Phone Number';
    }

    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        // db ..........
		echo "else" ;
    	$password = md5($password); 
		$sql = "insert into user (username,password,email,address,phone,role_id)values ('$name','$password','$email','$address','$phone',2)";
 		$operation =  mysqli_query($connect,$sql);
		if ($operation){
			header("Location: index.php");
		}else{

			echo "error".mysqli_error($connect);
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
					
						   

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<span class="label-input100">Address </span>
						<input class="input100" type="text" name="address" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

				
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Phone</span>
						<input class="input100" type="text" name="phone" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="signin.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
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