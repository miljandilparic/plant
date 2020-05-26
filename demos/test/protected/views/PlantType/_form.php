<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'growth_speed_per_minute'); ?>
        <?php echo $form->numberField($model, 'growth_speed_per_minute'); ?>
        <?php echo $form->error($model, 'growth_speed_per_minute'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'volume'); ?>
        <?php echo $form->numberField($model, 'volume'); ?>
        <?php echo $form->error($model, 'volume'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->