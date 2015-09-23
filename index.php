<!DOCTYPE html>
<!-- saved from url=(0030)http://movies.sj/movie_db.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <link rel="stylesheet" href="./css/homepage.css" type="text/css">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "readMovie.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
    });

    function selectMovie(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }

    function del(mid)
    {
       return confirm("ARE You Sure You Want to DELETE The Movie??");

    }


    </script>

    <style>
    /*body{width:610px;}*/
    .frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:30px;}
    #country-list{float:left;list-style:none;margin:0;padding:0;width:390px;}
    #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
    #country-list li:hover{background:#F0F0F0;}
    #search-box{padding: 10px;border: #F0F0F0 1px solid; width: 50%;}
    </style>

</head>

<body class="s1">

    <div id="header">
        <h1>Movie Database</h1>
    </div>

    <div class="frmSearch">
    <input type="text" id="search-box" placeholder="Search Movie.." />
    <div id="suggesstion-box"></div>
    </div>
  
    <div id="section" class='movie'>
    <h2>Recently Added</h2>  
    <?php

    $servername = "localhost";
    $username = "root";                     //  Login user id 
    $password = "";                         //   Login password
    $dbname = "movies";                   // Your database name
        /////////// End of Database Details //////
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        $y ='Are you sure to delete this movie??';
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM movies ORDER BY movie_id DESC LIMIT 0,10";
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


                        "<form method= 'POST' action = '' name = 'delete' id='delete' onsubmit='return del(".$row['movie_id'].");'>".
                        " <input type ='hidden' name = 'movid'  value='".$row['movie_id']."'>".
                        "<input type ='submit' value = 'delete' name = 'delete'></form>".

                        "<a href='http://www.imdb.com/title/".$row['imdbcode']."'><em> Read</em></a>  ".

                        "<form name = 'update' id='update' method= 'GET' action = './update.php'>". 
                        "<input type = 'hidden' name ='movid' value ='".$row['movie_id']."'>".
                        "<input type ='submit' value='update'> </form></div>";
            }
        }
    mysqli_close($conn); 
?>

<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "movies";

            $movid = $_POST["movid"];
           if(isset ($_POST["delete"]))
                {
                    try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            // set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
                            $sql = "DELETE FROM movies WHERE movie_id = '$movid' ";
                            // use exec() because no results are returned
                             $conn->exec($sql);
                             $host  = $_SERVER['HTTP_HOST'];
                            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                            $extra = 'mypage.php';
                            header("Location: http://$host$uri/");                        
                        }
                        /* No rows matched -- do something else */
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
            }
    $conn = null;
?>

    <br> 
    <div class = 'round-button'>
            <a href="/insert.html">
                <img src="/plus-sign8.svg" alt="Home" />
            </a>
        </div>
    </div>

    <div id="footer">
    </div>

</body>
</html>





