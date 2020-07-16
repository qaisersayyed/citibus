<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 600px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
  <br>
    <label for="">Enter Bus No.</label>
    <input type="text" id="busno" value="GA03G1876" class="form-control" ><br>
    <div class="row">
    <div class="col-md-2"><button onclick="track()" class="btn btn-success">Track Bus</button><br>
</div>
</div><br>
    
  
    
    <!--The div element for the map -->
    <div id="map" style="display:none" >
    <h3>Current Location</h3>
    </div>
    <script>
    var lat = 0;
    var lon = 0;
    var uluru = null;
    function track(){
    var map1 = document.getElementById('map');
        var btn = document.getElementById('btn');
        var busno = document.getElementById('busno');
        // map.style.display = "block";
        console.log(busno.value);
    $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/location/getlatlog' ?>',
           type: 'post',
           data: {'data':busno.value},
          
           success: function (data) {

            var result = $.parseJSON(data);
            console.log(result);
            
            if(result.code == 1){
                console.log(result.lat);
           console.log(result.lon);
            lat = parseFloat(result.lat);
            lon = parseFloat(result.lon);
            console.log(result.lat);
           console.log(result.lon);
          test();
          map1.style.display = "block";
            }else{
                alert('Invalid Bus No.')
            }
           

           }
    })

    }


    console.log(lon);
    
// Initialize and add the map
function test() {

  // The location of Uluru
  var uluru = {lat: lat
, lng: lon
};
  // The map, centered at Uluru
  var map = new google.maps.Map(
     document.getElementById('map'), {zoom: 13, center: uluru});
  // The marker, positioned at Uluru
 var marker = new google.maps.Marker({position: uluru, map: map});


}

    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4HbvUsOuKl5yYnN3At_yF4sogOZQWUKw">
    </script>
   
  </body>
</html>