<?php
/*Functii folosite pt albume */
function add_album($con, $album_data)
{
    array_walk($album_data, 'array_clean');
    $fields = '`' . implode('`, `', array_keys($album_data)) . '`';
    $data = '\'' . implode('\', \'', $album_data) . '\'';
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $_FILES["photo"]["name"]);
    mysqli_query($con, "INSERT INTO `albums` ($fields) VALUES ($data)");
    $id = mysqli_fetch_array(mysqli_query($con, "SELECT LAST_INSERT_ID()"));
    return $id[0];
}
function album_exists($con, $user, $album)
{
    $name = clean($album);
    $user_id = clean($user);
    $query = mysqli_query($con, "SELECT COUNT(`id`) FROM `albums` WHERE `name` = '$name' and `id_user` = '$user_id'");
    $result = mysqli_fetch_array($query);
    return $result[0] > 0 ? true : false;
}
function get_album_id($con, $name)
{
    $query = mysqli_query($con, "SELECT `id` FROM `albums` WHERE `name` = '$name'");
    $result = mysqli_fetch_array($query);
    return $result[0];
}
