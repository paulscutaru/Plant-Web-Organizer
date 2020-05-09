<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body class="light-grey content" style="max-width:1600px">

	<!-- PAGE CONTENT -->
	<div class="principal">

		<!-- Register button -->
		<div class="loginbox registerbox">
			<img src="images/icon.png" alt="avatar.png" class="avatar">
			<h3>Register Here</h3>
			<form action="register.php" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">
				<p>E-mail</p>
				<input type="text" name="email" placeholder="Enter email">
				<input type="submit" name="submit"><br>
				<a href="login.php">Already have an account?</a>
			</form>
		</div>

	</div>

</body>

</html>

<?php
include 'core/init.php';
logged_in_redirect();

if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'email');
	foreach ($_POST as $key => $value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'You need to complete all the fields!';
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (user_exists($con, $_POST['username']) === true) {
			$errors[] = 'The username \'' . $_POST['username'] . '\' is already taken!';
		}
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces!';
		}
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be at least 6 characters long!';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Enter a valid email!';
		}
		if (email_exists($con, $_POST['email']) === true) {
			$errors[] = 'The email \'' . $_POST['email'] . '\' is already taken.';
		}
	}
}


if (empty($_POST) === false && empty($errors) === true) {
	$register_data = array(
		'username' => $_POST['username'],
		'password' => $_POST['password'],
		'email' => $_POST['email'],
		'date' => date("Y/m/d"),
	);

	if (register_user($con, $register_data) == TRUE) {
		$data = array();
		$data = user_data($con, get_user_id($con, $_POST['username']));
		$_SESSION['user_id'] = get_user_id($con, $register_data['username']);
		//print_r($data);
		header('Location: home.php');
		exit();
	}
} else if (empty($errors) === false) {
	echo get_errors($errors);
}

?>