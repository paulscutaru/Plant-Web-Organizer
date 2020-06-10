<?php
/*Pagina in care esti redirectionat daca nu esti logat si incerci sa intri pe o pagina, sau daca nu ai acces*/
include 'core/init.php';
session_destroy();
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
        <h4>You don't have access on this page!</h4>
        <a href="index.html">Press here to redirect...</a>
    </div>
</body>

</html>