<?php
/* @var $this VideoController */

$this->breadcrumbs=array(
    'Video',
);
?>
<div id="id_video_container" style="width:100%; height:auto;"></div><br>
<?php echo CHtml::button('返回' ,array('class'=>'btn2','onclick'=>'javascript:history.back(1)'))?>
<script src="//qzonestyle.gtimg.cn/open/qcloud/video/h5/h5connect.js" charset="utf-8"></script>
<script type="text/javascript">
    var player = new qcVideo.Player("id_video_container", {
        "file_id": '<?=$model->video?>',
        "app_id": "1251571346",
        "width":640,
        "height":480
    });
</script>

