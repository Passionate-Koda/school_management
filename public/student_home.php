<?php
  session_start();
  include('db/authentication.php');
  authenticate();


   $fname= $_SESSION['student_firstname'];
   $adm_no=$_SESSION['admission_no'];
   $class= $_SESSION['class'];



$good = array( 1=>'View Timetable', 2=>'Take Test', 3=>'Course Registration');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
HILLTOP CITADEL| STUDENTS
    </title>
  </head>
  <body>
<h1>HILLTOP CITADEL</h1>
    <a href="">Home</a>

    <?php foreach( $good as $null_id=>$null_name){?>

      <li><a href="student_platform.php?null_id=<?php echo $null_id ?>&null_name=<?php echo $null_name; ?>"><?php echo "$null_name"; ?> </a></li>
<?php }?>
    <!--<a href="time_table.php">View Timetable</a>
    <a href="">View Course Form</a>
    <a href="">Course Registration</a>-->
    <a href="logout.php">Logout</a>
    <hr>
    Welcome <?php echo " <strong> $fname </strong> , Your Reg No. is $adm_no. Your Class is $class" ;  ?>




  </body>
</html>
