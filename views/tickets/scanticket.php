<?php
//echo $flag;
// if ($model){
// }
echo "<br>";

use yii\bootstrap\Alert ;
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function myFunction() {
  //audio
      var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
//panel details 
document.getElementById('panal').style.display = "none";
var name =   document.getElementById('name') ;
var busno = document.getElementById('busno') ;
var ticket_id = document.getElementById('ticket_id');
//pass panel
document.getElementById('panal_pass').style.display = "none";
var p_name =   document.getElementById('p_name') ;
var from = document.getElementById('from') ;
var to = document.getElementById('to');
var rides = document.getElementById('rides');

    var a = document.getElementById('ticket_no').value;
    //alerts
    var sucess = document.getElementById('1');
    var fail = document.getElementById('0');
    var warning = document.getElementById('2');
    var pass_warning = document.getElementById('expired');

    sucess.style.display = "none";
    fail.style.display = "none";
    warning.style.display = "none";
    pass_warning.style.display = "none";
   

  $.ajax({
          url: '<?php echo Yii::$app->request->baseUrl. '/tickets/markticket' ?>',
          type: 'post',
          data: { 'ticket' : a },
        
          success: function (data) {
             snd.play()
            var result = $.parseJSON(data);
           console.log(result.code);
           console.log(result.type);
          //  console.log(result.to);
          //  console.log(result.rides);
           //console.log(data);

          if (result.type == 't'){
            console.log("type is t");
            
              if (result.code == 1){
              sucess.style.display = "block";
              console.log(result.code);
              name.innerHTML = result.name;
              busno.innerHTML = result.busno;
              ticket_id.innerHTML = result.ticket_id;
              document.getElementById('panal').style.display = "block";

               }else if(result.code == 2) {
                warning.style.display = "block";
                console.log(result.code);
                
              }else{
              fail.style.display = "block";
              console.log(result.code);
               }
          }

          //pass
          if (result.type == 'p'){
            console.log("type is p");
            
              if (result.code == 1){
              sucess.style.display = "block";
              console.log(result.code);
              p_name.innerHTML = result.name;
              from.innerHTML = result.from;
              to.innerHTML = result.to;
              rides.innerHTML = result.rides;
              document.getElementById('panal_pass').style.display = "block";

               }else if(result.code == 2) {
                pass_warning.style.display = "block";
                console.log(result.code);
                
              }else{
              fail.style.display = "block";
              console.log(result.code);
               }
          }
          if(result.code == 0){
            fail.style.display = "block";
            console.log("this is node");
            
          }
   

           

           }

      });
    
}
</script>
<div class="tickets-scanticket" >


<div class="alert alert-success" id="1" style="display:none" role="alert">
  <h4><b>Success!!</b> </h4>
</div>
<div class="alert alert-danger" id="0" style="display:none" role="alert">
<h4><b>Ticket/Pass No. Invalid!!</b></h4>
</div>
<div class="alert alert-warning" id="2" style="display:none" role="alert">
  <h4><b>Ticket Already Used!!</b></h4>
  
</div>
<!-- pass -->
<div class="alert alert-warning" id="expired" style="display:none" role="alert">
  <h4><b>Pass Expired OR No Rides Left...</b></h4>
  
</div>

<div class="panel panel-info" id="panal" style="display:none">
      <div class="panel-heading">Scaned Details.</div>
      <div class="panel-body">
      <h5 class="text-info">Name: <b id="name"></b></h5>
      <h5 class="text-info">Ticket No. <b id="ticket_id"> </b></h5>
       <h5 class="text-info">Bus No. <b id="busno"> </b></h5>
      </div>
  </div>

<!-- passs -->
<div class="panel panel-info" id="panal_pass" style="display:none">
      <div class="panel-heading">Scaned Details.</div>
      <div class="panel-body">
      <h5 class="text-info">Name: <b id="p_name"></b></h5>
      <h5 class="text-info">From: <b id="from"> </b></h5>
       <h5 class="text-info">To: <b id="to"> </b></h5>
       <h5 class="text-info">Rides Left: <b id="rides"> </b></h5>
      </div>
  </div>


    <div class="form-group">
   
    <label >Enter Ticket No.</label>
    <input type="text" name="ticket_no" id="ticket_no" class="form-control" style="width:50%">
    </div>



    <div class="form-group">
      <input id="submit" onclick="myFunction()" type="submit" class="btn btn-success" value="Submit">
        
    </div>
   
</div>
