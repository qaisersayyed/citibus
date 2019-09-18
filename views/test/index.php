
<?php
//Seats booked for this sample
$left = 3;
$right = 2;
$back = 6;
$tot = 57;
$seats = array("A");
$tot_col = $left + $right ;


//The aisles.  Note E is walkway and single seat in back
$ais = array("a","b","c","E","d","e");

//Walkway or aisle seats
$aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9","E10");

echo "<table>";
foreach($ais as $i){
	echo "<tr>";
	for($r=1;$r<=11;$r++){
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

