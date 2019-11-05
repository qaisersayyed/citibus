<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 

?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Citibus',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
     ?>
               
    <div id="mySidenav" class="sidenav" style="top: 50px;background-color: #4CAF50">
        <a href="<?= Url::to('/Citibus/web/bus/index')?>" id="bus_index">Bus</a>
        <a href="<?= Url::to('/Citibus/web/route-stop-type/index')?>" id="route-stop-type_index">Route Stop</a>
        <a href="<?= Url::to('/Citibus/web/route-stop-type/form')?>" id="route-stop-type_form">Form</a>
        <!-- <a href="#" id="contact">Contact</a> -->
    </div>
<?php 
    if (Yii::$app->user->isGuest) { 
        ?>
        <div id="mySidenav" class="sidenav" style="top: 50px;background-color: #4CAF50">
        <a href="<?= Url::to('/Citibus/web/site/login')?>" id="site_login">Login</a>
        <a href="<?= Url::to('/Citibus/web/customer/create')?>" id="customer_create">Sign Up</a>
        <!-- <a href="<?//= Url::to('/Citibus/web/route-stop-type/form')?>" id="route-stop-type_form">Form</a>
        <a href="#" id="contact">Contact</a> -->
    </div> 
    <?php      
        } else{
            ?>
            <div id="mySidenav" class="sidenav">
        <!-- <a href="<?= Url::to('/Citibus/web/customer/profile')?>" id="customer_profile">Profile</a> -->
       
    </div>
            
      <?php  }

?>
<?php
                
    NavBar::end();
    
    ?>
    <div class="container">
    
        <?= Breadcrumbs::widget([
            //'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

<style>
#mySidenav a {
  position: absolute; /* Position them relative to the browser window */
  left: -50px; /* Position them outside of the screen */
  transition: 0.3s; /* Add transition on hover */
  padding: 15px; /* 15px padding */
  width: 100px; /* Set a specific width */
  text-decoration: none; /* Remove underline */
  font-size: 20px; /* Increase font size */
  color: white; /* White text color */
  border-radius: 0 10px 10px 0; /* Rounded corners on the top right and bottom right side */
}

#mySidenav a:hover {
  left: 0; /* On mouse-over, make the elements appear as they should */
}

/* The about link: 20px from the top with a green background */
#bus_index {
  top: 60px;
  background-color: #4CAF50;
}

#route-stop-type_index {
  top: 120px;
  background-color: #4CAF50;
  /* background-color: #2196F3; Blue */
}

#route-stop-type_form {
  top: 209px;
  background-color: #4CAF50;
  /* background-color: #f44336; Red */
}

#site_login {
  top: 270px;
  background-color: #4CAF50;
  /* background-color: #555 Light Black */
}
#customer_create {
  top: 330px;
  background-color: #4CAF50;
  /* background-color:#555; */
}
#customer_profile {
  top: 80px;
  /* background-color: #2196F3; Blue */
}

</style>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
// $('.btn-expand-collapse').click(function(e) {
// 				$('.navbar-primary').toggleClass('collapsed');
// });
</script>

