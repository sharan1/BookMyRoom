<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\forms\Register */
/* @var $form yii\widgets\ActiveForm */
//$this->registerCSSFile()
?>
<!--Background image-
<style type="text/css">
-->

  <style type="text/css">
body
 {
     background-image: url(images/room.jpg);
     background-repeat: no-repeat;
     background-size:cover;
 }
 </style>

<div class="login-box">
   <!-- <div class="login-logo">
        <a href=""><b>Login Form</b></a>
    </div>
    /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">LogIn</p>

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

<!-- Sign Up and Forgot Password -->
 <div class="container" >
  <span class="psw"> Forgot <a href="#">password?</a></span>
  </div>




        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>