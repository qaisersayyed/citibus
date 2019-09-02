<?php 

namespace app\models;

use Yii;
use yii\base\Model;

class Home extends Model{
    public $from;
    public $to;

    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['from', 'to'], 'string', 'max' => 25],
           
        ];
    }

    public function attributeLabels()
    {
        return [
            'from' => 'From',
            'to' => 'To',
            
        ];
    }
    public function getStops()
    {
        return $this->hasOne(Stops::className(), ['stops_id' => 'stops_id']);
    }


}