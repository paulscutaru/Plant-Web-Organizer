<?php
/*Script care sterge un album din tabel*/
    include "core/init.php";
    $id = $_GET['id'];
    $query = "DELETE FROM albums where id=$id";
    mysqli_query($con,$query);
    header("Location: albums.php");
    exit();
?>