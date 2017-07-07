<?php
class UploadController extends Controller
{
    public function actionUpload(){
        //读取图像上传域,并使用系统上传组件上传
        $tmpFile   = CUploadedFile::getInstanceByName('pic1');
        if(is_object($tmpFile) && get_class($tmpFile)==='CUploadedFile'){
            $filename = time().rand(0,9);
            //上传文件的扩展名
            $ext = $tmpFile->extensionName;
           /* if($ext=='jpg'||$ext=='gif'||$ext=='png'){
                $big = $pathd . $filename . '_600.' . $ext; //310缩略图
                $small  = $pathd . $filename . '_310.' . $ext; //310缩略图
                $thumb  = $pathd . $filename . '_100.' . $ext; //100缩略图
                $model->zat_thumb = $thumb; //缩略图
            }*/
            $uploadfile = './assets/photo/file_' . $filename . '.' . $ext;  //保存的路径
            $tmpFile->saveAs($uploadfile);
            $str = json_encode($uploadfile);
            echo $str;
        }
    }
    //删除图片
    public function actionDelete($pic){
        $pic=str_replace('http://www.peng.com/','/',$pic);
        $front=getcwd();
        $link=$front.$pic;
        $res=unlink($link);
        if($res===false){
            $data=[
                'status'=>1,
                'msg'=>'删除失败',
            ];
        }else{
            $data=[
                'status'=>2,
                'msg'=>'删除成功',
            ];
        }
        echo  json_encode($data);
    }
}