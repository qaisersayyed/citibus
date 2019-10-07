<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<head>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<script>
document.getElementById("CHANNEL_ID").style.display = "none";


</script>

Welcome <?php echo $name; ?><br>
Amount is: <?php echo $amount; ?>








<div class="form">
<?php $form = ActiveForm::begin([
          'method' => 'post',
         'action' => Url::to(['bus-seats/paymentaction'])
    ]); ?>

<div class="form-group">
		<?= Html::label('ORDER_ID') ?>
			<input class="form-control"  id="ORDER_ID" tabindex="1" maxlength="20" size="20"
			name="ORDER_ID" autocomplete="off"
			value="<?php echo  "ORDS" . rand(10000,99999999)?>">  
		<div>
		<div class="form-group">
			<?= Html::label('CUST_ID') ?>

			<input class="form-control"  id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $name; ?>"></td>
						
		</div>
		<div class="form-group">
			<?= Html::label('INDUSTRY_TYPE_ID') ?>
			<input class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
		</div>
		<div class="form-group">
			<?= Html::label('CHANNEL_ID') ?>

			<input class="form-control"  id="CHANNEL_ID" tabindex="4" maxlength="12"
			size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
		</div>
		<div class="form-group">
			<?= Html::label('TXN_AMOUNT') ?>
			<input class="form-control" title="TXN_AMOUNT" tabindex="10"
					type="text" name="TXN_AMOUNT"
					value=<?php echo $amount ?> >
		<div class="form-group">
			<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
		</div>
</div>

        

    <?php ActiveForm::end(); ?>
	<div>