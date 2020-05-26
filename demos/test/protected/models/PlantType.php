<?php
class PlantType extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'plant_types';
    }

    public function rules()
    {
        return array(
            array('name, growth_speed_per_minute, volume', 'required'),
            ['growth_speed_per_minute', 'checkGrowthSpeedPerMinute'],
            ['volume', 'checkVolume']
        );
    }

    public function checkGrowthSpeedPerMinute()
    {
        if($this->growth_speed_per_minute < 0 || $this->growth_speed_per_minute > 100)
        {
            $this->addError('growth_speed_per_minute', 'Maximum growth per minute can be 100!');
        }
    }

    public function checkVolume()
    {
        if($this->volume < 0)
        {
            $this->addError('volume', 'Volume must be greater than 0!');
        }
    }
    
    public function relations()
    {
        return array(
            'plants' => array(self::HAS_MANY, 'Plant', 'plant_type_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'growth_speed_per_minute' => 'Growth speed per minute',
            'volume' => 'Volume'
        );
    }
    
    public function beforeDelete()
    {
        if(!empty($this->plants))
        {
            throw new CHttpException(400, 'First you need to remove all plants with this type, and only then the type !!!');
        }
        return parent::beforeDelete();
    }
}