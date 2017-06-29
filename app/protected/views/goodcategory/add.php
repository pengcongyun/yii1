<?php
/* @var $this GoodcategoryController */

$this->breadcrumbs=array(
	'Goodcategory'=>array('/goodcategory'),
	'Add',
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

    <div class="row">
        <?php echo $form->labelEx($model,'商品分类名'); ?>
        <?php echo $form->textField($model,'cate_name'); ?>
        <?php echo $form->error($model,'cate_name'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
