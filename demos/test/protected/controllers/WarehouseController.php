<?php

class WarehouseController extends Controller
{
    private $_model;
    public function actionIndex()
    {
        $model = new Warehouse;
        if(isset($_POST['Warehouse']))
        {
            $model->attributes = $_POST['Warehouse'];
            if($model->save())
                $this->redirect(['warehouse/index']);
        }

        $this->render('view',array(
            'model' => $model,
        ));
    }
    
    public function actionUpdate()
    {
        $model=$this->loadModel();
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['Warehouse']))
        {
            $model->attributes=$_POST['Warehouse'];
            if($model->save())
                $this->redirect(['warehouse/index']);
        }

        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionDelete()
    {
        $this->loadModel()->delete();
        $this->redirect(['warehouse/index']);
    }
    
    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Warehouse::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
}
