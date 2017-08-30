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
 if(isset($_GET['subject_id']) && isset($_GET['subject_name'])){
   $subjectid = $_GET['subject_id'];
   $subjectnm = $_GET['subject_name'];
 }else{
   $subjectnm = "";
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



$getsubject = mysqli_query($db, "SELECT * FROM subjects");
while($ans = mysqli_fetch_array($getsubject)){
  extract($ans);

?>
<li><a href="student_exercise.php?subject_id=<?php echo $subject_id ?>&subject_name=<?php echo $subject; ?>"><?php echo "$subject"; ?> </a></li>

  <?php
}


echo "Dear $fname your class is $class" ;

echo "<h1>$subjectnm</h1>";
//if($sujectnm = "english"){
?>
<?php
$getit = mysqli_query($db, "SELECT * FROM test WHERE class= '".$class."' AND subject ='".$subjectnm."' ")or die (mysqli_error($db));

?>

<table>

  <tr>
    <?php while($row = mysqli_fetch_array($getit)){
      extract($row);
       ?>

       <td><?php ?></td>
<td><?php echo $question ?></td>
<td><?php echo "(a)".$a ?></td>
<td><?php echo "(b)".$b ?></td>
<td><?php echo "(c)".$c ?></td>
<td><?php echo "(d)".$d ?></td>

  </tr>

  <?php } ?>
</table>


<form class="" action="" method="post">
  <p>1.(a)<input type="radio" name="answer1" value="a"> (b)<input type="radio" name="answer1" value="b">(c)<input type="radio" name="answer1" value="c">(d)<input type="radio" name="answer1" value="d"></p>
  <p>2.(a)<input type="radio" name="answer2" value="a"> (b)<input type="radio" name="answer2" value="b">(c)<input type="radio" name="answer2" value="c">(d)<input type="radio" name="answer2" value="d"></p>
  <p>3.(a)<input type="radio" name="answer3" value="a"> (b)<input type="radio" name="answer3" value="b">(c)<input type="radio" name="answer3" value="c">(d)<input type="radio" name="answer3" value="d"></p>
  <p>4.(a)<input type="radio" name="answer4" value="a"> (b)<input type="radio" name="answer4" value="b">(c)<input type="radio" name="answer4" value="c">(d)<input type="radio" name="answer4" value="d"></p>
  <p>5.(a)<input type="radio" name="answer5" value="a"> (b)<input type="radio" name="answer5" value="b">(c)<input type="radio" name="answer5" value="c">(d)<input type="radio" name="answer5" value="d"></p>
  <p>6.(a)<input type="radio" name="answer6" value="a"> (b)<input type="radio" name="answer6" value="b">(c)<input type="radio" name="answer6" value="c">(d)<input type="radio" name="answer6" value="d"></p>
  <p>7.(a)<input type="radio" name="answer7" value="a"> (b)<input type="radio" name="answer7" value="b">(c)<input type="radio" name="answer7" value="c">(d)<input type="radio" name="answer7" value="d"></p>
  <p>8.(a)<input type="radio" name="answer8" value="a"> (b)<input type="radio" name="answer8" value="b">(c)<input type="radio" name="answer8" value="c">(d)<input type="radio" name="answer8" value="d"></p>
  <p>9.(a)<input type="radio" name="answer9" value="a"> (b)<input type="radio" name="answer9" value="b">(c)<input type="radio" name="answer9" value="c">(d)<input type="radio" name="answer9" value="d"></p>
  <p>10.(a)<input type="radio" name="answer10" value="a"> (b)<input type="radio" name="answer10" value="b">(c)<input type="radio" name="answer10" value="c">(d)<input type="radio" name="answer10" value="d"></p>
</form>





<?php //} ?>
