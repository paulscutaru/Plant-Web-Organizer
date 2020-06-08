<?php
/*Functii general utile */
function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: home.php');
		exit();
	}
}
/*Redirecteaza userul daca incearca sa intre fara sa fie logat */
function protected_page() {
	if (logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}
function array_clean(&$item) {
	$item = mysqli_real_escape_string($GLOBALS['con'] ,$item);
}
  
function clean($data){
	return mysqli_real_escape_string($GLOBALS['con'] ,$data);	
}

function get_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';
}
