<?php 
session_start();
include('header.php');
include_once("dbconnect.php");
?>
<title>property :  Login and Registration for Admin </title>
<script type="text/javascript" src="script/ajax.js"></script>
<?php include('container.php');?>

<div class="container">
	<h2>You are logged in as Admin</h2>	
		
		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
		
		
		
		<div style="margin:50px 0px 0px 0px;">
			<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="https://fybwork.blogspot.com/" title="">CSE370 Project</a>			
		</div>	
</div>	
<?php include('footer.php');?> 