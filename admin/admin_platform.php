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
<title>TOPHILL CITADEL|ADMIN</title>
</head>

<body>

<h1>TOPHILL CITADEL</h1>



        <a href="Home.php">Home</a>

<?php foreach( $create as $null_id=>$null_name){?>

<li><a href="admin_platform.php?null_id=<?php echo $null_id ?>&null_name=<?php echo $null_name; ?>"><?php echo "$null_name"; ?> </a></li>

<?php }


	echo "<p> $page_name </p>";


  if ($page_name == "Add Staff" ) {?>
<h1>Staff Registration Platform</h1>

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
  }elseif($page_name == "View Staff"){

?>
<p>Staff Records </p>
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

  <?php
}elseif($page_name == "Add Student"){
?>
<h1>Student's Record</h1>
<form class="" action="" method="post">

<p>Please Enter Students Details</p>

<?php
if(isset($_POST['go'])){
$null = array();

if(empty($_POST['lname'])){
  $null[] = "Please Enter Students Lastname";
}else{
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
}

if(empty($_POST['fname'])){
$null []= "Please Enter Students Firstname";
}else{
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
}

if(empty($_POST['sclass'])){
  $null[] = "Please Enter Students Class";
}else{
  $sclass = mysqli_real_escape_string($db, $_POST['sclass']);
}

if(empty($_POST['dob'])){
  $null[] = "Please Enter Students Date of Birth";
}else{
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
}

if(empty($_POST['gender'])){
  $null[] = "Please Enter Students Gender";
}else{
  $sgender = mysqli_real_escape_string($db, $_POST['gender']);
}


if(empty($_POST['saddress'])){
  $null[] = "Please Enter Students Address";
}else{
  $saddress= mysqli_real_escape_string($db, $_POST['saddress']);
}


if(empty($_POST['so'])){
  $null[] = "Please Enter Students State of Origin";
}else{
  $so = mysqli_real_escape_string($db, $_POST['so']);
}

if(empty($_POST['lg'])){
  $null[] = "Please Enter Students LG";
}else{
  $lg = mysqli_real_escape_string($db, $_POST['lg']);
}

if(empty($_POST['scountry'])){
  $null[] = "Please Enter Students Nationality";
}else{
  $scountry = mysqli_real_escape_string($db, $_POST['scountry']);
}

if(empty($null)){

$put = mysqli_query($db, "INSERT INTO students
        VALUES(NULL,'".rand(1000,99999)."',
                    '".$lname."',
                    '".$fname."',
                    '".$sclass."',
                    '".$dob."',
                    '".$sgender."',
                    '".$saddress."',
                    '".$so."',
                    '".$lg."',
                    '".$scountry."')") or die(mysqli_error($db));

                    $done = "Student Successfully registered";
                    header("Location:admin_platform.php?null_id=3&null_name=Add%20Student&done=$done");
unset ($_POST['lname']);
unset ($_POST['fname']);
unset ($_POST['dob']);
unset ($_POST['saddress']);
unset ($_POST['lg']);


}else{
foreach($null as $nul){
  echo "<p>$nul</p>";
}//end of foreach
}
}

if(isset($_GET['done'])){
  $done = $_GET['done'];
  echo "<p>$done</p>";
}


 ?>
<form class="" action="" method="post">


<p>Lastname: <input type="text" name="lname" value="<?PHP  if(isset ($_POST['lname'])){echo $_POST['lname'];}         ?>"></p>
<p>Firstname: <input type="text" name="fname" value="<?PHP  if(isset ($_POST['fname'])){echo $_POST['fname'];}         ?>"></p>
<p>Clas: <input type="radio" name="sclass" value="JSS1">JSS1 <input type="radio" name="sclass" value="JSS2">JSS2 <input type="radio" name="sclass" value="JSS3"></p>
<p>Date of Birth: <input type="date" name="dob" value="<?PHP  if(isset ($_POST['dob'])){echo $_POST['dob'];}         ?>"></p>
<p>Gender: <input type="radio" name="gender" value="female">Female  <input type="radio" name="gender" value="male">Male</p>
<p>Address: <input type="text" name="saddress" value="<?PHP  if(isset ($_POST['saddress'])){echo $_POST['saddress'];}         ?>"></p>
<p>State Of Origin: </p>
<select name="so" id="select">
                <option>---Select State---</option>
                <option>ABUJA FCT</option>
                <option  value="AB">ABIA</option><option>ADAMAWA</option>
                <option value="AKB">AKWA IBOM</option>
                <option value="ANB">ANAMBRA</option>
                <option value="BCH">BAUCHI</option>
                <option value="BYS">BAYELSA</option>
                <option value="BEN">BENUE</option>
                <option value="BRN">BORNO</option>
                <option value="CRV">CROSS RIVER</option>
                <option value="DLT">DELTA</option>
                <option value="EBY">EBONYI</option>
                <option value="EDO">EDO</option>
                <option value="EKT">EKITI</option>
                <option value="ENU">ENUGU</option>
                <option value="GBE">GOMBE</option>
                <option value="IMO">IMO</option>
                <option value="JGW">JIGAWA</option>
                <option value="KDN">KADUNA</option>
                <option value="KNO">KANO</option>
                <option value="KST">KATSINA</option>
                <option value="KBB">KEBBI</option>
                <option value="KGI">KOGI</option>
                <option value="KWR">KWARA</option>
                <option value="LAG">LAGOS</option>
                <option value="NSW">NASSARAWA</option>
                <option value="NIG">NIGER</option>
                <option value="OGN">OGUN</option>
                <option value="OND">ONDO</option>
                <option value="OSN">OSUN</option>
                <option value="OYO">OYO</option>
                <option value="PLT">PLATEAU</option>
                <option value="RVR">RIVERS</option>
                <option value="SKT">SOKOTO</option>
                <option value="TRB">TARABA</option>
                <option value="YOB">YOBE</option>
                <option value="ZMF">ZAMFARA</option>
            </select>
            <input type="text" placeholder="Local Government Area" name="lg" value="<?PHP  if(isset ($_POST['lg'])){echo $_POST['lg'];}         ?>" />

            <p>Nationality:</p>
            <select name="scountry">
                <option value="">Country</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AG">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AG">Antigua  Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AA">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BL">Bonaire</option>
                <option value="BA">Bosnia  Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BR">Brazil</option>
                <option value="BC">British Indian Ocean Ter</option>
                <option value="BN">Brunei</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="IC">Canary Islands</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CD">Channel Islands</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CI">Christmas Island</option>
                <option value="CS">Cocos Island</option>
                <option value="CO">Colombia</option>
                <option value="CC">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CT">Cote D'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CB">Curacao</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="TM">East Timor</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FA">Falkland Islands</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="FS">French Southern Ter</option>

                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GB">Great Britain</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GN">Guinea</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HW">Hawaii</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IA">Iran</option>
                <option value="IQ">Iraq</option>
                <option value="IR">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="NK">Korea North</option>
                <option value="KS">Korea South</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Laos</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macau</option>
                <option value="MK">Macedonia</option>
                <option value="MG">Madagascar</option>
                <option value="MY">Malaysia</option>
                <option value="MW">Malawi</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="ME">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="MI">Midway Islands</option>
                <option value="MD">Moldova</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Nambia</option>
                <option value="NU">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="AN">Netherland Antilles</option>
                <option value="NL">Netherlands (Holland, Europe)</option>
                <option value="NV">Nevis</option>

                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NW">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau Island</option>
                <option value="PS">Palestine</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PO">Pitcairn Island</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="ME">Republic of Montenegro</option>
                <option value="RS">Republic of Serbia</option>
                <option value="RE">Reunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russia</option>
                <option value="RW">Rwanda</option>
                <option value="NT">St Barthelemy</option>
                <option value="EU">St Eustatius</option>
                <option value="HE">St Helena</option>
                <option value="KN">St Kitts-Nevis</option>
                <option value="LC">St Lucia</option>
                <option value="MB">St Maarten</option>
                <option value="PM">St Pierre  Miquelon</option>
                <option value="VC">St Vincent  Grenadines</option>
                <option value="SP">Saipan</option>
                <option value="SO">Samoa</option>
                <option value="AS">Samoa American</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome  Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="OI">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syria</option>
                <option value="TA">Tahiti</option>
                <option value="TW">Taiwan</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania</option>
                <option value="TH">Thailand</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad  Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TU">Turkmenistan</option>
                <option value="TC">Turks Caicos Is</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States of America</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VS">Vatican City State</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="VB">Virgin Islands (Brit)</option>
                <option value="VA">Virgin Islands (USA)</option>
                <option value="WK">Wake Island</option>
                <option value="WF">Wallis Futana Is</option>
                <option value="YE">Yemen</option>
                <option value="ZR">Zaire</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>
            <input type="submit" name="go" value="submit">

</form>


<?php
}elseif($page_name == "View Student"){
?>

<h1>Students Registration Record</h1>
<?php
$get = mysqli_query($db, "SELECT * FROM students") or die(mysqli_query($db));


 ?>
<table border="1">
  <tr>
    <th>SN</th><th>Admission Number</th><th>Lastname</th><th>Firstname</th><th>Class</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>State of Origin</th><th>Local Government</th><th>Nationality</th>
  </tr>
<tr>
  <?php while($flow = mysqli_fetch_array($get)){
extract($flow)
    ?>
    <td><?php echo $student_id ?></td>
    <td><?php echo $admission_no ?></td>
    <td><?php echo $lastname ?></td>
    <td><?php echo $firstname ?></td>
    <td><?php echo $class ?></td>
    <td><?php echo $date_of_birth ?></td>
    <td><?php echo $gender ?></td>
    <td><?php echo $address ?></td>
    <td><?php echo $state_of_origin ?></td>
    <td><?php echo $local_government ?></td>
    <td><?php echo $nationality ?></td>



</tr>
<?php } ?>

</table>
<?php
}elseif($page_name == "Add Payment"){?>

  <h1>Student Payment Platform</h1>


<form class="" action="" method="post">
  <h1>Please Enter Student Payment Details</h1>
<p>Student's Name: <input type="text" name="student_name" value=""></p>

<p>Amount Paid <input type="text" name="amn" value=""></p>



	<?php $fee= array(1=>'School Fees',
											2=>'Material Fees',
											3=>'Lesson Fees'); ?>
	<select name="pay_fee">
		<option value="">Select field</option>
		<?php foreach ($fee as $fee) {

		 ?>
			<option value="<?php echo $fee?>"><?php echo $fee?></option>

<?php } ?>
<p>
<input type="submit" name="add_payment" value="Add Payment">
</p>
<?php
		if (array_key_exists('add_payment', $_POST)){
		$payment_error= array();

		if(empty($_POST['student_name'])){
			$payment_error[]="Enter Correct Student Name";
		}else {
			$student_paid=mysqli_real_escape_string($db, $_POST['add_payment']);	}

		if(empty($_POST['amn'])){
			$payment_error[]="Enter exact amount";
		}else{
			$amount_paid=mysqli_real_escape_string($db,$_POST['amn']);
		}

		if(empty($_POST['pay_fee'])){
			$payment_error[]="Please Select Your Fee Type";

		}else {
			$pay_fee=mysqli_real_escape_string($db, $_POST['pay_fee']);
		}

	if(empty($payment_error)){
		$pay=mysqli_query($db, "INSERT INTO payment VALUES(NULL,
														'".rand(1000000,9999999)."',
														'".$student_paid."',
														'".$amount_paid."',
														'".$pay_fee."',
														NOW())")or die(mysqli_error($db));
	$success_pay="Payment Successfully Processed";
	header("Location:admin_platform.php?null_id=5&null_name=Add Payment&successes=$success_pay");
		} else {
			foreach($payment_error as $prr){ echo "<p>".$prr."</p>";}
		}
		}
		if(isset($_GET['successes'])){
			echo "<p>".$_GET['successes']."</p>";
		}
	}else{

 ?>


</form>




<h1>Students Payment Record </h1>
<table>
	<tr>
		<th>SN</th><th>Reciept Number</th><th>Student Name</th><th>Amount</th><th>Fee</th><th>Date of Payment</th>
	</tr>

	<tr>

<?php $task = mysqli_query($db, "SELECT * from payment");
while($mean = mysqli_fetch_array($task)){
	extract($mean);

 ?>
<td><?php echo $payment_id ?></td>
<td><?php echo $reciept_number ?></td>
<td><?php echo $students_name ?></td>
<td><?php echo $amount ?></td>
<td><?php echo $fee ?></td>
<td><?php echo $date_of_payment ?></td>


	</tr>

	<?php } ?>
</table>

<?php } ?>

</body>
</html>
