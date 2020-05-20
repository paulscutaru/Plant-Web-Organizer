<?php
/*Script folosit de admin pentru a altera userii*/
include "core/init.php";
$id = $_GET['id'];
$option = $_GET['option'];
if ($option == "block") {
    $query = "UPDATE users SET type='blocked' where id=$id";
} else if ($option == "unblock") {
    $query = "UPDATE users SET type=null where id=$id";
} else if ($option == "delete") {
    $query = "DELETE FROM users where id=$id";
}
mysqli_query($con, $query);
header("Location: admin.php");
exit();
