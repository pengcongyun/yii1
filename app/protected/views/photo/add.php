<?php
/* @var $this PhotoController */

$this->breadcrumbs=array(
	'Photo'=>array('/photo'),
	'Add',
);
?>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
//        'enableClientValidation'=>false,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions' => array('enctype'=>'multipart/form-data'),
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'商品图片'); ?>
        <?php echo CHtml::activeFileField($model,'photo[]', ['multiple' => true]); ?>
        <?php echo $form->error($model,'photo'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
