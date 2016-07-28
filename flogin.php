<?php 
	
	include("connect.php");
	$error="";
	if(logged_in()){
        header("location:home.php");
        exit();
    }
	
if(isset($_POST['submit']))
{

	$email=$_POST['email'];
	$password=$_POST['password'];
	
		$result=mysqli_query($con,"SELECT * FROM `checkuser` WHERE uname='$email';");
		$retrivepassword=mysqli_fetch_assoc($result);
		echo $retrivepassword['pass']."=".($password);
		if(($password)!=$retrivepassword['pass'])
		{
			$error="Entered password is incorrect!";
		}
		else
		{
				$_SESSION['email']=$email;
				setcookie("email",$email,time()+3600000);	
				session_start();
                $_SESSION['myValue']=$email;
				header("location:select_subject.php");
		}
	
	
}

?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login Page</title>

	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	
	<link rel="stylesheet" href="flogin.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
   
	<div class="container">
        
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Welcome to <span>E-ASSIGNMENT</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
            <form method="post" action="index.php" enctype="multipart/form-data">
                 <div id="error"><?php echo $error; ?></div>
			<input type="text" placeholder="Username" name="email">
			<br/>
			<input type="password" placeholder="Password" name="password">
			<br/>
			<button type="submit" name="submit"><span> Sign in  </span> </button>
			<br/>
			<a href="#"><p class="small">Forgot your password?</p></a>   
            </form>
        </div>   </br> </br>
	</div> 
</body>


</html>