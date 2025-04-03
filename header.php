<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
   
</head>

<body>
<nav>
	<a href="session_example.php">Home</a> | 
	<a href="session_example.php?action=forget">Forget Me</a> 
	<?php if(isset($_SESSION['username']) && isset($_SESSION['email'])): ?>
		| <a href="session_example.php?action=change">Change Values</a>
	<?php endif; ?>
</nav>

