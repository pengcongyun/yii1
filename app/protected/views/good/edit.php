<?php
/* @var $this GoodController */

$this->breadcrumbs=array(
	'Good'=>array('/good'),
	'Edit',
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

    <?php echo CHtml::activehiddenField($model,'id') ?>
    <div class="row">
        <?php echo $form->labelEx($model,'商品名称'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'商品图片'); ?>
        <?php echo CHtml::image($model->photo,'',['width'=>150,'hight'=>150]); ?>
        <br>
        <?php echo CHtml::activeFileField($model,'photo'); ?>
        <?php echo $form->error($model,'photo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'所属分类'); ?>
        <?php echo $form->DropDownList($model,'parent_id',$cate,array(
            'options'=>array(
                $model->parent_id=>array(
                    'selected'=>'selected'
                )))); ?>

        <?php echo $form->error($model,'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'商品描述'); ?>
        <?php echo $form->textField($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('编辑提交'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
