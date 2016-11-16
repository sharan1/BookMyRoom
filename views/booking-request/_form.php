<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\BookingRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UserID')->dropdownList(Users::find()->select(['FirstName', 'UserID'])->indexBy('UserID')->column(), ['prompt' => "Select User"]); ?>

    <?= $form->field($model, 'RequestedOn')->textInput() ?>

    <?= $form->field($model, 'StartTime')->textInput() ?>

    <?= $form->field($model, 'EndTime')->textInput() ?>

    <?= $form->field($model, 'Reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Booking_Status')->textInput() ?>

    <?= $form->field($model, 'Additional_Info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Last_Updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
