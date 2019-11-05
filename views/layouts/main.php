<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
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
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap" >
        <div class="container-fluid" >


            <?php
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
                ['label' => 'form', 'url' => ['/route-stop-type/form']],
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
            ?>
        </div>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
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