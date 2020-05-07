<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body class="light-grey content">

    <!-- Sidebar -->

    <!-- PAGE CONTENT -->
    <div class="principal">

        <!-- Add plants -->
        <div class="managebox center">
            <img src="images/icon.png" alt="icon.png" class="icon avatar">
            <h3>ADD PLANT</h3>
            <form action="manage.php" method="post" class="manageform" enctype="multipart/form-data">
                <p>Select image to upload:</p>
                <input type="file" name="photo" id="photo">
                <p>Enter name:</p>
                <input type="text" name="name" id="name">
                <p>Enter region:</p>
                <input type="text" name="region" id="region">
                <p>Enter color:</p>
                <input type="text" name="color" id="color">
                <p>Enter use:</p>
                <input type="text" name="uses" id="uses">
                <p>Others:</p>
                <input type="text" name="others" id="others">
                <input type="submit" value="Upload" name="submit" class="shadow button-upload">
            </form>
            <a href="home.php">Home page</a>
        </div>

    </div>

</body>

</html>


<?php
include 'core/init.php';

if (empty($_POST) === false) {
    $required_fields = array('region', 'color', 'use', 'date', 'others');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'You need to complete all the fields!';
            break 1;
        }
    }
    if (empty($errors) === true) {
		if (plant_exists($con, $_SESSION['user_id'], $_POST['name']) === true) {
			$errors[] = 'The plant \'' . $_POST['name'] . '\' is already in your inventory!';
		}
	}
}

if (empty($_POST) === false && isset($_FILES['photo']) && empty($errors) === true) {
    $plant_data = array(
        'id_user' => $_SESSION['user_id'],
        'photo' => $_FILES['photo']['name'],
        'name' => $_POST['name'],
        'region' => $_POST['region'],
        'color' => $_POST['color'],
        'uses' => $_POST['uses'],
        'others' => $_POST['others'],
		'date' => date("Y/m/d"),
    );

    if (add_plant($con, $plant_data) === TRUE) {
        //$data = array();
        //$data = user_data($con,get_user_id($con,$_POST['username']));
        //print_r($data);
        header('Location: home.php');
        exit();
    }
} else if (empty($errors) === false) {
    echo get_errors($errors);
}

?>