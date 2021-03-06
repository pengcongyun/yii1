<style>
    .pager-box li{
        list-style-type:none;
        margin-left: 3px;
        display: inline;
    }
    .pager-box a{
        text-decoration: none;
        border: 1px solid #CEE3FA;
    }

</style>

<?php
/* @var $this GoodController */

$this->breadcrumbs=array(
	'Good',
);
?>
<a href="<?=$this->createUrl('/good/add')?>">添加</a>
<table>
    <tr>
        <th>商品ID</th>
        <th>商品名称</th>
        <th>图片</th>
        <th>所属分类</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    <?php foreach ($model->getData() as $row):?>
    <tr>
        <td><?=$row->id?></td>
        <td><?=$row->name?></td>
        <td><?=CHtml::image($row->photo,'',['width'=>50,'hight'=>50]);?></td>
        <td><?=$row->parent_id?></td>
        <td><?=$row->description?></td>
        <td>
            <a href="<?=$this->createUrl('/good/edit',['id'=>$row->id])?>">编辑</a>
            <a href="<?=$this->createUrl('/good/delete',['id'=>$row->id])?>">删除</a>
        </td>
    </tr>
    <?php endforeach;?>

</table>
<div class="pager-box ">
    <?php $this->widget('CLinkPager', array('cssFile'=>false,'header'=>'','pages' => $model->pagination));?>
</div>
