<?php

namespace app\controllers;

use Yii;
use app\models\BookingRequest;
use app\models\BookingRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * BookingRequestController implements the CRUD actions for BookingRequest model.
 */
class BookingRequestController extends Controller
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
     * Displays a single BookingRequest model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BookingRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BookingRequest;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->RequestID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BookingRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->RequestID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BookingRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionConfirm($id)
    {
        $model = $this->findModel($id);
        $model->Booking_Status = 2;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionCancel($id)
    {
        $model = $this->findModel($id);
        $model->Booking_Status = 0;
        $model->save();
        return $this->redirect(['userhistory']);
    }

    public function actionUserhistory()
    {
        $userid = Yii::$app->user->id;
        if($userid)
        {
            $past_bookings = BookingRequest::find()->where(['UserID' => $userid])->andWhere('StartTime <= NOW()')->all();
            $future_bookings = BookingRequest::find()->where(['UserID' => $userid])->andWhere('StartTime > NOW()')->all();
            $mapping = [];
            foreach ($past_bookings as $key => $value) 
            {
                $temp_map = $value->workspaces;
                if(!isset($mapping[$value->RequestID]))
                {
                    $mapping[$value->RequestID] = [];
                }
                foreach ($temp_map as $key1 => $value1) 
                {
                   $mapping[$value->RequestID][] = $value1->Name;
                }
            }
            foreach ($future_bookings as $key => $value) 
            {
                $temp_map = $value->workspaces;
                if(!isset($mapping[$value->RequestID]))
                {
                    $mapping[$value->RequestID] = [];
                }
                foreach ($temp_map as $key1 => $value1) 
                {
                   $mapping[$value->RequestID][] = $value1->Name;
                }
            }
            return $this->render('user-history', [
                'past_bookings' => $past_bookings,
                'future_bookings' => $future_bookings,
                'mapping' => $mapping,
            ]);
        }
        else
        {
            return $this->redirect(['users/home']);
        }

    }

    public function actionHistory()
    {
        $all_bookings = BookingRequest::find()->where(['Booking_Status' => array(0,2)])->orderBy('RequestedOn')->all();
        $mapping = [];
        foreach ($all_bookings as $key => $value) 
        {
            $temp_map = $value->workspaces;
            if(!isset($mapping[$value->RequestID]))
            {
                $mapping[$value->RequestID] = [];
            }
            foreach ($temp_map as $key1 => $value1) 
            {
               $mapping[$value->RequestID][] = $value1->Name;
            }
        }
        return $this->render('history', [
            'all_bookings' => $all_bookings,
            'mapping' => $mapping,
        ]);
    }

    public function actionBookingavail()
    {
        $result = [];
        $start_time = '';
        $end_time = '';
        $area_id = '';
        $workspace_id = '';
        $reason = '';

        if(!empty($_POST))
        {
            $reason = $_POST['Reason'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            $area_id = $_POST['AreaID'];
            $workspace_id = $_POST['WorkspaceID'];


            $query = new Query;
            $query->select('w.*, a.Name as AreaName')->distinct()
                  ->from('Workspace w')
                  ->innerJoin('RequestBookingPairing rbp', 'w.WorkspaceID = rbp.WorkspaceID')
                  ->innerJoin('BookingRequest br', 'br.RequestID = rbp.RequestID')
                  ->innerJoin('Area a', 'a.AreaID = w.AreaID')
                  ->where("(br.StartTime > '".$start_time."' AND br.StartTime > '".$end_time."') OR (br.EndTime < '".$start_time."' AND br.EndTime < '".$end_time."')")
                  ->andWhere(['w.IsActive' => 1, 'a.IsActive' => 1]);
            if($_POST['AreaID'] != '')
            {
                $query->andWhere(['w.AreaID' => $_POST['AreaID']]);
            }
            if($_POST['WorkspaceID'] != '')
            {
                $query->andWhere(['w.WorkspaceID' => $_POST['WorkspaceID']]);
            }
            $result = $query->all();
            // echo "<pre>";
            // var_dump($result);
            // die;
        }

        return $this->render('bookingavail', [
            'result' => $result,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'area_id' => $area_id,
            'workspace_id' => $workspace_id,
            'reason' => $reason
        ]);
    }

    /**
     * Finds the BookingRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookingRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookingRequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
