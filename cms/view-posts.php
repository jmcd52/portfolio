<?php
	include( "../includes/class.functions.php");
	$fn = new Functions( $db );
	$data = $fn->checkLoggedIn();

	$pageNo = $_GET[ "page" ];

	if($pageNo === NULL) {
		$pageNo = 1;
	}

	$delete = $fn->deletePost( $_POST[ "postIdToDelete" ] );
?>

<!doctype html>
<html>
    <head>
        <title>Admin - View Posts</title>
		
        <?php include ( "../includes/header.php" ); ?>	
    </head>
    <body>
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
              <a class="nav-link btn btn-primary" href="admin.php">Dashboard</a>
            </li>
			<li class="nav-item">
              <a class="nav-link btn btn-primary" href="edit-about.php">Edit About Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary active" href="view-posts.php">View All Posts</a>
			  <span class="sr-only">(current)</span>
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
		

		<div class="container">
      <!-- Page Heading -->
      <h2 class="pageTitle" >Viewing all posts:</h2>
		<hr>
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
			<form class="cmsSearch" id="searchForm" action="search.php" method="POST">
				<input class="btn btn-primary" type="text" name="search" id="search" placeholder="Search posts..." value="<?php echo $searchTerm; ?>" />
				<button class="btn btn-primary" id="searchButton" name="searchButton">Search</button>
	  		</form>
		<hr>
			<div class="row">
<?php
			try {
				$allPosts = $fn->allPostsPaginated($pageNo);
				while( $row = $allPosts->fetch() ) {
?>				
				
				
				
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="../view-post.php?id=<?php echo $row[ "post_ID" ]; ?>"><img width="400" height="225" class="card-img-top" src="./uploads/header_images/<?php echo $row[ "header_image" ]; ?>" alt=""></a>
            <div class="card-body">
				<a href="../view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">
              <h4 class="card-title">
                <?php echo $row[ "post_Title" ]; ?>
              </h4>
				</a>
				<p class="card-text"><?php echo $row[ "post_Desc" ]; ?></br></br><p><?php echo date( "jS M Y H:i:s", strtotime( $row[ "post_Date" ] ) ); ?></p></p>
				<form class="edit" action="edit-post.php?id=<?php echo $row[ "post_ID" ]; ?>" method="POST">
							<button id="editPostButton" name="editPostButton" class="btn btn-primary edit">Edit</button>
			</form>	
			<form class="edit" action="" method="POST">
							<input type="hidden" name="postIdToDelete" value="<?php echo $row[ "post_ID" ]; ?>"/>
							<button id="deletePostButton" name="deletePostButton" class="btn btn-primary delete">Delete</button>
			</form>
            </div>
          </div>
        </div>

<?php
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
?>
		</div>
	
	<!-- Pagination -->
      <ul class="pagination justify-content-center">
		  
<?php
		  try {
				if( $pageNo -1 > 0) {
?>
		  <!-- Previous page -->
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./view-posts.php?page=<?php echo $pageNo - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./view-posts.php?page=<?php echo $pageNo - 1; ?>"><?php echo $pageNo - 1; ?></a>
        </li>
<?php
			}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
 ?>
		  <!-- Current page -->
        <li class="page-item active">
          <a class="page-link btn btn-primary" href="#"><?php echo $pageNo; ?></a>
        </li>
		  
<?php

			try {
				$morePosts = $fn->numberOfPages($pageNo);
				$count = 0;
				while($morePosts = $morePosts ->fetch()) {
					
?>	
		  <!-- Next page -->
        <li class="page-item ">
          <a class="page-link btn btn-primary" href="./view-posts.php?page=<?php echo $pageNo + 1; ?>"><?php echo $pageNo + 1; ?></a>
        </li>
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./view-posts.php?page=<?php echo $pageNo + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
		  
<?php
					
				break;}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
?>	
      </ul>
	<hr>
	</div>
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