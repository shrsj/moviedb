<?php 
$movid=$_GET['movid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Add Shows To Database</title>
    <link rel="stylesheet" href="css/insert.css" type="text/css" />
</head>
<body >
    <div id="header">
        <h1>Movie Database</h1>
    </div>
	<form method='POST' action = 'theater1.php' name ='insert' id = 'section' class ='s1' >

    <input type = 'text' name = 'theater' id = 'theater' placeholder = 'Theater name' >
    <input type = 'text' name = 'lat' id = 'lat' placeholder = 'Latitude' >
    <input type = 'text' name = 'lng' id = 'lng' placeholder = 'Longitue' >
    <input type = 'hidden' name='movid' value ='<?php echo $movid; ?>' >
    <img src="captcha_image.php" />
    <input type="text" name="captcha_input" size="15">
    <input type = "submit">
</form>
<div id="footer">
    </div>
</body>

</html>



