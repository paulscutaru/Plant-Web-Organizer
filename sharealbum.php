<?php
/*Script care recomanda un album tuturor utilizatorilor*/
    include "core/init.php";
    $id = $_GET['id'];
    $query = "INSERT into recommended_albums(id) VALUES($id)";
    mysqli_query($con,$query);
    header("Location: albums.php");
    exit();
?>