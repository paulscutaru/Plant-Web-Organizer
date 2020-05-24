<?php
/*Script care sterge un album din recomandate*/
    include "core/init.php";
    $id = $_GET['id'];
    $query = "DELETE FROM recommended_albums where id=$id";
    mysqli_query($con,$query);
    header("Location: albums.php");
    exit();
?>