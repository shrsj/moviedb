<?
// *** The CAPTCHA comparison - http://frikk.tk ***
// *** further modifications - http://www.captcha.biz ***

session_start();

// *** We need to make sure theyre coming from a posted form -
//	If not, quit now ***
if ($_SERVER["REQUEST_METHOD"] <> "POST")
	die("You can only reach this page by posting from the html form");

// *** The text input will come in through the variable $_POST["captcha_input"],
//	while the correct answer is stored in the cookie $_COOKIE["pass"] ***
if ($_POST["captcha_input"] == $_SESSION["pass"])
{

		include('config.php');

		$movid =$_POST['movid'];
		$lat = $_POST["lat"];
		$lng = $_POST["lng"];
		$theater = $_POST["theater"];


			try {
			    $conn3 = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
			    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			      
			      $sql1 = "INSERT INTO screenings(movid , theaters, lat , lng)
			      			VALUES ('$movid' , '$theater' , '$lat' , '$lng')";

			   // use exec() because no results are returned
			   
			    $conn3->exec($sql1);
			   header("Location: http://movies.sj/logd.php");
				exit;
			    }
			catch(PDOException $e)
			    {
			    echo $sql1. "<br>" . $e->getMessage();
			    }

			$conn3 = null;

	// *** They passed the test! ***
	// *** This is where you would post a comment to your database, etc ***
	
       

} else {
	// *** The input text did not match the stored text, so they failed ***
	// *** You would probably not want to include the correct answer, but
	//	unless someone is trying on purpose to circumvent you specifically,
	//	its not a big deal.  If someone is trying to circumvent you, then
	//	you should probably use a more secure way besides storing the
	//	info in a cookie that always has the same name! :) ***
	echo "Sorry, your CAPTCHA was wrong.<br><br>";
	echo "    - Please click back in your browser and try again <br><br>";

}
?>