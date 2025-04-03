<?php
session_start();


$action = filter_input(INPUT_POST, 'action');
if($action == NULL)
	$action = filter_input(INPUT_GET, 'action');


if($action == "Set Values")
{
		$username = filter_input(INPUT_POST, 'username');
		$_SESSION['username'] = $username;
	

		$email = filter_input(INPUT_POST, 'email');
		$_SESSION['email'] = $email;
		header("Location:session_example.php");
}
elseif($action == "forget")
{
		$_SESSION = array();
		session_destroy();
		header("Location:session_example.php");
}

elseif($action == "change") 
{
    	$title = "Change";
    	include("view/header.php");
    	$username = $_SESSION['username'];
    	$email = $_SESSION['email'];
    	include("view/changeform.php");
    	include("view/footer.php");
}


else
{
	
		$title="Welcome!";
		include("view/header.php");
		if(isset($_SESSION['username']) && isset($_SESSION['email']))
		{
			$email = $_SESSION['email'];
			$username = $_SESSION['username'];		
			include("view/home.php");
		}
		else
		{
			$username = "Guest";
			include("view/nameform.php");
		}
		include("view/footer.php");

}
