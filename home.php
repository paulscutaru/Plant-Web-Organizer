<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body class="light-grey content" >

	<!-- Sidebar -->
	<nav>
		<div>
			<img src="images/icon.png" alt="icon.png"  class="icon">
		</div>
		

		<div>
			<button class="openbtn" onclick="openNav()">☰ </button>  
		</div >


		<div class="sidebar" id="mySidebar" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">  x  </a>
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
	<div class="principal" >

		<!-- Navigation -->
		<nav>
			<div class="margin-left">
				<h1>HerbaWeb</h1>
			</div>
		
			<form action="filter.php" method="post">
			<div class="categories">
				<div class="section">
					<div class="submenu">
						<h4 class="center">Region</h4>
						<select id="region" class="options white padding">
							<option value="all-regions">All</option>
							<option value="europe">Europe</option>
							<option value="asia">Asia</option>
							<option value="america">America</option>
							<option value="australia">Australia</option>
							<option value="india">India</option>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Color</h4>
						<select id="color" class="options white padding">
							<option value="all-colors">All</option>
							<option value="blue">Blue</option>
							<option value="red">Red</option>
							<option value="yellow">Yellow</option>
							<option value="green">Green</option>
							<option value="purple">Purple</option>
							<option value="pink">Pink</option>
							<option value="white">White</option>
							<option value="orange">Orange</option>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Uses</h4>
						<select id="uses" class="options white padding">
							<option value="all-uses">All</option>
							<option value="none">None</option>
							<option value="food">Food</option>
							<option value="beverages">Beverages</option>
							<option value="medicine">Medicine</option>
							<option value="dye">Dye</option>
							<option value="fabrics">Fabrics</option>
							<option value="decoration">Decoration</option>
						</select>
					</div>
					<div class="submenu">
						<h4 class="center">Other</h4>
						<select id="other" class="options white padding ">
							<option value="all-other">All</option>
							<option value="rare">Rare</option>
							<option value="protected">Protected</option>
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
				<th colspan="9"	><h2>My plants</h2></th>
				
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
			<tr>
				<td>1</td>
				<td><img src="images/photo1.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td><img src="images/photo2.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>			
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td><img src="images/photo3.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>				
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>			
			</tr>
			<tr>
				<td>4</td>
				<td><img src="images/photo4.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>			
			</tr>
			<tr>
				<td>5</td>
				<td><img src="images/photo5.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>			
			</tr>
			<tr>
				<td>6</td>
				<td><img src="images/photo6.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>	
			</tr>
			<tr>
				<td>7</td>
				<td><img src="images/photo7.jpg" alt="" ></img></td>
				<td>Plant</td>
				<td>04/04/2020</td>
				<td>Europe</td>
				<td>Blue</td>
				<td>Medicinal</td>
				<td>Protected</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Add to..</button>
					<button class="button-info shadow" id="">Info</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>			
			</tr>
		</table>
	</div>
		
			
		<!-- Bottom box -->
		<div class="bottombox topbar bottombar">
			<!-- Top most popular plants-->
			<div class="padding-16 listbox">
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