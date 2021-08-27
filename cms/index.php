<?php
	include( "../includes/class.functions.php");

	$fn = new Functions( $db );
	$data = $fn->alreadyLoggedIn();
	$fn->login();
?>

<!doctype html>
<html>

    <head>
        <title>Login to Portfolio</title>
		<?php include ( "../includes/header.php" ); ?>
    </head>

        <div class="container">
            <h1>Please login below</h1>
			<hr>
            <div id="login">
                <h2>Login Form</h2>
                <hr/>
                <form style="margin: 0 auto; width: 300px" action="" method="post">
                    <h4>Username :</h4>
                    	<h3><input style="width:100%" type="text" name="username" id="name" placeholder="Username"/></h3>
					<br /><br />
                    <h4>Password :</h4>
                    	<h3><input style="width: 100%"  type="password" name="password" id="password" placeholder="Password"/></h3>
					<br /><br />
                    <input style="width: 100%" class="btn btn-primary" type="submit" value=" Login " name="submit"/><br />
                    <span style="color: white;"><?php echo $error; ?></span>
                </form>
				<hr>
                <a class="btn btn-primary" href="../">Back to site</a>
            </div>
        </div>
	
	    <!-- Footer -->
    <footer class="py-5 bg-dark">
	  <!-- footer .container begins -->
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jamie McDonald CMS</p>
      </div>
    </footer><!-- footer .container ends -->
	</body>
</html>