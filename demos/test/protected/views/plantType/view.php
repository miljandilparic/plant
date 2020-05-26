<?php
$this->breadcrumbs=array(
    'Create Plant type',
);
?>
<h3>Create Plant type:</h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<h3>List of Plant types:</h3>
<?php echo $this->renderPartial('_list', array('model'=>$model)); ?>