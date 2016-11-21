<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Users;
use app\components\ResetProfilePasswordForm;
use app\components\AdminLogin; 

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['login'])->send();
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new AdminLogin();
        if (!Yii::$app->user->isGuest) 
        {
            $userDetails = Users::findIdentity(Yii::$app->user->id);
            if (isset($userDetails))
            {
                $this->redirect(['/users'])->send();
            } 
            else 
            {
                return $this->render('login', [
                        'model' => $model,
                ]);
            }
        } 
        else 
        {
            if(!empty($_POST))
            {
                $post = $_POST['AdminLogin'];
                if($post["UserName"] != "" && $post["Password"] != "")
                {
                    $model->UserName = $post["UserName"];
                    $model->Password = $post["Password"];
                    if ($model->login()) 
                    {
                        $userDetails = Users::findIdentity(Yii::$app->user->id);
                        if (isset($userDetails)) 
                        {
                            $this->redirect(['/users'])->send();
                        } 
                        else 
                        {
                            return $this->render('login', [
                                    'model' => $model,
                            ]);
                        }
                    } 
                    else 
                    {
                        return $this->render('login', [
                                'model' => $model,
                        ]);
                    }
                }
            }
            else
            {
                return $this->render('login', [
                                'model' => $model,
                        ]);
            }
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionResetPassword($hash, $id)
    {
        $resetpasswordmodel = new ResetProfilePasswordForm();
        if ($resetpasswordmodel->load(Yii::$app->request->post())) 
        {
            $user = Users::findIdentity($id);
            $user->Password = md5($resetpasswordmodel->changepassword);
            $user->save();
            $this->redirect(['/users'])->send();
        }

        return $this->render('ResetProfilePassword', [
            'resetpasswordmodel' => $resetpasswordmodel
        ]);
    }

    public function actionSignup()
    {
        $model = new Users();
        if($model->load(Yii::$app->request->post())) 
        {
            $model->PrivilegeID = 3;
            $model->save();
            return $this->redirect(['/users'])->send();
        } 
        else 
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
