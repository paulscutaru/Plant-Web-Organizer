<?php
/*Pagina pentru admin*/
include 'core/init.php';
require 'core/functions/administrator.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Admin
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "16%";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0px";
        }
    </script>
</head>

<body class="light-grey">
    <div>
        <img src="images/icon.png" alt="icon.png" class="icon">
    </div>
    <nav>
        <div>
            <button class="openbtn" onclick="openNav()">☰ </button>
        </div>

        <div class="sidebar" id="mySidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> x </a>
            <a href="logout.php">Logout</a>
            <h4 class="padding-small">@<?php show_user_name($con) ?></h4>
        </div>
    </nav>
    <div class="principal">
        <!-- Table of users-->
        <div class="scrollable">
            <table>
                <tr>
                    <th colspan="7" class="tableTitle">
                        Users
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Settings</th>
                </tr>

                <?php
                show_users($con);
                ?>

            </table>
        </div>
    </div>
</body>

</html>