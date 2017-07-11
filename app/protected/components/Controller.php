<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    /*视频上传*/
    public function unploadVod($video)
    {
        require_once('/QcloudApi/VodUpload.php');
        $vod = new VodApi();
        $vod->Init("AKIDyG1uZo8bPzuZV8RJwQPopBNikTj38e1A", "oShHZQfBLnR5T6dSlZUSsxp3aZNUz43n", VodApi::USAGE_UPLOAD, "gz");

        $vod->SetConcurrentNum(20);    //设置并发上传的分片数目，不调用此函数时默认并发上传数为6
        $vod->SetRetryTimes(5);    //设置每个分片可重传的次数，不调用此函数时默认值为5

        // $package: 上传的文件配置参数
        $package = array(
            'fileName' => $video,                //文件的绝对路径，包含文件名
            'dataSize' => 1024 * 512,            //分片大小，单位Bytes。断点续传时，dataSize强制使用第一次上传时的值。
            'isTranscode' => 1,                    //是否转码
            'isScreenshot' => 0,                //是否截图
            'isWatermark' => 0,                    //是否添加水印
            'classId' => 0                        //分类
        );
        //$vod->AddFileTag("测试1");
        return $vod->UploadVideo($package);
    }
    /**
     * 发送curl请求
     * @param string $mobile
     */
    public function curl_post($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $ret = curl_exec($curl);
        if (true != $ret) {
            $result = "{ \"result\":" . -2 . ",\"errmsg\":\"" . curl_error($curl) . "\"}";
        } else {
//        $rsp = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
            $rsp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($rsp != 200) {
                $result = "{ \"result\":" . -1 . ",\"errmsg\":\"" . $rsp . " " . curl_error($curl) . "\"}";
            } else {
                $result = $ret;
            }
        }
        curl_close($curl);
        return $result;
    }

    /**
     * 手机验证码发送---腾讯云
     * @param string $mobile
     */
    public function sendSms($tel, $code)
    {
        //** 配置参数 */
        $AppID = "1400025722";
        $AppKey = "b8ddb57b5c184250c99f609bdc9cc6cf";
        $TemplateIDONE = "16234";  //短信验证
        $SMSsignature = "成都犬神科技";//短信签名
        //$code=\Org\Util\String::randString(6,1);//六位随机数
        $random = rand(1,10000000000000);//十位随机数
        $curTime = time();
        $url = sprintf("https://yun.tim.qq.com/v5/tlssmssvr/sendsms?sdkappid=%s&random=%s", $AppID, $random);//URL协议

        //签名加密
        $sig = hash("sha256", "appkey=" . $AppKey . "&random=" . $random . "&time=" . $curTime . "&mobile=" . $tel);

        //请求包体
        $smsBag = [
            "tel" => [
                "nationcode" => "86",
                "mobile" => $tel,
            ],
            'sign' => $SMSsignature,
            'tpl_id' => $TemplateIDONE,
            'params' => [
                "$tel",
                "$code",
                "5分钟",
            ],
            'sig' => $sig,
            'time' => time(),
            'extend' => "",
            'ext' => "",
        ];
        //发送请求
        $res = $this->curl_post($url, $smsBag);
        $result = json_decode($res);
        return $result;
    }

}