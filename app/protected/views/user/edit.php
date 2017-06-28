<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($row); ?>


    <?php echo CHtml::activehiddenField($row,'id') ?>

    <div class="row">
        <?php echo CHtml::activeLabel($row,'用户名'); ?>
        <?php echo CHtml::activeTextField($row,'username') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($row,'密码'); ?>
        <?php echo CHtml::activePasswordField($row,'password') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('修改'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div>
