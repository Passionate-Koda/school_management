<?php
include('db_config.php');
function authenticate(){
  if(!isset($_SESSION['admission_no']) && !isset($_SESSION['student_firstname'])){
    header("Location:student_login.php");
  }
}

  ?>
