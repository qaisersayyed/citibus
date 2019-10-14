<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;



//  echo json_encode($rows);


$fare = $route_stop_type_id->fare;
$left = $model->pattern[0];
$right = $model->pattern[1];
$back = $model->pattern[2];
$no_of_seats = $model->no_of_seats;

$left_seats = $no_of_seats - $back;
$column = $left + $right;
$a = $left_seats /$column;

$seats = array("A");
$ais = array("a","b","c","E","d","e");
$array = ["a","b","c","d","e","f","g","h"];
$final_array = [];

for($x=0;$x<$left;$x++){
	$final_array[$x] =  $array[$x];
}

array_push($final_array,"E");
// echo $x;

for($k=$x+1;$k<($right+$left+1);$k++){
	$final_array[$k] =  $array[$k-1];
}
// var_dump($y);die;
// echo json_encode($final_array);
$aisle = array();

for($z=0;$z<$a;$z++){
	$val = "E".($z+1);
	array_push($aisle,$val);
}
// echo json_encode($aisle);
?>
<div >
	<div  style="margin: auto; text-align:center;border: 1px solid black;width: 700px;">
		<div style="display:inline-block;position:absolute;margin-top:10px;">
			<? echo Html::img('@web/uploads/png', ['width'=>'30px', 'class' => 'pull-left img-responsive']);?>
		</div>
		<div   style="display:inline-block;margin-left:80px;">
		<?
		echo "<table style='border-left:1px solid black'>";

		foreach($final_array as $i){
			echo "<tr>";
			for($r=1;$r<=$a+1;$r++){
				$seat = $i.$r;
				if(in_array($seat,$seats)){
					$image = "<button >w $r $i </button>";
				}elseif(!in_array($seat,$aisle)){
					$image = "<button value='$seat' onclick= 'myClick(id)' style='margin-right:10px;margin-top:10px;height: 40px;' class='btn btn-success' id=$i$r >$seat </button>";
				}elseif(!in_array($seat,$aisle)){
					$image = "<button>r $r $i </button>";
				}else{
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

	<div style="width:300px;margin-top:10px">
		<ul class="list-group list-group-flush">
		<li class="list-group-item">From: <?php echo $route_id->from ?></li>
		<li class="list-group-item">To:	<?php echo $route_id->to ?> </li>
		<li class="list-group-item">Timing: <?php echo $bus_route_id->timing ?> </li>
		</ul>
	</div>
</div>

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

	seat.value = seats
	console.log(seats)

}



</script>



<?php $form = ActiveForm::begin([
	'method' => 'get',
												// 'action' => Url::to(['bus-seats/getSeat'])
	]); ?>
										
		<input id= "seat" type="hidden" name="seat" value=""  >
	<input id= "fare" type="hidden" name="fare" value=""  >          
												
	<div class="form-group" type="button">
		<?= Html::submitButton('Proceed For Payment', ['class' => 'btn btn-success']) ?>
	</div>
															

<?php ActiveForm::end(); ?>