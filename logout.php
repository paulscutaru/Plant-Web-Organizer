<?php
/*Functii care implementeaza logout*/
session_start();
session_destroy();
header('Location: login.php');
?>