<?php
  session_start();
  include('db/authentication.php');
  authenticate();

   $fname= $_SESSION['student_firstname'];
   $adm_no =$_SESSION['admission_no'];
   $class = $_SESSION['class'];

$good = array( 1=>'View Timetable', 2=>'Take Test');


 if(isset($_GET['null_id']) && isset($_GET['null_name'])){
   $page_id = $_GET['null_id'];
   $page_name = $_GET['null_name'];
 }else{
   $page_name= "welcome";//so that page name it wont echo error when we set sub category
 }


    ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title><h1>HILLTOP CITADEL | STUDENTS</h1></title>
   </head>
   <body>
<h1>HILLTOP CITADEL</h1>
     <a href="student_home.php">Home</a>

     <?php foreach( $good as $null_id=>$null_name){?>

       <li><a href="student_platform.php?null_id=<?php echo $null_id ?>&null_name=<?php echo $null_name; ?>"><?php echo "$null_name"; ?> </a></li>
 <?php }

echo "<p>$page_name</p>";

if($page_name == "View Timetable"){//if u click view timetable it brings the expression of this conditions
?>
<h1>Time Table For The Session</h1>


<table border="1">


  <th>Course</th><th>Date</th><th>Time</th>

  <tr>
    <td>Computer Studies</td>
    <td>1/Jan/2017</td>
      <td>9am</td>
  </tr>
  <tr>
    <td>English Language</td>
    <td>1/Jan/2017</td>
      <td>12pm</td>
  </tr>
  <tr>
    <td>Mathematics</td>
    <td>1/Jan/2017</td>
      <td>3pm</td>
  </tr>
  <tr>
    <td>Agric</td>
    <td>3/Jan/2017</td>
      <td>9am</td>
  </tr>





</table>

  <?php
}else{ //since you are not viewing timetable. this expression within is for the other links
?>
<h3>Please take your test</h3>



     <form class="" action="" method="post">
       <input type="submit" name="submit" value="write paper">
     </form>
<?php if(isset($_POST['submit'])){

header("Location:student_exercise.php");

}


}
?>


   </body>
 </html>
