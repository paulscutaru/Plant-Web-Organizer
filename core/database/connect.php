<?php
/*Script care realizeaza conexiunea la baza de date mysql*/
$con = mysqli_connect("localhost", "root", "", "herbaweb");
if (mysqli_connect_errno()) {
    die ('Connection error...');
 }
mysqli_select_db($con,'users');
?>