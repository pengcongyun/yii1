<?php

class VideoController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
	    $model=Video::model()->findAll();
		$this->render('index',['model'=>$model]);
	}
    public function actionAdd(){
	    $model=new Video;
        if(isset($_POST['Video'])) {
            $photo = CUploadedFile::getInstance($model, 'video');
            if (is_object($photo) && get_class($photo) === 'CUploadedFile') {   // 判断实例化是否成功
                $video = './assets/upfile/file_' . time() . '_' . rand(0, 9999) . '.' . $photo->extensionName;
//                $model->photo = $model->photo_save;
                $photo->saveAs($video);
                $model->video=$this->unploadVod($video);
                $res=$model->save();
                if($res===true){
                    $this->redirect(['/video/index']);
                }else{
                    echo '添加失败'.'<a href="http://www.peng.com/index.php?r=video/index">返回列表页</a>';exit;
                }
            }
        }
        $this->render('add',['model'=>$model]);
    }
    //
    public function actionAdd1(){
        $model=new Video;
        if($_POST){
            $model->video=$this->unploadVod($_POST['video']);
            $res=$model->save();
            if($res===true){
                $this->redirect(['/video/index']);
            }else{
                echo '添加失败'.'<a href="http://www.peng.com/index.php?r=video/index">返回列表页</a>';exit;
            }
        }
        $this->render('add1');
    }
    //查看
    public function actionLook($id){
        $model=Video::model()->findByPk($id);
        $this->render('look',['model'=>$model]);
    }
    //删除
    public function actionDelete($id){
        $model=Video::model();
        $res=$model->deleteByPk($id);
        if($res===1){
            return $this->redirect(['Video/index']);
        }else{
            var_dump(11);exit;
        }
    }
    public function actionOne(){
        
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