<!DOCTYPE html>
<html lang="en">

<head>
	<title>Index</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>

<body class="light-grey content" style="max-width:1600px">

	<!-- PAGE CONTENT -->
	<div class="principal">

		<!-- Login button -->
		<div class="loginbox">
			<img src="images/icon.png" alt="avatar.png" class="avatar">
			<h3>Login Here</h3>
			<form action="login.php" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">
				<input type="submit" name="submit" value="Login"><br>
				<a href="register.php">Don't have an account?</a>
			</form>
		</div>

	</div>

</body>

</html>

<?php
/*Script pentru login*/
include 'core/init.php';

if (!empty($_POST)) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) || empty($password)) {
		$errors[] = 'Please enter your username and password!';
	} else if (!user_exists($con, $username)) {
		$errors[] = 'The username does not exist!';
	} else {
		$login = login($con, $username, $password);
		if (!$login) {
			$errors[] = 'Wrong username or password!';
		} else {
			$_SESSION['user_id'] = $login;
			$query = mysqli_query($con, "SELECT type FROM `users` WHERE id = $login");
			$result = mysqli_fetch_array($query);
			if ($result[0] == "admin") {
				header('Location: admin.php');
				exit();
			} else if ($result[0] == "blocked") {
				header('Location: blocked.php');
				exit();
			} else {
				header('Location: home.php');
				exit();
			}
		}
	}
}
if (!empty($errors))
	echo get_errors($errors);
?>