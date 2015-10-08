
<!DOCTYPE html>
<!-- saved from url=(0030)http://movies.sj/movie_db.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" href="./css/tab.css" type="text/css">
    <link rel="stylesheet" href="./css/button.css" type="text/css">
</head>
<body>
	<div id="section1" class='movie'>
            <h2>Movie Details</h2>  
            <?php
                $mov = $_GET["movid"];
                error_reporting(0);
                require('config.php');
           
                
                $sql = "SELECT * FROM movies WHERE movie_id = $mov";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                		
                    while($row = mysqli_fetch_assoc($result)) {
                        echo    "<div class = 'tab'><strong><b>{$row['moviename']} </b></strong><br>".
                                " <i>Genre :{$row['genre']} <br>".
                                " Year :{$row['year']} <br> ".
                                " Rating :{$row['rating']} <br> ".
                                " Actors :{$row['actors']} <br> ".
                                "Directors :{$row['directors']}  <br> ".
                                "<br> <center><img src='".$row['thumbnail']."' width='150' height='150'/></center> <br>".
                                "<a href='http://www.movies.sj/displaym.php?movid=".$row['movie_id']."'><em> Read</em></a> </div>";
                    }
                }
            mysqli_close($conn); 
        ?>
    </div>
	<?php
	include('mp.php');
    include('./layout/footer.php');
	
    ?>

</body>
</html>