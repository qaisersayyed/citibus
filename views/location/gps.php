<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>

<head>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4HbvUsOuKl5yYnN3At_yF4sogOZQWUKw">
  </script>

  <style>
    /* Set the size of the div element that contains the map */
    #map {
      height: 700px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>
  <script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        // Initialize the Google Maps API
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: point,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = null;

        function autoUpdate() {
          navigator.geolocation.getCurrentPosition(function(position) {
            var newPoint = new google.maps.LatLng(position.coords.latitude,
              position.coords.longitude);

            console.log(position);

            $.ajax({
              url: '<?php echo Yii::$app->request->baseUrl . '/location/gps' ?>',
              type: 'post',
              data: {
                'lat': position.coords.latitude,
                'lng': position.coords.longitude

              },

              success: function(data) {

                console.log(data);

              }
            })

            if (marker) {
              // If Marker is already created - Move it
              marker.setPosition(newPoint);
            } else {
              // If Marker does not exist 
              marker = new google.maps.Marker({
                position: newPoint,
                map:map
              });
            }

            // Center the map on the new position
            map.setCenter(newPoint);
          });

          setTimeout(autoUpdate, 15000);
        }

        autoUpdate();
      });
    } else {
      alert("W3C Geolocation API is not available");
    }
  </script>

</head>

<body>
  <center><h2>Current location</h2></center>
  <div id="map"></div>

<br>
<?= Html::a(
                    'Exit',
                    ['route-stop-type/form'],
                    ['class' => 'btn btn-custom btn-lg', 'style' => 'background-color:red; color:white']
                ); ?>

</body>

</html>