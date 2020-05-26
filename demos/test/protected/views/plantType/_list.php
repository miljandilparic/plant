<ul>
<?php foreach (PlantType::model()->findAll() as $plant_type) {?>
    <li>
        <?=$plant_type->name?>
        <?php echo CHtml::link('Update',array('plantType/update','id'=>$plant_type->id)); ?> |
	<?php echo CHtml::link('Delete',array('plantType/delete','id'=>$plant_type->id),array('class'=>'delete')); ?>
    </li>
<?php } ?>
</ul>