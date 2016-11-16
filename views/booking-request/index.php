<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Booking Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right" style="padding-bottom:20px">
        <?= Html::a('Create Booking Request', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'UserID',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->user->fullName;
                },
            ],
            'RequestedOn',
            'StartTime',
            'EndTime',
            // 'Reason:ntext',
            // 'Booking_Status',
            // 'Additional_Info:ntext',
            // 'Last_Updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
