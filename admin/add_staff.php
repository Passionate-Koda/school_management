<?php
include("db/db_config.php");

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>









<?php

	if(isset($_POST['submit'])){
		$null = array();


	if(empty($_POST['staff'])){
		$null[] = "Enter Staff Name";
	}
		else{
				$Staff = mysqli_real_escape_string($db, $_POST['staff']);
		}

	if(empty($_POST['user'])){
		$null[] = "Enter Staff Username";

	}
		else{
				$user =  mysqli_real_escape_string($db, $_POST['user']);
		}

	if(empty($_POST['display'])){
		$null[] = "Enter Your Password";
	}
		else{
				$password = mysqli_real_escape_string($db, $_POST['display']);
		}
	if(empty($_POST['address'])){
		$null[] = "Enter Your Address";

	}
		else{
				$address = mysqli_real_escape_string($db, $_POST['address']);
		}

	if(empty($_POST['stats'])){
		$null[] = "Select Your Marital Status";

	}
		else{
				$stats = mysqli_real_escape_string($db, $_POST['stats']);

		}
	if(empty($_POST['salary'])){
		$null[] = "Enter Your Salary";
	}

		elseif(!is_numeric($_POST['salary'])){
			$null[] = "Enter Valid Salary Type";
		}

		else{
				$salary = mysqli_real_escape_string($db, $_POST['salary']);
		}

	if(empty($_POST['class'])){
		$null[] = "Select Your Class";
	}
		else{
				$class = mysqli_real_escape_string($db, $_POST['class']);

		}
		if(empty($error)){
		$annual_salary = ($salary*12);

		$insert = mysqli_query($db, "INSERT INTO staff VALUES(NULL,
			 '".$Staff."',
			 '".$user."',
			  '".$password."',
								'".md5($password)."',
								'".$address."', '".$stats."','".$salary."','".$annual_salary."','".$class."')") or die(mysqli_error($db));
					$message = "Field Successfully Entered";
					header("Location:Add_staff.php?msg = $message");
		}
			else{
					foreach($null as $null){
						echo "<p><em>". $null. "</em></p>";

				}
			}
	}

?>

<form action="" method="post">
	<p> STAFF NAME:
    <input type="text" name="staff" placeholder="Staff Name" value=""/></p>

    <p> STAFF USERNAME:
    <input type="text" name="user" placeholder="Username" value=""/></p>

    <p> PASSWORD:
    <input type="password" name="display" value=""/></p>

    <p> STAFF ADDRESS:</p>
    <textarea name="address" cols="20" rows="7"></textarea>

    <p> MARITAL STATUS:
    <input type="radio" name="stats" value="MARRIED"/>MARRIED
    <input type="radio" name="stats" value="DIVORCED"/>DIVORCED
    <input type="radio" name="stats" value="SINGLE"/>SINGLE</p>

    <p> SALARY:
    <input type="text" name="salary" value=""/></p>

    <p> CLASS:
    <input type="checkbox" name="class" value="JSS1"/>JSS1
    <input type="checkbox" name="class" value="JSS"/>JSS2
    <input type="checkbox" name="class" value="JSS3"/>JSS3</p>
    <input type="submit" name="submit" value="SUBMIT"/>


</form>


<?php

	$view = mysqli_query($db, "SELECT * FROM staff") or die(mysqli_error($db));
?>
	<table border="1">
    <tr>

    		<th>STAFF ID</th><th>STAFF NAME</th><th>STAFF USERNAME</th><th>PASSWORD</th>
            <th>SECURE_PASSWORD</th><th>STAFF ADDRESS</th><th>MARITAL STATUS</th><th>SALARY</th><th>ANNUAL SALARY</th>
            <th>CLASS</th>

    </tr>
  <tr>
<?php while($bring = mysqli_fetch_array($view)){

?>
<td> <?php echo $bring['staff_id']?> </td>
<td> <?php echo $bring['staff_name']?></td>
<td> <?php echo $bring['staff_username']?></td>
<td> <?php echo $bring['password']?></td>
<td> <?php echo $bring['secure_password']?></td>
<td> <?php echo $bring['staff_address']?></td>
<td> <?php echo $bring['marital_status']?></td>
<td> <?php echo $bring['salary']?></td>
<td> <?php echo $bring['annual_salary']?></td>
<td> <?php echo $bring['class']?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
