<?php 
session_start();
include('header2.php');
include_once("dbconnect.php");
?>
<title>property website</title>
<script type="text/javascript" src="script/ajax.js"></script>


<div class="container">
	<h2>Welcome to Real Estate E-Commerce</h2>	
		
		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"> User Login</a></li>
				<li><a href="register.php">User Sign Up</a></li>
				<li><a href="login2/login.php"> Admin Login</a></li>
				<li><a href="login2/register.php">Admin Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
		
		
		
		<div style="margin:50px 0px 0px 0px;">
			<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="/login" title="">Back to Login Page</a>			
		</div>	
</div>	
<?php include('footer.php');?> 