<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\forms\Register */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Login Form</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><!-- Sign in to start your session --></p>

        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group has-feedback">
            <?= Html::activeTextInput($model, 'UserName', ['class' => 'form-control', 'placeholder' => 'Enter UserName']) ?>
            <?= Html::error($model, 'UserName') ?>
        </div>

        <div class="form-group has-feedback">
            <?= Html::activePasswordInput($model, 'Password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) ?>
            <?= Html::error($model, 'Password') ?>
        </div>

        <div class="form-group ">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div><!-- /.col -->
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
