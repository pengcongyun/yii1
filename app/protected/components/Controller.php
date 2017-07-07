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
}