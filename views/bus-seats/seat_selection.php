<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$left = $model->pattern[0];
$right = $model->pattern[1];
$back = $model->pattern[2];
$noseats = $model->no_of_seats;

echo $noseats;
$ans = $noseats - $back;
echo $ans;
$a = $ans /2;
echo $a;
?>

<div class ="container">

  <div  style="border:1px solid #cecece;display:inline-block">
  <?php
  $i=1;
  $seats = $a;

  while ($i<=$a){
    
  ?>
    <button class="btn btn-success"></button>

  <?php
      if( $i % $left == 0){
  ?>
    <br>
  <?php
      }
        $i = $i +1;
        // echo $i;
        $seats = $seats-1;
        // echo $seats;     
    }
  ?>
  </div>



  <div  style="border:1px solid #cecece;display:inline-block;position:absolute;">
  <?php
  $i=1;
  $seats = $a;

  while ($i<=$a){
    
  ?>
    <button class="btn btn-success"></button>

  <?php
      if( $i % $right == 0){
  ?>
    <br>
  <?php
      }
        $i = $i +1;
        // echo $i;
        $seats = $seats-1;
        // echo $seats;     
    }
  ?>
  </div>

  <div  style="border:1px solid #cecece;position:absolute;">
  <?php
  $i=1;
  $seats = $a;

  while ($i<=$back){
    
  ?>
    <button class="btn btn-success"></button>

  <?php
      if( $i % $back == 0){
  ?>
    <br>
  <?php
      }
        $i = $i +1;
        // echo $i;
        $seats = $seats-1;
        // echo $seats;     
    }
  ?>
  </div>

</div>




