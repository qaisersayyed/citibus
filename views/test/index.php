
<?php
//Seats booked for this sample
$left = 2;
$right = 2;
$back = 5;
$tot = 50;
$seats = array("A");
$tot_col = $left + $right ;
$left_seat = $tot - $back;
$x = $left_seat/$tot_col;

//The aisles.  Note E is walkway and single seat in back
$ais = array("a","b","c","E","d","e");
$A = ["a","b","c","E","d","e","f"];
// $y = [];
// for($x=0;$x<$left;$x++){
	

// 	$y.append($A[$x]);
// }
// echo $y;
//Walkway or aisle seats
$aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9","E10");

echo "<table>";
foreach($ais as $i){
	echo "<tr>";
	for($r=1;$r<=$x+1;$r++){
		$seat = $i.$r;
		if(in_array($seat,$seats)){
			$image = "<button >w $r $i </button>";
		}elseif(!in_array($seat,$aisle)){
			$image = "<button id=$r$i>m $r $i </button>";
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

