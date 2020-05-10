<?php
/*Functii folosite pt users */
function register_user($con, $register_data) {
	array_walk($register_data, 'array_clean');
	
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	return mysqli_query($con,"INSERT INTO `users` ($fields) VALUES ($data)");
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_data($con, $user_id){
	$data = mysqli_query($con,"SELECT * FROM `users` WHERE `id` = '$user_id'");
	$result = mysqli_fetch_assoc($data);
	return $result;
};

function user_exists($con, $user) {
	$username = clean($user);
    $query = mysqli_query($con,"SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username'");
    $result = mysqli_fetch_array($query);
    return $result[0] > 0 ? true : false;
}

function email_exists($con, $email) {
	$email = clean($email);
	$query = mysqli_query($con,"SELECT COUNT(`id`) FROM `users` WHERE `email` = '$email'");
	$result = mysqli_fetch_array($query);
    return $result[0] > 0 ? true : false;
}

function get_user_id($con, $user) {
	$username = clean($user);
    $query = mysqli_query($con,"SELECT `id` FROM `users` WHERE `username` = '$username'");
    $result = mysqli_fetch_array($query);
    return $result[0];
}

function login($con, $user, $pwd) {
	$user_id = get_user_id($con, $user);
	$username = clean($user);
	$password = md5($pwd);
	$query = mysqli_query($con,"SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
	$result = mysqli_fetch_array($query);
	return $result[0] > 0 ? $user_id : false;
}
