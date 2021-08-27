<?php
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
?>

<!doctype html>
<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>File Management - JM Portfolio</title>
		
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
              <a class="nav-link btn btn-primary" href="add-post.php">Add A New Post</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary active" href="file-manager.php">File Manager</a>
		      <span class="sr-only">(current)</span>
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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
	  <h1 id="welcome" class="pageTitle">Welcome: <em><?php echo $data[ "user" ]; ?></em> </h1>
	  <hr>
	  <h2>CMS File Management</h2>
	  <hr>
	  <iframe  width="100%" height="550" frameborder="0"
	  src="../filemanager/dialog.php?type=0">
	  </iframe>
	  <hr>
		
	</div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jamie McDonald CMS</p>
      </div>
      <!-- /.container -->
    </footer>
		
<?php include ( "../includes/footer.php" ); ?>
		
<?php
		//check for any errors
		if( isset( $_GET[ "action" ] ) ) {
			switch( $_GET[ "action" ] )
			{
				case "added":
					echo '<p class="error">New post added successfully!</p>';
				break;
					
				case "edit":
					echo '<p class="error">Post edited succesfully.</p>';
				break;
			}
		}
?>

    </body>
</html>