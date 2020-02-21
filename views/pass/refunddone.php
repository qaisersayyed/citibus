<?php
use yii\helpers\Html;
?>
<br>
<br>
<div class="alert alert-success">
  <h2><strong>Success!</strong></h2> <h4> Your money will be refunded in 5-6 business days..</h4>
</div>
<?= Html::a(
                    'Back Home',
                    ['route-stop-type/form'],
                    ['class' => 'btn btn-custom btn-sm', 'style' => 'background-color:#F4B41A; color:black']
                ); ?>
            </div>