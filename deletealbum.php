<?php
/*Script care sterge un album din tabel*/
    include "core/init.php";
    $id = $_GET['id'];
    $query = "UPDATE plants SET id_album=null WHERE id_album=$id";
    mysqli_query($con,$query);
    $query = "DELETE FROM albums where id=$id";
    mysqli_query($con,$query);
    header("Location: albums.php");
    exit();
?>