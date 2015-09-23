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
	// *** They passed the test! ***
	// *** This is where you would post a comment to your database, etc ***
	echo "Correct! You have passed the captcha test. <br><br>";
       echo "You information input has been sent <br><br>";

       echo "This is what you sent  <br><br>";


        echo "Your Company: \"" . $_POST["company"] . "\" <br>";
	
        echo "Your Name: \"" . $_POST["name"] . "\" <br>";

        echo "Your Surname: \"" . $_POST["surname"] . "\" <br>";

        echo "Your Address: \"" . $_POST["address"] . "\" <br>";

        echo "Your Zip: \"" . $_POST["zip"] . "\" <br>";

        echo "Your City: \"" . $_POST["city"] . "\" <br>";

        echo "Your Address: \"" . $_POST["address"] . "\" <br>";

        echo "Your email: \"" . $_POST["email"] . "\" <br>";

	
        echo "Your Telephone: \"" . $_POST["telephone"] . "\" <br>";

        echo "Your Mobile: \"" . $_POST["mobile"] . "\" <br>";

        echo "Your Comments: \"" . $_POST["comments"] . "\" <br>";
	
       
//sends email via php to the following address$mailuser = "yourName@yourDomainXYZ123.com";//echo 'default chosen address: '.$mailuser;			$header = "Return-Path: ".$mailuser."\r\n"; 	$header .= "From: form with captcha <".$mailuser.">\r\n"; 	$header .= "Content-Type: text/html;"; 		  	$mail_body = '	The User: '.$_POST[company].' has sent his input.	Your Name: '. $_POST[name] . '<br>	Your Surname: '. $_POST[surname] . '<br>	Your Address: '. $_POST[address] . '<br>	Your Zip: '. $_POST[zip] . '<br>	Your City: '. $_POST[city] . '<br>	Your email: '. $_POST[email] . '<br>	Your Telephone: '. $_POST[telephone] . '<br>	Your Mobile: '. $_POST[mobile] . '<br>	Your Comments: '. $_POST[comments] . '<br>'	;		mail ($mailuser, 'Form sent', $mail_body, $header);         echo 'THANKS ';    
       

} else {
	// *** The input text did not match the stored text, so they failed ***
	// *** You would probably not want to include the correct answer, but
	//	unless someone is trying on purpose to circumvent you specifically,
	//	its not a big deal.  If someone is trying to circumvent you, then
	//	you should probably use a more secure way besides storing the
	//	info in a cookie that always has the same name! :) ***
	echo "Sorry, you did not pass the CAPTCHA test.<br><br>";
	echo "You said " . $_POST["captcha_input"];
	echo " while the correct answer was " . $_SESSION["pass"];

        echo "    - Please click back in your browser and try again <br><br>";

}?>