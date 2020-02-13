<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bus */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'method' => 'get',
     
    ]); ?>
    <div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >							
          <h4 >License_plate </h4><input  id= "license_plate"  name="license_plate" value=""  >
        </div> 
      </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >No of Seats </h4><input  id= "no_of_seats" name="no_of_seats" value=""  >   
        </div>
        </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >Pattern </h4><input  id= "pattern" name="pattern" value=""  >        
        </div>
      </div>							
	  </div>

    <div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >							
          <h4 >License_plate </h4><input  id= "license_plate"  name="license_plate" value=""  >
        </div> 
      </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >No of Seats </h4><input  id= "no_of_seats" name="no_of_seats" value=""  >   
        </div>
        </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >Pattern </h4><input  id= "pattern" name="pattern" value=""  >        
        </div>
      </div>							
	  </div>

    <div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >							
          <h4 >License_plate </h4><input  id= "license_plate"  name="license_plate" value=""  >
        </div> 
      </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >No of Seats </h4><input  id= "no_of_seats" name="no_of_seats" value=""  >   
        </div>
        </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >Pattern </h4><input  id= "pattern" name="pattern" value=""  >        
        </div>
      </div>							
	  </div>

    <div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >							
          <h4 >License_plate </h4><input  id= "license_plate"  name="license_plate" value=""  >
        </div> 
      </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >No of Seats </h4><input  id= "no_of_seats" name="no_of_seats" value=""  >   
        </div>
        </div>
      <div class=row style="display:inline-block;margin:10px">	
        <div  >
          <h4 >Pattern </h4><input  id= "pattern" name="pattern" value=""  >        
        </div>
      </div>							
	  </div>
		
		<div class="col-md-2">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'background-color:#F4B41A']) ?>

		</div>

	</div>													

<?php ActiveForm::end(); ?>
</div>





<div class="bus-form" style="width:50%">
   
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
             <div class="form-holder ">
                <div class="input-field ">
                    <?= $form->field($model, 'license_plate',['options' => ['id' => 'license_plate']])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="input-field ">
                    <?= $form->field($model, 'no_of_seats',['options' => ['id' => 'no_of_seats']])->textInput() ?>
                </div>
                <div class="input-field ">
                    <?= $form->field($model, 'pattern',['options' => ['id' => 'pattern']])->textInput(['maxlength' => true]) ?>
                </div>
                <div style="display:inline-block;float:right;padding:10px">
                    <i style ="background-color:#F4B41A;" class="material-icons remove"> remove</i>
                </div>
            </div>

            <div class="form-holder-append"></div>
            <div class="row" >
                    <div  style="float:right;padding:10px">
                          <i style ="background-color:#F4B41A;" class="material-icons add"> add</i>
                    </div>
            </div>
     </div>
        <div class=row>      
            <div class="form-group" style="float:right">
                <?= Html::submitButton('Save', ['class' => 'btn btn-custom', 'style' => 'background-color:#F4B41A']) ?>
            </div>    
        </div> 
         
            <?php ActiveForm::end(); ?>
        
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

 var id_count = 1;
//  if($('add').clicked){
  $('.add').on('click', function() {    
    var source = $('.form-holder:first'), clone = source.clone();
    clone.find(':input').attr('name', function(i, val) {
      return val + id_count;
    //  
      
    });
    clone.appendTo('.form-holder-append');
    id_count++;
    console.log(id_count);
   
    // var inputVal = document.getElementById("bus-pattern").value;
            
    //         // Displaying the value
    //         alert(inputVal);
  });

// Removing Form Field
$('body').on('click', '.remove', function() {
    var closest = $(this).closest('.form-holder').remove();
    //  id_count =  id_count - 1;
    //  console.log(id_count);
  });


</script>

<style>

.add, .remove {
  display: block;
  cursor: pointer;
  
}
.remove {
  display: none; 
}
.form-holder-append .remove {
  display: block;
}

</style>