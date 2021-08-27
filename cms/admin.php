<?php
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
?>

<!doctype html>
<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin - JM Portfolio</title>
		
		<?php include ( "../includes/header.php" ); ?>
    </head>
    <body>
		
<!-- body wrapper -->
<div class="wrapper">
	
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
              <a class="nav-link btn btn-primary active" href="admin.php">Dashboard</a>
			<span class="sr-only">(current)</span>
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

    <!-- Page Content begins -->
    <div class="container">

      <!-- Page Heading -->
	  <h1 id="welcome" class="pageTitle">Welcome: <em><?php echo $data[ "user" ]; ?></em> </h1>
	  <hr>
	  <h2>CMS Control Panel</h2>
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
	<hr>
		<!-- row 1 -->
		<div class="row">
			
		<!-- row items -->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="../index.php"><img class="card-img-top dashboard-icon" src="../images/icons/live_site.png" alt=""></a>
			<a href="../index.php" class="btn btn-primary dashboard-button">View Live Site</a>
			</div>
        </div>
			
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./edit-about.php"><img class="card-img-top dashboard-icon" src="../images/icons/edit_about.png" alt=""></a>
			<a href="edit-about.php" class="btn btn-primary dashboard-button">Edit About Page</a>
			</div>
        </div>

		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./file-manager.php"><img class="card-img-top dashboard-icon" src="../images/icons/file_manager.png" alt=""></a>
			<a href="./file-manager.php" class="btn btn-primary dashboard-button">File Management</a>
			</div>
        </div><!-- row items -->
        </div><!-- row 1 ends -->

		<!-- row 2 -->
		<div class="row">
			
		<!-- row items -->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./view-recent-posts.php"><img class="card-img-top dashboard-icon" src="../images/icons/view_recent.png" alt=""></a>
			<a href="./view-recent-posts.php" class="btn btn-primary dashboard-button">View Recent Posts</a>
			</div>
        </div>
			
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./add-post.php"><img class="card-img-top dashboard-icon" src="../images/icons/add_post.png" alt=""></a>
			<a href="./add-post.php" class="btn btn-primary dashboard-button">Add A New Post</a>
			</div>
        </div>

		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./view-posts.php"><img class="card-img-top dashboard-icon" src="../images/icons/view_all.png" alt=""></a>
			<a href="./view-posts.php" class="btn btn-primary dashboard-button">View All Posts</a>
			</div>
        </div><!-- row items -->
        </div><!-- row 2 ends -->
		
		<!-- row 3 -->
		<div class="row">
			
		<!-- row items -->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./register.php"><img class="card-img-top dashboard-icon" src="../images/icons/add_user.png" alt=""></a>
			<a href="./register.php" class="btn btn-primary dashboard-button">Register User</a>
			</div>
        </div>
			
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="./change-password.php"><img class="card-img-top dashboard-icon" src="../images/icons/change_pass.png" alt=""></a>
			<a href="./change-password.php" class="btn btn-primary dashboard-button">Change Password</a>
			</div>
        </div>

		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card">
            <a href="logout.php"><img class="card-img-top dashboard-icon" src="../images/icons/logout.png" alt=""></a>
			<a href="logout.php" class="btn btn-primary dashboard-button">Logout</a>
			</div>
        </div><!-- row items -->
        </div><!-- row 3 ends -->

	<hr>
	</div><!-- /Page Content and its .container ends -->
	
	
	
</div><!-- body wrapper ends -->
		
    <!-- Footer -->
    <footer class="py-5 bg-dark">
	  <!-- footer .container begins -->
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jamie McDonald CMS</p>
      </div>
    </footer><!-- footer .container ends -->
		
<?php include ( "../includes/footer.php" ); ?>
		


    </body>
</html>