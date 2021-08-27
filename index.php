<?php

	include( "./includes/class.functions.php");

	$fn = new Functions( $db );
	$page = home;
	$pageViews = $fn->pageViews($page);
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="I am a Digital Media graduate with experience in web and graphic design. Here is some of my work.">
    <meta name="author" content="">

    <title>Jamie McDonald Portfolio</title>

    <?php include ( "includes/header.php" ); ?>

  </head>

  <body>

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
              <a class="nav-link btn btn-primary active" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="about.php">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="portfolio.php">Portfolio</a>
            </li>
			  
			<li class="nav-item">
				<form id="searchForm" action="search.php" method="POST">
					<input class="btn btn-primary" type="text" name="search" id="search" placeholder="Search term" value="<?php echo $searchTerm; ?>" />
					<button class="btn btn-primary" id="searchButton" name="searchButton">Search</button>
				</form>
             </li>	
          </ul>
        </div>
      </div>
    </nav> <!-- Navigation ends -->

    <!-- Page Content -->
    <div class="container">


      <!-- Page Heading -->
      <h1 class="pageTitle">Recent Work</h1>
	  <p>Here are my most recent projects! </p>
	  <hr>
<?php

			try {
				$recentPosts = $fn->fetchRecentPosts();
				while( $row = $recentPosts->fetch() ) {
?>
      <div class="row">
        <div class="col-md-7">
          <a href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">
            <img width="480" height="320" class="img-fluid rounded mb-3 mb-md-0 pImg" src="./cms/uploads/header_images/<?php echo $row[ "header_image" ]; ?>" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <a href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>"><h3><?php echo $row[ "post_Title" ]; ?></h3></a>
          <div class="postDescription"><?php echo $row[ "post_Desc" ]; ?></div>
          <a class="btn btn-primary viewButton" href="./view-post.php?id=<?php echo $row[ "post_ID" ]; ?>">See more...</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>
		
		<?php
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		?>

        

      <!-- View All Projects -->
	
		<a class="btn btn-primary viewAllButton" href="portfolio.php">
		<h4 class="viewAllButtonText">
			View All Projects
		</h4>
		</a>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Jamie McDonald Portfolio - <?php print_r($pageViews); ?></p>
      </div>
      <!-- /.container -->
    </footer>

<?php
	  include ( "./includes/footer.php" );
	  $fn->updateViews($page);
?>

  </body>

</html>
