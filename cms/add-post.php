<?php 
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
	$fn->addPost();
?>

<!doctype html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title>Admin - Add Post</title>
	  <?php include ( "../includes/header.php" ); ?>
	</head>
	<body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container width">
        <a class="navbar-brand" href="admin.php">CMS Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="admin.php">Dashboard</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="edit-about.php">Edit About Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="view-posts.php">View All Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="view-recent-posts.php">View Home Posts</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary active" href="add-post.php">Add A New Post</a>
			  <span class="sr-only">(current)</span>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="file-manager.php">File Manager</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="register.php">Register User</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- End of Navigation -->
<?php
		//check for any errors
		if( isset( $error ) ) {
			foreach( $error as $error ) {
				echo '<p class="error">' . $error . '</p>';
			}
		}
?>
		<div class="container">
			<h1 class="pageTitle">Add Post</h1>
			<hr>
			
			<form name="upload-post" id="upload-post"  enctype="multipart/form-data" action="" method="POST">

				<h4><label>Title</label><br />
				<input type="text" name="postTitle" value="<?php if( isset( $error ) ) { echo $_POST["postTitle"]; } ?>"><h4>
				<hr>
				<h4><label>Description</label><br />
				<textarea name="postDesc" cols="60" rows="10" id=postDesc><?php if( isset( $error ) ) { echo $_POST["postDesc"]; } ?></textarea></h4>
				<hr>
				<h4><label>Content</label><br />
				<textarea name="postCont" cols="60" rows="10" id="postCont"><?php if( isset( $error ) ) { echo $_POST['postCont']; } ?></textarea></h4>
				<hr>
				<h4><label>Upload Header Image</label></h4>  
				
					<input class="btn btn-primary" type="file" name="images[]" accept="image/*"/></br></br>
				<hr>
				<input class="btn btn-primary edit" type="submit" name="submit" value="Submit">
			</form>
			
		</div>
		</br>
		<!-- Footer -->
	
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jamie McDonald CMS</p>
      </div>
      <!-- /.container -->
    </footer>
		
		<script src="../includes/contentEditor.json"></script>
		<?php include ( "../includes/footer.php" ); ?>
	</body>
</html>
