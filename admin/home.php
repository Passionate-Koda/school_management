<?php

		session_start();
		include("db/authentication.php");
		authenticate();

		$admin_id = $_SESSION['admin_id'];
		$staff_name = $_SESSION['admin'];

		echo "<p><em>". $staff_name."</em></p>";

		$create = array( 1=>'Add Staff', 2=>'View Staff', 3=>'Add Student', 4=>'View Student', 5=> 'Add Payment', 6=>'View Payment' );

		if(isset($_GET['null_id']) && isset($_GET['null_name'])){
			$page_id = $_GET['null_id'];
			$page_name = $_GET['null_name'];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

        <a href="Home.php">Home</a>

<?php foreach( $create as $null_id=>$null_name){?>

<li><a href="admin_platform.php?null_id=<?php echo $null_id ?>&null_name=<?php echo $null_name; ?>"><?php echo "$null_name"; ?> </a></li>

<?php }?>


<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="logout.php">LOGOUT</a>
</body>
</html>
