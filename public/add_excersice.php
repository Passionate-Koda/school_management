<?php
  session_start();
  include('db_config.php');


  $classes = array('jss1'=>'JSS1',
                    'jss2'=>'JSS2',
                    'jss3'=>'JSS3',
                    'ss1'=>'SS1',
                    'ss2'=>'SS2',
                    'ss3'=>'SS3');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Exercises</title>
  </head>
  <?php

    if(isset ($_POST['add_submit'])){
      $update = mysqli_query($db, "INSERT INTO exercise VALUES()");
    }
   ?>
  <body>

    <fieldset>
      <legend> Add Test/Exercise</legend>


    <form class="form" action="index.html" method="post">

      <select name="course/subject" value="">
        <option value=""> Select Class</option>
        <?php foreach ($classes as $classes){ ?>
        <option value="<?php echo $classes ?>"><?php echo "$classes";?></option>
        <?php } ?>
      </select>

    <!--  <p>Phonenumber: <input type="text" name="phone" value="<?PHP // if(isset ($_POST['phone'])){echo $_POST['phone'];}         ?>"> </p> -->
      <input placeholder="Course/Subject" type="text" name="course/subject" value="">
      <input placeholder="Question" type="text" name="quest" value="">
      <input placeholder="Option_1" type="text" name="option_1" value="">
      <input placeholder="Option_2" type="text" name="option_2" value="">
      <input placeholder="Option_3" type="text" name="option_3" value="">
      <input placeholder="Option_4" type="text" name="option_4" value="">
      <input type="submit" name="add_submit" value="ADD">



      </fieldset>

    </form>

  </body>
</html>
