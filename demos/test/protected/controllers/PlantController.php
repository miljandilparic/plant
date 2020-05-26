<?php

class PlantController extends Controller
{
    private $_model;
    public function actionIndex()
    {
        $model= new Plant();
        if(isset($_POST['Plant']))
        {
            $model->attributes = $_POST['Plant'];
            if($model->save())
                $this->redirect(['plant/index']);
        }

        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionPlantGrowth()
    {
        $html = "";
        $incomplete_plants = Plant::model()->findAll(['condition' => 'current_growth < 100']);
        $plants = Plant::model()->findAll();

        foreach ($plants as $plant) {
            if($plant->current_growth < 100)
            {
                $growth_unit = $plant->plant_type->growth_speed_per_minute;
                $plant->current_growth += $growth_unit;
                if($plant->current_growth > 100)
                {
                    $plant->current_growth = 100;
                }
                $plant->save();
            }
            $html .= "<div>".$plant->plant_type->name."(ID: ".$plant->id.") | growth: ".$plant->current_growth."</div>";
        }
        
        if(!empty($plants) && empty($incomplete_plants))
        {
            $html .= "<div><b>All plants growth is 100</b></div>";
        }
        if(empty($plants))
        {
            $html .= "<div><b>No plants!</b></div>";
        }

        echo CJSON::encode(['html' => $html]);
    }
    public function actionUpdate()
    {
        $model=$this->loadModel();
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['Plant']))
        {
            $model->attributes=$_POST['Plant'];
            if($model->save())
                $this->redirect(['plant/index']);
        }

        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionDelete()
    {
        $this->loadModel()->delete();
        $this->redirect(['plant/index']);
    }
    
    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Plant::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
    
    public function actionReports()
    {
        $plant_types = PlantType::model()->findAll();
        $mature_plants_grouped_by_volume_desc = Plant::model()->findAll([
            'condition' => 't.current_growth=100',
            'join' => ' INNER JOIN plant_types pt ON pt.id = t.plant_type_id',
            'order' => 'pt.volume DESC'
        ]);
        $warehouses = Warehouse::model()->findAll();
        $mature_plants_not_in_warehouse = Plant::model()->findAll([
            'condition' => 't.current_growth=100 and t.warehouse_id is null',
        ]);
        $plant_types = PlantType::model()->findAll();
        $plants_order_by_current_growth = Plant::model()->findAll([
            'order' => 'current_growth DESC'
        ]);
        $this->render('reports', array(
            'plant_types' => $plant_types,
            'mature_plants_grouped_by_volume_desc' => $mature_plants_grouped_by_volume_desc,
            'warehouses' => $warehouses,
            'mature_plants_not_in_warehouse' => $mature_plants_not_in_warehouse,
            'plants_order_by_current_growth' => $plants_order_by_current_growth
        ));
    }
}
