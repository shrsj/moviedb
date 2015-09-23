<!Doctype html>
<html>
<head>
    <title>Edit Movie Database</title>
    <link rel="stylesheet" href="css/insertpage.css" type="text/css" />
    <link rel="stylesheet" href="./css/homepage.css" type="text/css">
</head>
<body>
    <div id="header">
        <h1>Movie Database</h1>
    </div>
    


    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "movies";

            $movid = $_GET["movid"];
           
            try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                    $sql = "DELETE FROM movies WHERE movie_id = '$movid' ";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "<br><br>$movid deleted successfully";
                }
                /* No rows matched -- do something else */
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
   
    $conn = null;
?>


</body>
</html>

