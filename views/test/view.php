<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\BusRoute */

//$this->title = $model->route_id;
echo 'hleloo';

$this->widget('application.extensions.qrcode.QRCode', array(
    'content' => 'http://google.com/VH0001', // qrcode data content
    'filename' => 'qrcode.png', // image name (make sure it should be .png)
    'width' => '150', // qrcode image height 
    'height' => '150', // qrcode image width 
    'encoding' => 'UTF-8', // qrcode encoding method 
    'correction' => 'H', // error correction level (L,M,Q,H)
    'watermark' => 'No' // set Yes if you want watermark image in Qrcode else 'No'. for 'Yes', you need to set watermark image $stamp in QRCode.php
));



?>