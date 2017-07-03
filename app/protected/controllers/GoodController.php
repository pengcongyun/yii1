<?php

class GoodController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
        $model=Good::model()->findAll();
        foreach ($model as $k=>$v){
            $model[$k]['parent_id']=Goodcategory::model()->findByPk($v->parent_id)->cate_name;
        }
		$this->render('index',['model'=>$model]);
	}
    public function actionAdd(){
	    $model=new Good;
	    if(isset($_POST['Good'])){
	        $photo=CUploadedFile::getInstance($model,'photo');
            if(is_object($photo)&&get_class($photo) === 'CUploadedFile'){   // 判断实例化是否成功
                $model->photo = './assets/upfile/file_'.time().'_'.rand(0,9999).'.'.$photo->extensionName;
//                $model->photo = $model->photo_save;
                $photo->saveAs($model->photo);
            }
            $model->name=$_POST['Good']['name'];
            $model->parent_id=$_POST['Good']['parent_id'];
            $model->description=$_POST['Good']['description'];
            $res=$model->save();
            if($res===true){
                $this->redirect(['/good/index']);
            }else{
                echo '添加失败'.'<a href="http://www.peng.com/index.php?r=good/index">返回列表页</a>';exit;
            }
        }
        $cates=Goodcategory::model()->findAll();
	    foreach ($cates as $v){
	        $cate[$v->id]=$v->cate_name;
        }
        $this->render('/good/add',['model'=>$model,'cates'=>$cate]);
    }

    public function actionDelete($id){
        $model=Good::model();
        $res=$model->findByPk($id);
        if(empty($res)){
            echo '数据出错了'.'<a href="http://www.peng.com/index.php?r=good/index">返回列表页</a>';exit;
        }
        if(!empty($res->photo)){
            unlink($res->photo);
        }
        $re=$model->deleteByPk($id);
        if($re===1){
            $this->redirect(['/good/index']);
        }else{
            echo '数据出错了'.'<a href="http://www.peng.com/index.php?r=good/index">返回列表页</a>';exit;
        }
    }
    //修改
    public function actionEdit($id){
        $model=Good::model()->findByPk($id);
        if(empty($model)){
            echo '数据出错了'.'<a href="http://www.peng.com/index.php?r=good/index">返回列表页</a>';exit;
        }
        if(isset($_POST['Good'])){
            $photo=CUploadedFile::getInstance($model,'photo');
            if(is_object($photo)&&get_class($photo) === 'CUploadedFile'){   // 判断实例化是否成功
                if(!empty($model->photo)){
                    unlink($model->photo);
                }
                $model->photo = './assets/upfile/file_'.time().'_'.rand(0,9999).'.'.$photo->extensionName;
//                $model->photo = $model->photo_save;
                $photo->saveAs($model->photo);
            }
            $model->name=$_POST['Good']['name'];
            $model->parent_id=$_POST['Good']['parent_id'];
            $model->description=$_POST['Good']['description'];
            $res=$model->save();
            if($res===true){
                $this->redirect(['/good/index']);
            }else{
                echo '添加失败'.'<a href="http://www.peng.com/index.php?r=good/index">返回列表页</a>';exit;
            }
        }
        $cates=Goodcategory::model()->findAll();
        foreach ($cates as $v){
            $cate[$v->id]=$v->cate_name;
        }
        $this->render('edit',['model'=>$model,'cate'=>$cate]);
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