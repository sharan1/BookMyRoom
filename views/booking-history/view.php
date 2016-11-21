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
