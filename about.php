<?php
	include( "includes/class.functions.php");
	$fn = new Functions( $db );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jamie McDonald - About</title>

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
              <a class="nav-link btn btn-primary active" href="about.php">About Me</a>
				<span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="portfolio.php">Portfolio</a>
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
      <h1 class="pageTitle">About Me</h1>
	
		
		
<!-- Page Content -->
<?php

			try {

				$about = $fn->fetchAbout();

				while( $row = $about->fetch() ) {

?>
	  <div>
		<?php echo $row[ "text" ]; ?>
	  </div>
		
<?php

				}

			} catch ( PDOException $e ) {

				echo $e->getMessage();

			}

?>
		
	  
</div><!-- /wrapper -->
	
</div><!-- /container -->
	
<div class="container">
	<hr>
    <h3 class="section-title">Live Instagram Portfolio</h3>
    <div id="instafeed" class="row"></div><!-- .row -->
  </div><!-- /container -->	  
	  
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Jamie McDonald Portfolio - <a href="cms/index.php">Admin</a></p>
      </div>
      <!-- /.container -->
    </footer>

<?php include ( "./includes/footer.php" ); ?>
<!-- instafeed base code -->
<script src="vendor/instafeed.min.js"></script>
<!-- my instafeed config -->
<script src="includes/myinstafeed.js"></script>

  </body>

</html>
