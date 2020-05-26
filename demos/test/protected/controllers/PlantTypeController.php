<?php

class PlantTypeController extends Controller
{
    private $_model;
    public function actionIndex()
    {
        $model= new PlantType();
        if(isset($_POST['PlantType']))
        {
            $model->attributes=$_POST['PlantType'];
            if($model->save())
                $this->redirect(['plantType/index']);
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
        if(isset($_POST['PlantType']))
        {
            $model->attributes=$_POST['PlantType'];
            if($model->save())
                $this->redirect(['plantType/index']);
        }

        $this->render('view',array(
            'model'=>$model,
        ));
    }

    public function actionDelete()
    {
        $this->loadModel()->delete();
        $this->redirect(['plantType/index']);
    }
    
    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=PlantType::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
}
