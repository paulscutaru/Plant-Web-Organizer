<?php
/*Script care sterge o planta din tabel*/
    include "core/init.php";
    $id = $_GET['id'];
    $query = "DELETE FROM plants where id=$id";
    mysqli_query($con,$query);
    header("Location: home.php");
    exit();
?>


