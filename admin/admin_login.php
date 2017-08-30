<?php
session_start();

	include('db/db_config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOPHIL CITADEL | ADMIN</title>
</head>

<body>
	<h1>TOPHILL CITADEL</h1>

<?php
	if(array_key_exists("submit", $_POST)){
		$error = array();


	if(empty($_POST['admin'])){
		$error[] = "Enter Your Username";
	}else{
				$admin = mysqli_real_escape_string($db, $_POST['admin']);
		}



	if(empty($_POST['pword'])){
		$error[] = "enter Your Password";
	}else{
				$pword = md5(mysqli_real_escape_string($db, $_POST['pword']));
		}

		if(empty($error)){

			$check = mysqli_query($db, "SELECT * FROM admin WHERE admin='".$admin."' AND secure_password = '".$pword."' ") or die(mysqli_error($db));


						if(mysqli_num_rows($check) == 1){

						 $row = mysqli_fetch_array($check);

						 $_SESSION['admin_id'] = $row['admin_id'];
						 $_SESSION['admin'] = $row['admin'];

						 	header("Location:home.php");
						}else{


						 	$err= "Invalid Username And Password";
						 	header("Location:admin_login.php?err=$err");
						}

						}else{
								foreach($error as $null){
								echo "<p>" .$null. "</p>";
						}


		}

}
if(isset($_GET['err'])){
	$non = $_GET['err'];

   echo	"<p>".$non."</p>";

}


?>



<form action="" method="post">

    	<p> Admin Username: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
         <input type="text" name="admin" placeholder="Username" value=""/></p>


         <p> Password: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
         	<input type="password" name="pword" value=""/></p>

         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
         <input type="submit" name="submit" value="SUBMIT"/>




</form>



</body>
</html>
