<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'username'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>

    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'password'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo CHtml::activeLabel($model,'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha'); ?>
                <?php echo CHtml::activeTextField($model,'verifyCode'); ?>
            </div>
            <div class="hint">Please enter the letters as they are shown in the image above.
                <br/>Letters are not case-sensitive.</div>
            <?php echo $model->error($model,'verifyCode'); ?>
        </div>
    <?php endif; ?>

    <div class="row submit">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div>
