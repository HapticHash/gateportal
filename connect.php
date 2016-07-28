<?php

	$con = mysqli_connect("localhost","root","",'classroom');
	if(mysqli_connect_errno())
	{
		echo "Error occured while connecting with database".mysqli_connect_errno();	
	}

session_start();
function logged_in()
{
	if(isset($_SESSION['email']) || isset($_COOKIE['email']))
	{
		return true;
	}
	else
	{
		return false;
	}
	
	
	}

?>