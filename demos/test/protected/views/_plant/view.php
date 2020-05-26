<?php
$this->breadcrumbs=array(
    'Create Plant',
);
?>
<h3>Create Plant:</h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?> </br>

<br>
<div>
    <button onclick="plantGrowth()">Start plant growth</button> 
    <button onclick="plantGrowthStop()"> Stop plant growth</button>
    <span id="list-status"></span>
</div>
<div id="plants-list"></div>
<br>
<h3>List of Plants:</h3>
<?php echo $this->renderPartial('_list'); ?>