<!DOCTYPE html>
<html>

<head>
  <style>
    /* Set the size of the div element that contains the map */
    #map {
      height: 700px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>
</head>

<body>

  <div id="map"></div>

  <script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        // Initialize the Google Maps API
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: point,
          mapTypeIdh: google.maps.MapTypeId.ROADMAP
        });

        var marker = null;

        function autoUpdate() {
          navigator.geolocation.getCurrentPosition(function(position) {
            var newPoint = new google.maps.LatLng(position.coords.latitude,
              position.coords.longitude);

            console.log(position);

            $.ajax({
              url: '<?php echo Yii::$app->request->baseUrl . '/test/gps' ?>',
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

          
          setTimeout(autoUpdate, 5000);
        }

        autoUpdate();
      });
    } else {
      alert("W3C Geolocation API is not available");
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4HbvUsOuKl5yYnN3At_yF4sogOZQWUKw">
  </script>
</body>

</html>