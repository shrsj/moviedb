<?php 
      include('config.php');
      $movid = $_GET['movid'];
      $sql = "SELECT * FROM screenings WHERE movid = '$movid'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                      for($i=0;$i<2;$i++)
                      {
                      $theater[$i] = $row['theaters'];
                      $lat[$i] = $row['lat'];
                      $lng[$i] = $row['lng']; 
                    }
                  }
              }
          ?>


               
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
      ['<?php echo $theater[0]; ?>', <?php echo $lat[0] ; ?>, <?php echo $lng[0] ; ?>, 4],
      ['<?php echo $theater[1]; ?>', <?php echo $lat[1] ; ?>, <?php echo $lng[1] ; ?>, 4],

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(15.92, 74.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

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
  </script>
      
</body>
</html>