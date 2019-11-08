<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="/js/jquery-1.12.4.min.js">\x3C/script>')
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <?php $this->beginBody() ?>

  <div class="wrap">
    <div class="wrap">

      <nav class="navbar navbar-custom navbar-fixed-top" style="background-color: #143D59; min-height: 70px;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar" style="color:#F4B41A;"><i class="material-icons" style=" font-size:35px">
                  menu
                </i></span>
            </button>
            <a class="navbar-left" href="#">
              <img alt="CitiBus" src="http://localhost/citibus/web/logos/logo-white.png" style="color:#F4B41A; height:62px; width:auto; padding-top:10px; padding-bottom:auto; padding-left:30px">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href='http://localhost/citibus/web/route-stop-type/form'><i class="material-icons" style="color:#F4B41A; font-size:30px">
                    search
                  </i></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="color:#F4B41A; font-size:30px">
                    directions_bus
                  </i> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href='http://localhost/citibus/web/bus/index'>Buses</a></li>
                  <li><a href='http://localhost/citibus/web/route-stop-type/index'>Route Stop</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="color:#F4B41A; font-size:30px">account_circle</i> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href='http://localhost/citibus/web/site/login'>Log In</a></li>
                  <li><a href='http://localhost/citibus/web/customer/create'>Sign Ups</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
      </nav>

      <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
      </div>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href='http://localhost/citibus/web/route-stop-type/form'><i class="material-icons" style="color:#F4B41A; font-size:30px">
search
</i></a></li>
        <?php if (Yii::$app->user->isGuest) {
      ?>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="color:#F4B41A; font-size:30px">account_circle</i> <span class="caret"></span></a>
          
          <ul class="dropdown-menu" style="background-color:#F4B41A; color:white">
            <li style="font-size:18px"><a href='http://localhost/citibus/web/site/login'>Log In</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/customer/create'>Sign Up</a></li>
          </ul>
        </li>
          <?php }else{
      ?>  
      <li><a href='http://localhost/citibus/web/tickets/alltickets'><i class="material-icons" style="color:#F4B41A; font-size:30px">
      confirmation_number
</i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="color:#F4B41A; font-size:30px">account_circle</i> <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color:#F4B41A; color:white">
            <li style="font-size:18px"><a href='http://localhost/citibus/web/customer/profile'>Profile</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/site/logout' data-method="post">Log Out</a></li>
          </ul>
          <?php }
      ?>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="color:#F4B41A; font-size:30px">
directions_bus
</i> <span class="caret"></span></a>
        <ul class="dropdown-menu"  style="background-color:#F4B41A; color:white" >
            <li style="font-size:18px"><a href='http://localhost/citibus/web/bus/'>Buses</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/route/'>Route</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/stops'>Stops</a></li>
          <!-- //  <li style="font-size:18px"><a href='http://localhost/citibus/web/route-stop/'>Route Stop</a></li> -->
            <li style="font-size:18px"><a href='http://localhost/citibus/web/bus-route/index'>Bus_Route</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/route-stop-type/index'>Route Stop type</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/customer'>Customers</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/employee'>Employees</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/users'>User</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/tickets'>Tickets</a></li>
            <li style="font-size:18px"><a href='http://localhost/citibus/web/transaction'>Transactions</a></li>
        </ul>
        </li>
      </ul> 
    </div>
    
    <!-- /.navbar-collapse -->
    
  </div><!-- /.container-fluid -->
</nav>
<div class="container">

            
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>


    </div>
    

                

        </div>

        <!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>