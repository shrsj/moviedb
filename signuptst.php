<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Add Movies To Database</title>
	<link rel="stylesheet" href="./css/insert.css" type="text/css">

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="./js/searchcountry.js" type="text/javascript"></script>
</head>
<body>
 
	<form method='POST' action = '' name ='signup' id = 'section' class ='s1' >
		<input type ='text' name='fname' id = "fname" autofocus placeholder = 'First Name'>&nbsp;
    	<input type ='text' name='lname' id = "lname" autofocus placeholder = 'Last Name'>
    	<br>
    	Gender :<input type='radio' name='gender' value='M'>Male
            	<input type='radio' name='gender' value='F'>Female
             	<br>

        Year of Birth : <select name="yob" id='yob' >
						    <?php $val =1920;
						        while($val<2016)
						        {
						            echo "<option value=".$val.">".$val."</option>";
						            $val = $val+1;
						        }
						    ?>
    					</select>           
	    <br><br>

	    <div class="frmSearch">
	    	<input type="text" id="search-box" placeholder="Country " name='country' />
	    <div id="suggesstion-box"></div>
	    <br>
	    <input type ='number' name='zipcode' id = 'zipcode' placeholder = 'Zip/Postal Code'>
	    <br>
	    <input type ='email' name='email' id = 'email' placeholder = 'Email Address'>
	    <br>
	    <input type ='password' name='pass' id = 'pass' placeholder = 'Password'>
	    <br>
	    <input type ='password' name='cpass' id = 'cpass' placeholder = 'Confirm Password'>
	    <br><br>
	    <img src="captcha_image.php" />
	    <input type="text" name="captcha_input" size="15">
	    <input type = "submit">
	</form>
	<div id="footer"></div>
</body>
</html>


<?php

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER["REQUEST_METHOD"] <> "POST")
{
    die();
}
else
{
	if ($_POST["captcha_input"] == $_SESSION["pass"])
		{
            include('config.php');

            $fname = test_input($_POST['fname']);
            $lname = test_input($_POST['lname']);
            $gender = test_input($_POST['gender']);;
            $yob = test_input($_POST['yob']);
            $country = test_input($_POST['country']);
            $zipcode = test_input($_POST['zipcode']);
            $email = test_input($_POST['email']);
            $pass = test_input($_POST['pass']);

            try {
	                $conn3 = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	                $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                $sql = "INSERT INTO userlogin ( fname, lname, gender, birthyear, country, zipcode, email, pass)
	                          VALUES ('$fname' ,'$lname', '$gender','$yob','$country','$zipcode','$email','$pass' )";
	               // use exec() because no results are returned
	                $conn3->exec($sql);
	                echo "Record updated successfully";
	                include('testmail.php');
	            }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }
            $conn3 = null;
        }
        else
        {
        	echo "WRONG CAPTCHA INSERTED!! Try Again.";
        }
}