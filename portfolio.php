<?php

	include( "includes/class.functions.php");
	$fn = new Functions( $db );

	$pageNo = $_GET[ "page" ];

	if($pageNo === NULL) {
		$pageNo = 1;
	}
	$page = portfolio;
	$pageViews = $fn->pageViews($page);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jamie McDonald - Portfolio</title>

    <?php include ( "includes/header.php" ); ?>

  </head>

  <body>
<div class="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Jamie McDonald</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="index.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="about.php">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary active" href="portfolio.php">Portfolio</a>
			  <span class="sr-only">(current)</span>
            </li>
			  
			<li class="nav-item">
				<form id="searchForm" action="search.php" method="POST">
					<input class="btn btn-primary" type="text" name="search" id="search" placeholder="Search term" value="<?php echo $searchTerm; ?>" />
					<button class="btn btn-primary" id="searchButton" name="searchButton">Search</button>
			</li>
				</form>
          </ul>
        </div>
      </div>
    </nav> <!-- Navigation ends -->

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
		<h1 class="my-4">My work </br>
      </h1>
	


      <div class="row">
<?php

			try {
				$showPost = $fn->allPostsPaginated($pageNo);
				while( $row = $showPost->fetch() ) {
					
?>		  
		  
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
			  <div class="card-image">
            <a href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>"><img class="card-img-top" src="./cms/uploads/header_images/<?php echo $row[ "header_image" ]; ?>" alt=""></a></div>
            <div class="card-body">
				<a href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">
              <h4 class="card-title">
                <?php echo $row[ "post_Title" ]; ?>
              </h4>
				</a>
              <p class="card-text"><?php echo $row[ "post_Desc" ]; ?></p></br></br>
				<a class="btn btn-primary viewButton" href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">View Project</a>
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
      <!-- /.row -->


      <!-- Pagination -->
      <ul class="pagination justify-content-center">
		  
<?php
		  try {
				if( $pageNo -1 > 0) {
?>
		  <!-- Previous page -->
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./portfolio.php?page=<?php echo $pageNo - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./portfolio.php?page=<?php echo $pageNo - 1; ?>"><?php echo $pageNo - 1; ?></a>
        </li>
<?php
			}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
 ?>
		  <!-- Current page -->
        <li class="page-item active">
          <p class="page-link disabled btn btn-primary"><?php echo $pageNo; ?></p>
        </li>
		  
<?php

			try {
				$morePosts = $fn->numberOfPages($pageNo);
				$count = 0;
				while($morePosts = $morePosts ->fetch()) {
					
?>	
		  <!-- Next page -->
        <li class="page-item ">
          <a class="page-link btn btn-primary" href="./portfolio.php?page=<?php echo $pageNo + 1; ?>"><?php echo $pageNo + 1; ?></a>
        </li>
        <li class="page-item">
          <a class="page-link btn btn-primary" href="./portfolio.php?page=<?php echo $pageNo + 1; ?>" aria-label="Next">
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
    <!-- /.container -->
</div><!-- Wrapper ends -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Jamie McDonald Portfolio - <?php print_r($pageViews); ?> views</p>
      </div>
      <!-- /.container -->
    </footer>

    <?php  
		include ("./includes/footer.php");
		$fn->updateViews($page);
	?>
	

  </body>

</html>
