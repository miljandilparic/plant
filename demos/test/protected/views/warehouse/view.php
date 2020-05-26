<?php
$this->breadcrumbs=array(
    'Warehouse',
);
?>
<h3>Create Warehouse:</h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<h3>List of Warehouses:</h3>
<?php echo $this->renderPartial('_list', array('model'=>$model)); ?>