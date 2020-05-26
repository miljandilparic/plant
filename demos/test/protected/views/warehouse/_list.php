<ul>
<?php foreach (Warehouse::model()->findAll() as $warehouse) {?>
    <li>
        <?=$warehouse->name . ' <b>volume:</b> ' . $warehouse->volume?>
        <?php echo CHtml::link('Update',array('warehouse/update','id'=>$warehouse->id)); ?> |
	<?php echo CHtml::link('Delete',array('warehouse/delete','id'=>$warehouse->id),array('class'=>'delete')); ?>
    </li>
<?php } ?>
</ul>