<?php

class GoodcategoryController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
	    $model=Goodcategory::model()->findAll();
		$this->render('index',['model'=>$model]);
	}
    public function actionAdd(){
	    $model=new Goodcategory;
	    if(isset($_POST['Goodcategory'])){
	        $model->cate_name=$_POST['Goodcategory']['cate_name'];
	        $res=$model->save();
            if($res===true){
                $this->redirect(['/goodcategory/index']);
            }else{
                echo '添加失败';exit;
            }
        }
        $this->render('add',['model'=>$model]);
    }
    public function actionDelete($id){
        $model=Goodcategory::model();
        $res=$model->findByPk($id);
        if(empty($res)){
            echo '数据出错了'.'<a href="http://www.peng.com/index.php?r=goodcategory/index">返回列表页</a>';exit;
        }
        $re=$model->deleteByPk($id);
        if($re===1){
            $this->redirect(['/goodcategory/index']);
        }else{
            echo '数据出错了'.'<a href="http://www.peng.com/index.php?r=goodcategory/index">返回列表页</a>';exit;
        }
    }
    public function actionEdit($id){
        $model=Goodcategory::model()->findByPk($id);
        if(isset($_POST['Goodcategory'])){
            $model->id=$_POST['Goodcategory']['id'];
            $model->cate_name=$_POST['Goodcategory']['cate_name'];
            $res=$model->save();
            if($res===true){
                $this->redirect(['/goodcategory/index']);
            }else{
                echo '修改失败'.'<a href="http://www.peng.com/index.php?r=goodcategory/index">返回列表页</a>';exit;
            }
        }
        $this->render('/goodcategory/edit',['model'=>$model]);
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