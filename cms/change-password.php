<?php
	include( "../includes/class.functions.php");

	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
	$fn->changePassword();
?>

<!doctype html>
<html>

    <head>
        <title>Change your password</title>
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
              <a class="nav-link btn btn-primary" href="file-manager.php">File Manager</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary active" href="register.php">Register User</a>
				<span class="sr-only">(current)</span>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- End of Navigation -->

        <div class="container">
			<hr>
            <div id="changePass">
                <h2>Change Your Password</h2>
                <hr/>
				
<?php
		//check for any errors
		if( isset( $_GET[ "action" ] ) ) {
			switch( $_GET[ "action" ] )
			{
				case "changed":
					echo '<p class="error">Password changed successfully!</p>';
				break;
			}
		}
?>				
                <form style="margin: 0 auto; width: 300px" action="" method="post">
              		<h4>New Password :</h4>
                    	<h3><input style="width: 100%"  type="password" name="password" id="password" placeholder="Password"/></h3>
					<br /><br />
                    <h4>Confirm Password :</h4>
                    	<h3><input style="width: 100%"  type="password" name="passwordConf" id="passwordConf" placeholder="Password"/></h3>
					<br /><br />
                    <input style="width: 100%" class="btn btn-primary" type="submit" value=" Change Password " name="submit"/><br />
                    <span style="color:white"><?php echo $error; ?></span>
					<span style="color:white"><?php echo $e; ?></span>
                </form>
				<hr>
                
            </div><!-- /changePass -->
        </div><!-- /container -->
	
	    <!-- Footer -->
    <footer class="py-5 bg-dark">
	  <!-- footer .container begins -->
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jamie McDonald CMS</p>
      </div>
    </footer><!-- footer .container ends -->
		
		<?php include ( "../includes/header.php" ); ?>
	</body>
</html>