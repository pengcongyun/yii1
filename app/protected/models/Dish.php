<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4 0004
 * Time: 09:31
 */
class Dish extends CFormModel
{
    public function islogin(){
        $res=Yii::app()->user->name;
        if($res!=="Guest"){
            $this->redirect(['User/index']);
        }
    }
}