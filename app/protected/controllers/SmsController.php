<?php

class SmsController extends Controller
{
    public $layout='user';
	public function actionIndex()
	{
	    if($_POST){
            $res=$this->sendSms(18140014103, 22);
            var_dump($res);exit;
        }
		$this->render('index');
	}
    public function actionSms(){
	    $array=[
	        1156,3389,2944,9755,3177,1455
        ];
        $code=array_rand($array);
        $res=$this->sendSms($_POST['phone'], $code);
        if ($res['result'] = 0) {
            $tip = [
                'status' => 1,
                "msg" => "发送成功",
            ];
        } else {
            $tip = [
                'status' => 0,
                "msg" => "发送失败",
            ];
        }
        echo json_encode($tip);
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