<?php
/* @var $this VideoController */

$this->breadcrumbs=array(
	'Video'=>array('/video'),
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
        <?php echo CHtml::activeFileField($model,'video'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
