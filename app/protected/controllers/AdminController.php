<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4 0004
 * Time: 10:45
 */
class AdminController extends Controller
{
    public $layout='admin';
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }
    //登录
    public function actionAdmin(){
        $res=Yii::app()->user->name;
        if($res!=="Guest"){
            $this->redirect(['admin/index']);
        }
        $model=new AdminForm();
        if(isset($_POST['AdminForm'])){
            $model->attributes=$_POST['AdminForm'];
            if($model->validate() && $model->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                $model->addError('password','用户名或者密码不正确');
            }
        }
        $this->render('admin',['model'=>$model]);
    }
    //退出
    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    //
    public function actionIndex(){
        $this->render('index');
    }
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }
}