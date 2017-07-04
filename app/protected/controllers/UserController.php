<?php

class UserController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
	    $model=new User();
	    $data=$model->findAll();
//	    var_dump($data);exit;
		$this->render('index',['model'=>$data]);
	}
    //登录
    public function actionLogin(){
	    $res=Yii::app()->user->name;
	    if($res!=="Guest"){
	        $this->redirect(['User/index']);
        }
	    $model=new LoginForm();
	    if(isset($_POST['LoginForm'])){
            $model->attributes=$_POST['LoginForm'];
	        if(!$model->validate()){
                Yii::app()->user->setFlash('error', 'Permission denied.');
//                $this->redirect(Yii::app()->homeUrl);
            }else{
                $model->login($model);
                $this->redirect(Yii::app()->homeUrl);
            }
        }
	    $this->render('login',['model'=>$model]);
    }
    //删除
    public function actionDelete($id){
//        $model=new User;
        $model=User::model();
        $res=$model->deleteByPk($id);
        if($res===1){
            return $this->redirect(['User/index']);
        }else{
            var_dump(11);exit;
        }
    }
    //添加
    public function actionAdd(){
        $model=new User;
        if(isset($_POST['User'])){
            $model->username=$_POST['User']['username'];
            $model->password=md5($_POST['User']['password']);
            $model->last_ip=Yii::app()->request->userHostAddress;
            $model->last_time=time();
            $res=$model->save();
            if($res===true){
                $this->redirect(['/User/index']);
            }else{
                echo '失败';exit;
            }
        }
        $this->render('add',['model'=>$model]);
    }
    //修改
    public function actionEdit($id){
        $model=User::model();
        $row=$model->findByPk($id);
        if(isset($_POST['User'])){
            $model->id=$_POST['User']['id'];
            $model->username=$_POST['User']['username'];
            if(mb_strlen($_POST['User']['password'])===32){
                $model->password=$_POST['User']['password'];
            }else{
                $model->password=md5($_POST['User']['password']);
            }
            $res=$model->save();
            if($res===true){
                $this->redirect(['/User/index']);
            }else{
                echo '失败'.'<a href="http://www.peng.com/index.php?r=user/index">返回</a>';exit;
            }
        }
        $this->render('edit',['row'=>$row]);
    }
    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
*/
	public function actions()
	{
		// return external action classes, e.g.:
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
	}
	//退出
	public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}