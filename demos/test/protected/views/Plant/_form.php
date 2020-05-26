<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'plant_type_id'); ?>
        <?php echo $form->dropDownList($model, 'plant_type_id', $model->getAllTypes()); ?>
        <?php echo $form->error($model, 'plant_type_id'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'warehouse_id'); ?>
        <?php echo $form->dropDownList($model, 'warehouse_id', $model->getAllWarehouses()); ?>
        <?php echo $form->error($model, 'warehouse_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'current_growth'); ?>
        <?php echo $form->numberField($model, 'current_growth'); ?>
        <?php echo $form->error($model, 'current_growth'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->