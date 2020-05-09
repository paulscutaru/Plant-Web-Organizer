<?php
include "core/init.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body class="light-grey content">

	<!-- Sidebar -->
	<nav>
		<div>
			<img src="images/icon.png" alt="icon.png" class="icon">
		</div>

		<div>
			<button class="openbtn" onclick="openNav()">☰ </button>
		</div>

		<div class="sidebar" id="mySidebar">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> x </a>
			<a href="manage.php">Add plants</a>
			<a href="albums.php">Albums</a>
			<a href="#about">About</a>
			<a href="logout.php">Logout</a>
		</div>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "16%";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0px";
			}
		</script>
	</nav>

	<!-- PAGE CONTENT -->
	<div class="principal">

		<!-- Navigation -->
		<nav>
			<div class="margin-left">
				<h1>HerbaWeb</h1>
			</div>

			<form action="home.php" method="post" enctype="multipart/form-data">
				<div class="categories">
					<div class="section">
						<div class="submenu">
							<h4 class="center">Region</h4>
							<select id="region" class="options white padding">
								<?php
								show_categories($con, 'region');
								?>
							</select>
						</div>
						<div class="submenu">
							<h4 class="center">Color</h4>
							<select id="color" class="options white padding">
								<?php
								show_categories($con, 'color');
								?>
							</select>
						</div>
						<div class="submenu">
							<h4 class="center">Uses</h4>
							<select id="uses" class="options white padding">
								<?php
								show_categories($con, 'uses');
								?>
							</select>
						</div>
						<div class="submenu">
							<h4 class="center">Other</h4>
							<select id="others" class="options white padding ">
								<?php
								show_categories($con, 'others');
								?>
							</select>
						</div>

					</div>

					<div class="search">
						<p>Search name:</p>
						<input type="text" placeholder=" Search">
					</div>

					<div class="sortby">
						<p>Sort by:</p>
						<select id="sort">
							<option value="none">-</option>
							<option value="rarity">Date</option>
						</select>
					</div>
				</div>

				<div>
					<input type="submit" title="Press this button after you have completed all fields!" class="margin-left white button-submit shadow">
				</div>
			</form>
		</nav>

		<!-- Table of plants-->
		<div class="topbar bottombar scrollable">
			<table>
				<tr>
					<th colspan="9">
						<h2>My plants</h2>
					</th>
				</tr>
				<tr>
					<th>ID</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Date</th>
					<th>Region</th>
					<th>Color</th>
					<th>Uses</th>
					<th>Others</th>
					<th>Settings</th>
				</tr>

				<?php
				show_plants($con);
				?>

			</table>
		</div>


		<!-- Bottom box -->
		<div class="bottombox topbar bottombar">
			<!-- Top most popular plants-->
			<div class="listbox">
				<h4 class="margin-left">Top 5 most popular plants:</h4>
				<ol class="list">
					<li class="padding"><a href="#plant1" class="top5-element">Plant</a></li>
					<li class="padding"><a href="#plant2" class="top5-element">Plant</a></li>
					<li class="padding"><a href="#plant3" class="top5-element">Plant</a></li>
					<li class="padding"><a href="#plant4" class="top5-element">Plant</a></li>
					<li class="padding"><a href="#plant5" class="top5-element">Plant</a></li>
				</ol>
			</div>
		</div>
		<!-- End page content -->
	</div>

</body>

</html>