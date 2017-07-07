<?php
/* @var $this VideoController */
$this->breadcrumbs=array(
    'Video'=>array('/video'),
    'Add',
);
?>
<style>
    .a-upload {
        text-decoration: none;
        padding: 4px 10px;
        height: 20px;
        line-height: 20px;
        position: relative;
        cursor: pointer;
        color: #888;
        background: #fafafa;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        display: inline-block;
        *display: inline;
        *zoom: 1
    }

    .a-upload  input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer
    }
    .del_img{
        cursor: pointer;
        font-size: 18px;
        height: 20px;
        color: red;
    }
</style>
<br>
<form action="<?php echo $this->createUrl('/video/add1')?>" method="post" enctype="multipart/form-data">
    <a href="javascript:;" class="a-upload">
        <input type="file" name="pic1" id="imgPicker"/>上传视频
    </a>
    <video src="" controls="controls" class="upload-img-box">

    </video>
    <input type="submit">
</form>
<script src="/js/jquery.js"></script>
<script src="/js/layer/layer.js"></script>
<script src="/js/tpUpload.js"></script>
<script>
    $("#imgPicker").tpUpload({
        url: '<?php echo $this->createUrl('/upload/upload');?>',
        data: {a: 'a'},
        size: '10Mb',
        drag: '#drag',
        start: function () {
            layer_msg = layer.msg('正在上传中…', {time: 100000000});
        },
        progress: function (loaded, total, file) {
            $('.layui-layer-msg .layui-layer-content').html('已上传' + (loaded / total * 100).toFixed(2) + '%');
        },
        success: function (ret) {
            var upload_img_box = $('.upload-img-box');
            upload_img_box.src(ret);
        },
        error: function (ret) {
            layer.alert(ret);
        },
        end: function () {
            layer.close(layer_msg);
        }
    });
    //事件绑定，当点击X的时候就将div整个移除
    $('.upload-img-box').on('click','.del_img', function(){
        var pic=$(this).parent().parent().parent().find('img')[0].src;
        var node = $(this);
        var url = '<?php echo $this->createUrl('/upload/delete');?>';
        var data={pic:pic};
        $.getJSON(url,data,function(response){
            if(response.status==2){
                node.parents('table').parent('div').remove();
                layer.msg(response.msg);
            }else{
                layer.msg(response.msg);
            }
        });
    })
</script>