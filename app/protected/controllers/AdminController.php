<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4 0004
 * Time: 10:45
 */
class AdminController extends Controller
{
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
    public function actionAdmin(){
        $model=new AdminForm();
        if(isset($_POST['AdminForm'])){
            $model->attributes=$_POST['AdminForm'];
            if($model->validate())
            {
                //写逻辑登录
                $model->login($model);
                $this->redirect(Yii::app()->homeUrl);
            }else{
                Yii::app()->user->setFlash('error', 'Permission denied.');
            }
        }
        $this->render('admin',['model'=>$model]);
    }
}