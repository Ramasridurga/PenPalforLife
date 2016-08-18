<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$tcode = trim($_POST['teacherCode']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($tcode,$email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PenPalforLife</title>
    
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
  
    <div class="container">
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">PenPalforLife</a>
				</div>
				<!-- Top Menu Items -->
			</nav>
			<?php 
			if(isset($_GET['inactive']))
			{
				?>
				<div class='alert alert-error'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>This Account is not activated,</strong> Please wait until the admin activates your account. 
				</div>
				<?php
			}
			?>
			<form class="form-signin" method="post">
			<?php
			if(isset($_GET['error']))
			{
				?>
				<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Login failed, Please enter correct details</strong> 
				</div>
				<?php
			}
			?>
			
				<h3 class="form-signin-heading">Sign In here</h3><hr />
				<input type="text" class="input-block-level form-control" placeholder="TeacherCode" name="teacherCode" required autofocus=""/>
				<input type="email" class="input-block-level form-control" placeholder="Email address" name="txtemail"/>
				<input type="password" class="input-block-level form-control" placeholder="Password" name="txtupass" required />
				
				<button class="btn  btn-primary btn-lg btn-block signin_submit" type="submit" name="btn-login">Sign in</button>
				<a href="fpass.php">Forgot your Password ? </a>
			
		  </form>
		</div>
    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>