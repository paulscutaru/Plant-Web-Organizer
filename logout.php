<?php
/*Script care implementeaza logout*/
session_start();
session_destroy();
mysqli_close($con);
header('Location: login.php');
?>