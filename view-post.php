<?php

	include( "includes/class.functions.php");
	$fn = new Functions( $db );
	$postID = $_GET[ "id" ];
	$post = $fn->fetchSinglePost( $postID );
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $post[ "title" ]; ?></title>
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
            <li class="nav-item active">
              <a class="nav-link btn btn-primary" href="index.php">Home
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
			</li>
				</form>
          </ul>
        </div>
      </div>
    </nav> <!-- Navigation ends -->
	
	<!-- Page Content -->
    <div class="container">
		<!-- Page Heading -->
		<h1 class="pageTitle"><?php echo $post[ "title" ]; ?></h1>
		<!--<p>Posted on: <?php echo date( "jS M Y H:i:s", strtotime( $post[ "date" ] ) ); ?></p>-->
		<p><?php echo $post[ "description" ]; ?></p>
		<p><?php echo $post[ "content" ]; ?></p>
	</div><!-- Page Content ends -->
</div><!-- wrapper ends -->
	
	<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Jamie McDonald Portfolio - <a href="cms/index.php">Admin</a></p>
      </div>
	</footer>
      <!-- footer container ends -->
    
	
	<?php include ( "./includes/footer.php" ); ?>
</body>
</html>
