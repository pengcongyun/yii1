<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30 0030
 * Time: 13:59
 */
class TestController extends Controller
{
    //redis原生
    public function actionRedis(){
        $redis=new Redis();
        $redis->connect('localhost',6379);
        $result = $redis->set('test',"11111111111");
        echo $redis->get('test');exit;
    }
}