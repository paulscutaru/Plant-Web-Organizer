<?php
include "core/init.php";
protected_page();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Albums</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<script>
		function openNav() {
			document.getElementById("mySidebar").style.width = "201px";
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
			<button class="openbtn" onclick="openNav()">☰</button>
		</div>

		<div class="sidebar" id="mySidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> x </a>
			<a href="addalbum.php">Add album</a>
			<a href="home.php">Main page</a>
			<h4 class="padding-small">@<?php show_user_name($con) ?></h4>
		</div>
	</nav>

	<!--AFISARE ALBUME-->
	<div class="showalbum scrollable topbar">
		<table>
			<tr>
				<th colspan="4" class="tableTitle">My albums</th>
			</tr>
			<tr>
				<th>Photo</th>
				<th>Name</th>
				<th>Plants</th>
				<th>Settings</th>
			</tr>
			<?php
			show_albums($con);
			?>
		</table>
	</div>
	<!--ALBUME RECOMANDATE-->
	<div class="showrecommended scrollable topbar">
		<table>
			<tr>
				<th colspan="4" class="tableTitle">Recommended albums</th>
			</tr>
			<tr>
				<th>Photo</th>
				<th>Name</th>
				<th>Plants</th>
				<th>Settings</th>
			</tr>
			<?php
			show_recommended_albums($con);
			?>
		</table>
	</div>


</body>

</html>