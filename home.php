<?php
/*Pagina principala cu plante*/
include "core/init.php";
protected_page();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.mysite.com/rss/rss2.xml" />
	<script>
		function openNav() {
			document.getElementById("mySidebar").style.width = "16%";
		}

		function closeNav() {
			document.getElementById("mySidebar").style.width = "0px";
		}
		//AJAX
		function loadDoc() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText.split("\n");
					var id = Math.floor(Math.random() * result.length);
					document.getElementById("fact").innerHTML = result[id];
				}
			};
			xhttp.open("GET", "facts.txt", true);
			xhttp.send();
		}
	</script>
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
			<a href="exportdata.php">Export data</a>
			<a href="documentatie/scholarly.html">About</a>
			<a href="logout.php">Logout</a>

			<h4 class="padding-small">@<?php show_user_name($con) ?></h4>
		</div>
	</nav>

	<!-- PAGE CONTENT -->
	<div class="principal">

		<div class="margin-left">
			<h1>HerbaWeb</h1>
		</div>

		<form action="home.php" method="GET" enctype="multipart/form-data">
			<div class="categories">
				<div class="section">
					<div class="submenu">
						<h4 class="center">Region</h4>
						<select name="region" id="region" class="options white padding">
							<?php
							show_categories($con, 'region');
							?>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Color</h4>
						<select name="color" id="color" class="options white padding">
							<?php
							show_categories($con, 'color');
							?>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Uses</h4>
						<select name="uses" id="uses" class="options white padding">
							<?php
							show_categories($con, 'uses');
							?>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Other</h4>
						<select name="others" id="others" class="options white padding ">
							<?php
							show_categories($con, 'others');
							?>
						</select>
					</div>
				</div>

				<div class="search">
					<p>Search name:</p>
					<input type="text" name="search" id="search" placeholder=" Search">
				</div>

				<div class="sortby">
					<p>Sort by:</p>
					<select name="sort" id="sort">
						<option value="-">-</option>
						<option value="Date">Date</option>
					</select>
				</div>
			</div>

			<div>
				<input type="submit" name="submit" title="Press this button to submit or to refresh!" class="margin-left white button-submit shadow">
			</div>
		</form>


		<!-- Table of plants-->
		<div class="scrollable">
			<table>
				<tr>
					<th colspan="8" class="tableTitle">
						My plants
					</th>
				</tr>
				<tr>
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
				show_plants($con);
				?>

			</table>
		</div>

		<div class="bottombox topbar bottombar">
		<h4 class=" margin-left">Get a random fact</h4>
			<div class="listbox">
				
				<button class="button-fact margin-top margin-left" onclick="loadDoc()">Facts</button>
				<p id="fact" class="margin-left margin-top"></p>
			</div>
		</div>

		<!-- Bottom box -->
		<div class="bottombox topbar bottombar">
			<!-- Top most popular plants RSS Feed-->
			<div class="listbox">
				<h4 class="margin-left margin-top">Top 5 most popular plants:</h4>
				<a href="rss.php">
					<img src="images/rss_icon.png" class="margin-left rssIcon" alt="image.png" width="50" height="22">
				</a>
			</div>
		</div>
		<!-- End page content -->
	</div>

</body>

</html>