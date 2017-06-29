<?php
/* @var $this GoodcategoryController */

$this->breadcrumbs=array(
	'Goodcategory'=>array('/goodcategory'),
	'Edit',
);
?>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    <?php echo $form->hiddenField($model,'id'); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'商品分类名'); ?>
        <?php echo $form->textField($model,'cate_name'); ?>
        <?php echo $form->error($model,'cate_name'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('修改'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
