<?php
class Plant extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'plants';
    }

    public function rules()
    {
        return array(
            array('plant_type_id, current_growth', 'required'),
            array('warehouse_id', 'length'),
            ['warehouse_id', 'checkWarehouse'],
            ['current_growth', 'checkCurrentGrowth']
        );
    }

    public function checkWarehouse()
    {
        if($this->current_growth < 100 && !empty($this->warehouse_id))
        {
            $this->addError('warehouse_id', 'You cannot place a plant that is not ripe in storage !');
        }
        
        if(!empty($this->warehouse_id) && $this->plant_type->volume > $this->warehouse->getFreeVolume())
        {
            $this->addError('warehouse_id', 'In warehouse there is not enough space for this type of plant !');
        }
    }
    
    public function checkCurrentGrowth()
    {
        if($this->current_growth < 0 || $this->current_growth > 100)
        {
            $this->addError('current_growth', 'Max current growth can be 100!');
        }
    }
    
    public function relations()
    {
        return array(
            'plant_type' => array(self::BELONGS_TO, 'PlantType', 'plant_type_id'),
            'warehouse' => array(self::BELONGS_TO, 'Warehouse', 'warehouse_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'plant_type_id' => 'Plant type',
            'current_qrowth' => 'Current growth',
            'warehouse_id' => 'Warehouse'
        );
    }
    
    public function getAllTypes()
    {
        $plant_types = [];
        foreach(PlantType::model()->findAll() as $plant_type)
        {
            $plant_types[$plant_type->id] = $plant_type->name;
        }
        return $plant_types;
    }
    
    public function getAllWarehouses()
    {
        $warehouses = [null => 'Choose'];
        foreach(Warehouse::model()->findAll() as $warehouse)
        {
            $warehouses[$warehouse->id] = $warehouse->name;
        }
        return $warehouses;
    }
}