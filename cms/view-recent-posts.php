<?php
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();
	$delete = $fn->deletePost( $_POST[ "postIdToDelete" ] );
?>

<!doctype html>
<html>
    <head>
        <title>Admin - View Recent Posts</title>
		
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
              <a class="nav-link btn btn-primary active" href="view-recent-posts.php">View Home Posts</a>
			  <span class="sr-only">(current)</span>
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
		
<?php
		//check for any errors
		if( isset( $_GET[ "action" ] ) ) {
			switch( $_GET[ "action" ] )
			{
				case "delete":
					echo '<p class="error">Post successfully deleted.</p>';
				break;
			}
		}
?>
		<div class="container">
			<h1 id="welcome" class="pageTitle">Welcome: <em><?php echo $data[ "user" ]; ?></em> </h1>
			<hr>
			<h2>Viewing frontpage posts:</h2>
			
<?php
			try {
				$recentPosts = $fn->fetchRecentPosts();
				while( $row = $recentPosts->fetch() ) {
?>
			
			<hr>
			<div class="row">
        <div class="col-md-7">
          <a href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">
			  
			
            <img class="img-fluid rounded mb-3 mb-md-0 pImg" src="./uploads/header_images/<?php echo $row[ "header_image" ]; ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
			<a href="../view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">
 		  <h3><?php echo $row[ "post_Title" ]; ?></h3>
			</a>
          <p><?php echo $row[ "post_Desc" ]; ?></p>
		  <p><?php echo date( "jS M Y H:i:s", strtotime( $row[ "post_Date" ] ) ); ?></p>
			<form class="edit" action="edit-post.php?id=<?php echo $row[ "post_ID" ]; ?>" method="POST">
							<button id="editPostButton" name="editPostButton" class="btn btn-primary edit">Edit</button>
			</form>	
			<form class="edit" action="" method="POST">
							<input type="hidden" name="postIdToDelete" value="<?php echo $row[ "post_ID" ]; ?>"/>
							<button id="deletePostButton" name="deletePostButton" class="btn btn-primary delete">Delete</button>
			</form>
        </div>
      </div>

      
				
<?php
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
?>
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
    </body>
</html>