<?php

	include( "../includes/class.functions.php");

	$fn = new Functions( $db );

	$data = $fn->checkLoggedIn();

	$fn->uploadPI();

?>

<!doctype html>

<html>

    <head>

        <title>Admin - View Portfolio</title>

        <?php include ( "../includes/header.php" ); ?>	
		
		<link rel="stylesheet" type="text/css" href="../style.css">

    </head>

    <body>

        <div id="bar">

            <strong id="welcome">Welcome: <em><?php echo $data[ "user" ]; ?></em></strong>
			
			<strong id="logoutButton" style="margin-left:10px;"><a href="admin.php">Back</a></strong>
			
            <strong id="logoutButton" style="margin-left:10px;"><a href="logout.php">Log Out</a></strong>
			
			<strong id="logoutButton"><a href="add-post.php">Add Post</a></strong>
			
			<strong id="logoutButton"><a href="view-posts.php">View Posts</a></strong>		
			
			<strong id="logoutButton"><a href="view-portfolio.php">View Portfolio</a></strong>	

        </div>
		
		
		
		<div id="wrapper">
			
			<h2>View Portfolio</h2>
			
			<h3>Upload Portfolio Image</h3>

			<form name="upload-pi" id="upload-pi" enctype="multipart/form-data" action="" method="post">
			
				<input type="file" multiple name="images[]" accept="image/*" /> <br/><br/>
				
				<button type="submit" name="upload-pi-button" id="upload-pi-button" alt="Upload Pictures" >Upload</button>
 			
			</form>
		
		</div>
			
    </body>

</html>