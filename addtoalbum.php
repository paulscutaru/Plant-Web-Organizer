<?php
/*Script care adauga o planta intr-un album*/
include "core/init.php";
$name = $_GET['album'];
$id_plant = $_GET['id_plant'];
$id_user = $_SESSION['user_id'];
if ($name == "None")
    $query = "UPDATE plants SET id_album=null WHERE id=$id_plant";
else {
    $query = "SELECT id FROM albums where `name`='$name' and `id_user`=$id_user";
    $result = mysqli_query($con, $query);
    $id =  mysqli_fetch_array($result);
    $query = "UPDATE plants SET id_album=$id[0] WHERE id=$id_plant";
}
mysqli_query($con, $query);
header("Location: albums.php");
exit();
