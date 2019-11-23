<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

   echo json_encode($rows);
//echo $f,$t;


$fare = $route_stop_type_id->fare;
$left = $model->pattern[0];
$right = $model->pattern[1];
$back = $model->pattern[2];
$no_of_seats = $model->no_of_seats;
//echo $fare;
$left_seats = $no_of_seats - $back;
$column = $left + $right;
$a = $left_seats /$column;

$seats = array("A");
$ais = array("a","b","c","E","d","e");
$array = ["a","b","c","d","e","f","g","h"];
$final_array = [];

for ($x=0;$x<$left;$x++) {
    $final_array[$x] =  $array[$x];
}

array_push($final_array, "E");
// echo $x;

for ($k=$x+1;$k<($right+$left+1);$k++) {
    $final_array[$k] =  $array[$k-1];
}
// var_dump($y);die;
// echo json_encode($final_array);
$aisle = array();

for ($z=0;$z<$a;$z++) {
    $val = "E".($z+1);
    array_push($aisle, $val);
}
// echo json_encode($aisle);
?>
<div class="container">
<center><h2>Select your seat</h2></center><br>
<div style="margin: auto; text-align:center;">
<button type="button" style="display:inline-block;margin-right:10px" class="btn btn-success"></button><h5 style="display:inline-block;margin-right:20px"> Available seats</h5>
<button type="button" style="display:inline-block;margin-right:10px" class="btn btn-danger"></button><h5 style="display:inline-block;margin-right:20px">Selected seats</h5>
<button type="button" style="display:inline-block;margin-right:10px" class="btn btn-secondary"></button><h5 style="display:inline-block;margin-right:20px">Not available</h5>
</div><br>
<div >

	<div  style="margin: auto; text-align:center ;border: 4px solid black;width: 750px;padding-left:10px;padding-top:10px;">
	<div style="float:left"><?php echo Html::img('@web/uploads/png', ['width'=>'40px']);?></div>
		<div   style="display:inline-block;margin-left:50px;margin-top:-5px;">
		<?php
        echo "<table style='border-left:2px solid black; margin-top:0px; position:relative;'>";

        foreach ($final_array as $i) {
            echo "<tr>";
            for ($r=1;$r<=$a+1;$r++) {
                $seat = $i.$r;
                if (in_array($seat, $seats)) {
                    $image = "<button >w $r $i </button>";
                } elseif (!in_array($seat, $aisle)) {
                    $image = "<button value='$seat' onclick= 'myClick(id)' style='margin:5px;height: 40px;' class='btn btn-success' id=$i$r >$seat </button>";
                } elseif (!in_array($seat, $aisle)) {
                    $image = "<button>r $r $i </button>";
                } else {
                    $image = "&nbsp;";
                }
                echo "<td>$image</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        ?>
		</div>
	</div>
<br>
<div class="card bg-success text-white" >
    <div class="card-body" style="background-color:#F4B41A; color:black">
	<div class="row" style="text-align: center;padding:30px">
<div class="col-md-4"><p>From:<h3><?php echo $f ?></h3></p></div>
<div class="col-md-4"><p>To:<h3><?php echo $t ?></h3></p></div>
<div class="col-md-4"><p>Timing:<h3><?php $ftime = new DateTime($bus_route_id->timing);echo $ftime->format('h:i A');;   ?></h3></p></div>

		
	</div>
	</div>
  </div>
	
</div>
<br>
<script type="text/javascript">
var seats = []
function myClick(id){
	console.log(id);
	
	var id = document.getElementById(id);
	if(seats.indexOf(id.id) !== -1){
		var index = seats.indexOf(id.id);
		seats.splice(index, 1);
		console.log(seats) ;
		id.className = 'btn btn-success'
		
	}
	else{
		seats.push(id.id);
		console.log(seats) ;
		id.className='btn btn-danger' ;
	 }
	var length = seats.length;
	var seats_fare = <?php echo $fare ?> * length;
	console.log(seats_fare)	;
	fare.value  = seats_fare;
	
	//  document.cookie = "final_seats=234"
	seat.value = seats
	console.log(seats)
	console.log(fare)
	<?php //$seats = $_COOKIE['final_seats'];
    ?> 
}

function my_code(){
	var booked_seats = array()
	<?php 
	foreach($rows as $seat){
		echo $seat->seat_code;
		array_push($booked_seats,$seat->seat_code);
	}
	?>
	console.log(booked_seats)
//     	var booked_seats = <? // php echo json_encode($rows) ?>;
// // var booked_seats = ['e1','e2']
//     	console.log(booked_seats);
//     for (i = 0; i < booked_seats.length; i++) { 
//         var ele = booked_seats[i];
//         var s_id = document.getElementById( ele) ;
// 		console.log(ele);
//         s_id.className= 'btn btn-info';
//         s_id.disabled = true
//         
//     }
}
window.onload=my_code();


</script>


<?php $s="<script> seats</script>";
echo $s;?>

<?php $form = ActiveForm::begin([
    'method' => 'get',
                                                // 'action' => Url::to(['bus-seats/getSeat'])
    ]); ?>
										
		<input id= "seat" type="hidden" name="seat" value=""  >
	<input id= "fare" type="hidden" name="fare" value=""  >          
				<br>								
	<div class="row" style="text-align: center;">
		<div class="col-md-8">

		</div>
		<div class="col-md-2">
		<a type="button" href="javascript:history.back()" class="btn btn-default" , style = 'background-color:#143D59; color: white'>Go Back</a>

		</div>
		<div class="col-md-2">
		<?= Html::submitButton('Proceed For Payment', ['class' => 'btn btn-success', 'style' => 'background-color:#F4B41A']) ?>

		</div>

	</div>													

<?php ActiveForm::end(); ?>
</div>