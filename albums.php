<!DOCTYPE html>
<html lang="en">
<head>
	<title>Albums</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>
<body class="light-grey content">
<nav>
		<div>
			<img src="images/icon.png" alt="icon.png"  class="icon">
		</div>
		

		<div>
			<button class="openbtn" onclick="openNav()">☰</button>  
		</div >


		<div class="sidebar" id="mySidebar" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">  x  </a>
			<a href="addalbum.php">Add album</a>
			<a href="home.php">Main page</a>
		</div>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "201px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0px";
			}
		</script>
	</nav>

	<!--AFISARE ALBUME-->
	<div class="showalbum scrollable bottombar">
		<table>
			<tr>
				<th colspan="9"	><h2>My albums</h2></th>
				
			</tr>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Settings</th>
			</tr>
			
			<tr>
				<td>1</td>
				<td><img src="images/medicinal.jpg" alt="" ></img></td>
				<td>Medicinale</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td><img src="images/halucinogene.jpg" alt="" ></img></td>
				<td>Halucinogene</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td><img src="images/halucinogene.jpg" alt="" ></img></td>
				<td>Halucinogene</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td><img src="images/halucinogene.jpg" alt="" ></img></td>
				<td>Halucinogene</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td><img src="images/halucinogene.jpg" alt="" ></img></td>
				<td>Halucinogene</td>
				<td>
					<button class="button-addToAlbum shadow" id="">Share to..</button>
					<button class="button-delete shadow" id="">Delete</button>
				</td>
			</tr>
			

			
		</table>
	</div>

</body>
</html>