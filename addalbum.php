<!DOCTYPE html>
<html lang="en">

<head>
    <title>HerbaWeb</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body class="light-grey content" style="max-width:1600px">

    <!-- PAGE CONTENT -->
    <div class="principalalb">

        <!-- Add album -->
        <div class="manageboxalb">
            <img src="images/icon.png" alt="icon.png" class="icon avataralbum">
            <h3>ADD ALBUM</h3>
            <form action="addalbum.php" method="post" class="manageformalb" enctype="multipart/form-data">
                <p>Select image to upload:</p>
                <input type="file" name="photo" id="photo" accept="image/*">
                <p>Enter name:</p>
                <input type="text" name="name" id="name">
                <input type="submit" value="CREATE" name="submit" class="shadow button-upload">
                <a href="albums.php">Go back to albums</a>
            </form>
        </div>



    </div>


</body>

</html>

<?php

include 'core/init.php';
protected_page();
if (empty($_POST) === false) {
    $required_fields = array('name');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'You need to complete all the fields!';
            break 1;
        }
    }
    if (empty($errors) === true) {
        if (album_exists($con, $_SESSION['user_id'], $_POST['name']) === true) {
            $errors[] = 'The album \'' . $_POST['name'] . '\' already exists!';
        }
    }
}

if (empty($_POST) === false && isset($_FILES['photo']) && empty($errors) === true) {
    $album_data = array(
        'id_user' => $_SESSION['user_id'],
        'photo' => $_FILES['photo']['name'],
        'name' => $_POST['name'],
    );
    if (add_album($con, $album_data) === TRUE) {
        //print_r($album_data);
        header('Location: albums.php');
        exit();
    }
} else if (empty($errors) === false) {
    echo get_errors($errors);
}

?>
