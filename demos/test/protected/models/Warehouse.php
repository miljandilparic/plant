<?php
class Warehouse extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'warehouses';
    }

    public function rules()
    {
        return array(
            array('name, volume', 'required'),
            ['volume', 'checkVolume']
        );
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
        return [
            'plants' => array(self::HAS_MANY, 'Plant', 'warehouse_id'),
            'mature_plants' => array(self::HAS_MANY, 'Plant', 'warehouse_id', 'condition' => 'current_growth=100')
        ];
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'warehouse_id' => 'Warehouse'
        );
    }

    public function getFreeVolume()
    {
        $busy_volume = 0;
        foreach($this->plants as $plant)
        {
            $busy_volume += $plant->plant_type->volume;
        }
        return $this->volume - $busy_volume;
    }
    
    public function getBusyInPercent()
    {
        $busy_volume = 0;
        foreach($this->plants as $plant)
        {
            $busy_volume += $plant->plant_type->volume;
        }
        return $this->volume > 0 ? number_format(100 * $busy_volume / $this->volume, 2) : 0;
    }
    
    public function beforeDelete()
    {
        if(!empty($this->plants))
        {
            throw new CHttpException(400, 'The plants should be removed from the warehouse first, and then the warehouse !!!');
        }
        return parent::beforeDelete();
    }
}