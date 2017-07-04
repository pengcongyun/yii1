<?php

class PhotoController extends Controller
{
    public $layout='user';
    public $dish;
    public function init(){
        parent::init();
        $this->dish = new Dish();
    }
	public function actionIndex()
	{
	    $model=Photo::model()->findAll();
		$this->render('index',['model',$model]);
	}
    public function actionAdd(){
	    $model=new Photo;
	    if(isset($_POST['Photo'])){
            var_dump($_FILES);exit;
        }
        $this->render('add',['model'=>$model]);
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

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}