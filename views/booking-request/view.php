<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BookingRequest */

$this->title = "Request #".$model->RequestID;
$this->params['breadcrumbs'][] = ['label' => 'Booking Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->RequestID;
?>
<div class="booking-request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pull-right" style="padding-bottom:20px">
        <?= Html::a('Update', ['update', 'id' => $model->RequestID], ['class' => 'btn btn-primary', 'style' => 'margin-right:4px']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RequestID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'RequestID',
            [
                'attribute' => 'UserID',
                'format' => 'raw',
                'value' => $model->user->fullName,
            ],
            'RequestedOn',
            'StartTime',
            'EndTime',
            'Reason:ntext',
            'Booking_Status',
            'Additional_Info:ntext',
            'Last_Updated',
        ],
    ]) ?>

</div>
