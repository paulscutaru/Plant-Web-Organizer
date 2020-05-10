<?php
/*Pagina in care esti redirectionat daca nu esti logat si incerci pe o pagina*/
include 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Protected
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="loginbox">
        <h4>You are not logged in!</h4>
        <a href="index.html">Press here to redirect...</a>
    </div>
</body>

</html>