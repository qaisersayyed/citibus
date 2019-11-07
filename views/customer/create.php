<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Sign Up';

?>
<div class="customer-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
