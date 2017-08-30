<?php
		include("db_config.php");
		function authenticate(){

		if(!isset($_SESSION['admin_id']) && !isset($_SESSION['admin'])){

			$auth = 'Log In First';
			header("Location:Home.php?err=$auth");


		}

	}
?>
