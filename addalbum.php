<!DOCTYPE html>
<html lang="en">
<head>
	<title>HerbaWeb</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>
<body class="light-grey content" style="max-width:1600px">

	<!-- Sidebar -->
	
	
	
	
	<!-- PAGE CONTENT -->
	<!-- PAGE CONTENT -->
	<div class="principalalb" >
    
		<!-- Add album -->
	<div class="manageboxalb">
        <img src="images/icon.png" alt="icon.png" class="icon avataralbum">
        <h3>ADD ALBUM</h3>
        <form action="albums.php" method="post" class="manageformalb" enctype="multipart/form-data">
            <p>Select image to upload:</p>
            <input type="file" name="imageToUpload" id="imageToUpload">
            <p>Enter name:</p>
            <input type="text" name="region" id="region">
            <input type="submit" value="CREATE" name="submit" class="shadow button-upload">
			<a href="albums.php">Go back to albums</a>
        </form>
	</div>
		

		
	</div>

	
</body>
</html>