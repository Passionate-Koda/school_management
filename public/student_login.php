<?php
  session_start();
  include('db/db_config.php');

 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title><h1>HILLTOP CITADEL | STUDENTS</h1></title>
   </head>
   <body>
     <h1>HILLTOP CITADEL</h1>




     <form class="" action="" method="post">

       <p> Enter your Admission Number And Surname To Login</p>

       <p>
       <input placeholder="Admission Number"type="text" name="adm_no" value="">
       </p>
       <p>
       <input placeholder="Surname"type="text" name="student_sname" value="">
     </p>
     <p> <input type="submit" name="student_login" value="Login"></p>
     <?php
      if(isset ($_POST['student_login'])){
        $error = array();

        if(empty($_POST['adm_no'])){
          $error[]="Please enter a valid Admission";
          }else {
            $admission_no = mysqli_real_escape_string ($db, $_POST['adm_no']);

          }

          if(empty($_POST['student_sname'])){
            $error[]="Please enter a valid Admission";
            }else {
              $student_name = mysqli_real_escape_string ($db, $_POST['student_sname']);
            }

            $query=mysqli_query($db, "SELECT * FROM students WHERE admission_no='".$admission_no."' AND lastname='".$student_name."'") or die (mysqli_error($db));

              if(mysqli_num_rows($query)==1){
                $row=mysqli_fetch_array($query);
                  $_SESSION['student_firstname'] = $row['firstname'];
                  $_SESSION['admission_no'] =$row['admission_no'];
                  $_SESSION['class'] = $row['class'];
                  header("Location:student_home.php");
                } else {
                  $invalid="Invalid Reg No./Surname, Please enter correct details";
                  //echo "$invalid";
                  header("Location:student_login.php?invalid=$invalid");
                } foreach ($error as $err){
                  echo '<p class="error">*'.$err.'</p>';
                }
    }//main if
                if(isset($_GET['invalid'])){
                  $invalid=$_GET['invalid'];
                  echo '<p class="error">*'.$invalid."</p>";
                }

      ?>



     </form>
   </body>
 </html>
