<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Multiple Locations using Google Maps </title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU&callback=initMap&sensor=false"></script>
</head>
<body>
    <div id="googleMap" style="width: 500px; height: 400px;"></div>

    <script type="text/javascript">
    var locationArray = [
	 <?php echo"['', 18.5248904, 73.7228789, 1],";?>
      
      ['Mumbai', 19.0825223, 72.7410977, 2],
      
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 8,
      center: new google.maps.LatLng(18.5248904,73.7228789),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locationArray.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locationArray[i][1], locationArray[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locationArray[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    </script>
</body>
</html>