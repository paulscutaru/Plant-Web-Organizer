<?php
/*Pagina pentru admin*/
include 'core/init.php';
require 'core/functions/administrator.php';
protected_admin($con);
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
        <div class="scrollable">
            <table>
                <tr>
                    <th colspan="11" class="tableTitle">
                        Plants
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>ID User</th>
                    <th>ID Album</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Color</th>
                    <th>Uses</th>
                    <th>Others</th>
                    <th>Date</th>
                    <th>Settings</th>
                </tr>

                <?php
                show_all_plants($con);
                ?>

            </table>
        </div>
        
    </div>
</body>

</html>