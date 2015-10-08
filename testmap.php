<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        width: 700px;
        height: 500px;
        background-color: #CCC;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <?php 
	  include('config.php');

	  $movid = $_GET['movid'];

	$sql = "SELECT * FROM screenings WHERE movid = '$movid' ";
	$result = mysqli_query($conn, $sql);
	//$theaters = array();
	//$lat = array();
	//$lng = array();
	  if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) { 
	            //array_push( $theaters, $row['theaters']);
	            //array_push( $lat, $row['lat']);
	            //array_push( $lng, $row['lng']);?>
	            <script type="text/javascript">

	            var locations = [ "<?php echo $row['theaters'];?>" , <?php echo $row['lat'];?> , <?php echo $row['lng'];?>];
	            </script>
	        <?php  }
	        }?>
    <script>
			function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
			    center: {lat: 15.397, lng: 73.644},
			    zoom: 6,
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			  });
			var infoWindow = new google.maps.InfoWindow({map: map});

			var marker, i;
        	for (i = 0; i < locations.length; i++) {  
          	marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          	});

        	google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }



			  // Try HTML5 geolocation.
			  if (navigator.geolocation) {
			    navigator.geolocation.getCurrentPosition(function(position) {
			      var pos = {
			        lat: position.coords.latitude,
			        lng: position.coords.longitude
			      };

			      infoWindow.setPosition(pos);
			      infoWindow.setContent('Location found.');
			      map.setCenter(pos);
			    }, function() {
			      handleLocationError(true, infoWindow, map.getCenter());
			    });
			  } else {
			    // Browser doesn't support Geolocation
			    handleLocationError(false, infoWindow, map.getCenter());
			  }
			}

			function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			  infoWindow.setPosition(pos);
			  infoWindow.setContent(browserHasGeolocation ?
			                        'Error: The Geolocation service failed.' :
			                        'Error: Your browser doesn\'t support geolocation.');
			}
			google.maps.event.addDomListener(window, 'load', initMap);
    </script>
  </head>
  <body>
  	<div id="map"></div>
  </body>
</html>