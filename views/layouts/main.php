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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap" >
        <div class="wrap" >

        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">CitiBus</a>

        <!-- Links -->
        <ul class="navbar-nav" style="margin-left:auto; margin-right:0px; padding-right:30px;">
            <li class="nav-item" style="padding-right:10px;">
            <a class="nav-link" href='http://localhost/citibus/web/route-stop-type/form'><i class="material-icons">
search
</i></a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown" style="padding-right:10px;">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <i class="material-icons md-48">
directions_bus
</i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href='http://localhost/citibus/web/bus/index'>Buses</a>
                <a class="dropdown-item" href='http://localhost/citibus/web/route-stop-type/index'>Route Stop</a>
            </div>
            </li>

            <li class="nav-item dropdown" style="padding-right:10px;">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <i class="material-icons md-48">account_circle</i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href='http://localhost/citibus/web/site/login'>Log In</a>
                <a class="dropdown-item" href='http://localhost/citibus/web/customer/create'>Sign Up</a>
            </div>
            </li>
        </ul>
        </nav>
            
            
            <!-- <?php
            NavBar::begin([
                'brandLabel' => 'CitiBus',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => " navbar navbar-expand-sm bg-dark navbar-dark fixed-top",
                ],
            ]);

            $menuItems = [
                ['label' => 'bus', 'url' => ['/bus/index']],
                ['label' => 'route-stop-type', 'url' => ['/route-stop-type/index']],
                ['label' => 'Search', 'url' => ['/route-stop-type/form']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                $menuItems[] = ['label' => 'Sign Up', 'url' => ['/customer/create']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email_id . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>';

                $menuItems[] = ['label' => 'Profile', 'url' => ['customer/profile']];
            }

            echo Nav::widget([
                'items' => $menuItems,
                'options' => ['class' => 'navbar-nav ','style'=>'margin-left:auto' ],
                

            ]);
            NavBar::end();
            ?> -->
        </div>

        <div class="container">
            
            <?= Alert::widget() ?>
            <?= $content ?>
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