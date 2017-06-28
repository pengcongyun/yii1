<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'用户名'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'密码'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div>
