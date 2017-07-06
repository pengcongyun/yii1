<style>
    .row1 input{
        margin-left: 10px;
    }
</style>
<?php
/* @var $this GoodController */

$this->breadcrumbs=array(
	'Good'=>array('/good'),
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
        <?php echo $form->labelEx($model,'商品名称'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'商品图片'); ?>
        <?php echo CHtml::activeFileField($model,'photo'); ?>
        <?php echo $form->error($model,'photo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'所属分类'); ?>

        <?php echo $form->DropDownList($model,'parent_id',$cates); ?>

        <?php echo $form->error($model,'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'商品描述'); ?>
        <?php echo $form->textField($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'性别'); ?>
        <?php echo $form->radioButtonList($model,'sex',['1'=>'男','2'=>'女'],[
                'separator'=>'&nbsp;',      //间隔符
                'labelOptions'=>[
                    'class'=>'radiolabel',  //设置类
                    'style'=>'display:inline;color:red',
                 ]
            ])?>
        <?php echo $form->error($model,'sex'); ?>
    </div>

    <div class="row row1">
        <?php echo $form->labelEx($model,'爱好'); ?>
        <?php echo $form->checkBoxlist($model,'hobby',['1'=>'男球','2'=>'足球','4'=>'排球'],array('separator'=>'','labelOptions'=>array('style'=> "display: inline-block"))); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
