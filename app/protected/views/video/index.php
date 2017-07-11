<?php
/* @var $this VideoController */

$this->breadcrumbs=array(
	'Video',
);
?>
<a href="<?php echo $this->createUrl('/video/add')?>">添加</a>
<table>
    <tr>
        <th>ID</th>
        <th>视频地址</th>
        <th>操作</th>
    </tr>
    <?php foreach ($model as $row):?>
    <tr>
        <td><?=$row->id?></td>
        <td><?=$row->video?></td>
        <td>
            <a href="<?php echo $this->createUrl('/video/delete',['id'=>$row->id])?>">删除</a>
            <a href="<?php echo $this->createUrl('/video/look',['id'=>$row->id])?>">查看</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
