<?php
/*Script care adauga un album de la recomandate in albumele utilizatorului*/
include "core/init.php";
$id = $_GET['id'];
$id_user = $_SESSION['user_id'];
$result = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM albums WHERE id=$id"));
$album_data = array(
    'id_user' => $id_user,
    'photo' => $result['photo'],
    'name' => $result['name'],
);
$id_album = add_album($con, $album_data);
$result = mysqli_query($con, "SELECT * FROM plants WHERE id_album=$id");
while ($row = mysqli_fetch_array($result)) {
    $plant_data = array();
    $plant_data = array(
        'id_user' => $_SESSION['user_id'],
        'id_album' => $id_album,
        'photo' => $row['photo'],
        'name' => $row['name'],
        'region' => $row['region'],
        'color' => $row['color'],
        'uses' => $row['uses'],
        'others' => $row['others'],
        'date' => $row['date'],
    );
    add_plant($con, $plant_data);
}
mysqli_query($con, "DELETE FROM recommended_albums WHERE id=$id");
header("Location: albums.php");
exit();
