<?php 
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
	$fn->editPost();
	$post = $fn->fetchSinglePost( $_GET[ "id" ] );
?>

<!doctype html>
<html lang="en">
	<head>

	  <title>Admin - Edit Post</title>
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
			<h1 class="pageTitle">Edit Post</h1>
			<hr>

			<form action="" method="POST">
				<input type="hidden" name="postID" value="<?php echo $_GET[ "id" ]; ?>"/>
				<h4><label>Title</label><br>
				<input type="text" name="postTitle" value="<?php if( !isset( $error ) ) { echo $post["title"]; } ?>">
				</h4>
				<hr>
				<h4><label>Description</label></h4>
				<textarea name="postDesc" cols="60" rows="10"><?php if( !isset( $error ) ) { echo $post["description"]; } ?></textarea>
				<hr>
				<h4><label>Content</label></h4>
				<textarea name="postCont" cols="60" rows="10"><?php if( !isset( $error ) ) { echo $post["content"]; } ?>
				</textarea>
				<hr>
				<br>
				<p><input class="btn btn-primary edit" type="submit" name="submit" value="Edit Post"></p>
			</form>
		</div>
		<br>
		
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
