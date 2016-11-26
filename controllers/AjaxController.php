<?php 
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Users;
use app\components\AdminLogin; 
use yii\db\Query;


class AjaxController extends Controller
{

    public $enableCsrfValidation = false;

    public function actionMessage()
    {
        //var_dump($_POST["email"]); die;
        if($_POST["email"] != "")
        {
            if(AdminLogin::sendForgotPasswordMail($_POST['email']))
            {
                echo "Please check your email";
            }
            else
            {
                echo "Email Not found in the database. Please register";
            }

        }
        else
        {
            echo "Please enter your email";
        }
        return;
    }

    public function actionFillworkspace()
    {
        if($_POST["areaid"] != "")
        {
            $query = new Query;
            $query->select('WorkspaceID, Name')->from('Workspace')->where(['AreaID' => $_POST['areaid']]);
            $data = $query->all();
            $result = '<option value>Select Workspace</option>';
            foreach ($data as $key => $value) 
            {
                $result .= '<option value="'.$value['WorkspaceID'].'">'.$value['Name'].'</option>';
            }
            echo $result;
        }
        else
        {
            echo "Please enter AreaID";
        }
        return;
    }

    public function actionSignupform()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $check_username = Users::findByUserName($username);
        if(isset($check_username))
        {
            echo "Username must be unique";
            return;
        }
        $check_email = Users::findByEmail($email);
        if(isset($check_email))
        {
            echo "Email must be unique";
            return;
        }
        return;
    }

    public function actionBookreservation()
    {
        $list = $_POST['list'];
        
    }
}
