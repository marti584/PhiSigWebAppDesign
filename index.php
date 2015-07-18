<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
    header('Location: landing-page.php');
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-error">'.
                          '<button type="button" class="close" data-dismiss="alert">×</button>'.
                          '<strong>Error!</strong> Login Failed.'.
                        '</div>';
        }

        if (login_check($mysqli) == true) {
          echo '<div class="alert">'.
                          '<button type="button" class="close" data-dismiss="alert">×</button>'.
                          '<strong>Warning!</strong> Currently logged '. $logged .' as '.htmlentities($_SESSION['username']).
                          '. Do you want to change user? <a href="includes/logout.php">Log out</a>.'.
                        '</div>';
        }
    ?>
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="includes/process_login.php" method="post" name="login_form">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" onclick="formhash(this.form, this.form.password);" value="Login">Sign In</button>
              <span class="pull-right"><a href="register.php">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>