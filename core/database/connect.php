<?php
$con = mysqli_connect("localhost", "root", "", "herbaweb");
if (mysqli_connect_errno()) {
    die ('Conexiunea a esuat...');
 }
mysqli_select_db($con,'users');
?>