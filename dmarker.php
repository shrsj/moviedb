<?php 
$movid=$_GET['movid'];
?>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
<link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?v=3.5&amp;sensor=false"></script>

<script type="text/javascript">
var geocoder;
var map;

function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(19.397, 73.644);
    var myOptions = {
    zoom: 5,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}


function codeAddress() {
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: results[0].geometry.location

            });
             // Javascript//
             google.maps.event.addListener(marker, 'click', function(evt){
             document.getElementById('lat').value = evt.latLng.lat().toFixed(3);
             document.getElementById('lng').value = evt.latLng.lng().toFixed(3);
             });

             google.maps.event.addListener(marker, 'dragstart', function(evt){
             document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
             });

             google.maps.event.addListener(marker, 'click', function(evt){
             document.getElementById('theater').value =  results[0].formatted_address;
             });

             google.maps.event.addListener(marker, 'dragstart', function(evt){
             document.getElementById('info').innerHTML = '<p>Currently dragging marker...</p>';
             });


             map.setCenter(marker.position);
             marker.setMap(map);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
     });
    }
    

</script>

<style type="text/css">
#controls {
position: absolute;
bottom: 1em;
left: 100px;
width: 400px;
z-index: 30000;
padding: 0 0.5em 0.5em 0.5em;
}
html, body, #map_canvas {
        margin: 0;
        width: 98%;
        height: 90%;
        margin: 10px;
}
</style>
<link rel="stylesheet" href="css/insert.css" type="text/css" />
</head>
 <div id="header">
        <h1>Movie Database</h1>
    </div>

<body onLoad="initialize()">

</div>


<div id="map_canvas"></div>

TO Add a Movie First Enter Location and Press Geocode Button
Then click on the marker


<form method='POST' action = 'theater1.php' name ='insert' id = 'section' class ='s1' >

    <input id="address" type="textbox" value="">
    <input type="button" value="Geocode" onClick="codeAddress()">
    <div id="current" style="background-color:white;">Nothing yet...</div>
    <div id="info" style="background-color:white;">Address:</div>



    <input type = 'text' name = 'theater' id = 'theater' placeholder = 'Theater name  address' >
    <input type = 'hidden' name = 'lat' id = 'lat' value='' >
    <input type = 'hidden' name = 'lng' id = 'lng' value='' >
    <input type = 'hidden' name='movid' value ='<?php echo $movid; ?>' >
    <img src="captcha_image.php" />
    <input type="text" name="captcha_input" size="15">
    <input type = "submit">
</form>
<div id="footer">
    </div>


</body>
</html>