<ul>
<?php foreach (Plant::model()->findAll() as $plant) {?>
    <li>
        <?=$plant->plant_type->name . ' ' . $plant->current_growth?>
        <?php echo CHtml::link('Update',array('plant/update','id'=>$plant->id)); ?> |
	<?php echo CHtml::link('Delete',array('plant/delete','id'=>$plant->id),array('class'=>'delete')); ?>
    </li>
<?php } ?>
</ul>