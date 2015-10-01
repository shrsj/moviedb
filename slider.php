<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<div >
	<img src='' width='700px' height='400px' id= 'sw1'>
</div>

<div id="sw2">
<input class="slide_button" id="rn_0" type="button" onclick="img_sld_remote('0')" value="1">
&nbsp;
<input class="slide_button" id="rn_1" type="button" onclick="img_sld_remote('1')" value="2">
&nbsp;
<input class="slide_button" id="rn_2" type="button" onclick="img_sld_remote('2')" value="3">
&nbsp;
<input class="slide_button" id="rn_2" type="button" onclick="img_sld_remote('3')" value="4">
&nbsp;
<input class="slide_button" id="rn_2" type="button" onclick="img_sld_remote('4')" value="5">
&nbsp;
&nbsp;
<input type="button" id="pauseplay" onclick="img_pause()" value="pause">
</div>

<?php
        require('config.php');
   
        
        $sql = "SELECT * FROM movies ORDER BY movie_id DESC LIMIT 0,5";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        	$i=0;
        	$img = array(10);
            while($row = mysqli_fetch_assoc($result)) {
                $img[$i]=$row['thumbnail'];
                $i++;  
            }
        }
    mysqli_close($conn); 
?>

<script>
var sw1 = document.getElementById("sw1");
var picno = 0;
var delay = 2000; 
var st = "";
var pauseplay = document.getElementById("pauseplay");

var images = [];
images[0] = "<?php echo $img[0]; ?>";
images[1] = "<?php echo $img[1]; ?>";
images[2] = "<?php echo $img[2]; ?>";
images[3] = "<?php echo $img[3]; ?>";

images[4] = "<?php echo $img[4]; ?>";

images[5] = "<?php echo $img[5]; ?>";

function img_pause(){

if(pauseplay.value == "pause"){
clearTimeout(st); pauseplay.value = "play";}

else{slideshow(); pauseplay.value = "pause";}

}

function img_sld_remote(remote_number){
	picno = remote_number;
	sw1.src = images[picno]; 
}




function slideshow(){
if(picno > images.length-1){ picno = 0;}
sw1.src = images[picno]; 
picno++;
 st = setTimeout("slideshow()", delay);

}
slideshow();
</script>
</body>
</html>