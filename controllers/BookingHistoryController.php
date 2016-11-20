<?php

namespace app\controllers;

use Yii;
use app\models\BookingRequest;
use app\models\BookingRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookingRequestController implements the CRUD actions for BookingRequest model.
 */
class BookingHistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BookingRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookingRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookingHistory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = BookingRequest::find()->where(['RequestID' => $id])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}