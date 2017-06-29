<?php

class GoodController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
        $model=Good::model()->findAll();
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