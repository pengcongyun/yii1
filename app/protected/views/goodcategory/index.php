<?php
/* @var $this GoodcategoryController */

$this->breadcrumbs=array(
	'Goodcategory',
);
?>
<a href="<?=$this->createUrl('/goodcategory/add')?>">添加</a>
<table>
    <tr>
        <th>分类ID</th>
        <th>分类名称</th>
        <th>操作</th>
    </tr>
    <?php foreach ($model as $row):?>
    <tr>
        <td><?=$row->id?></td>
        <td><?=$row->cate_name?></td>
        <td>
            <a href="<?=$this->createUrl('/goodcategory/edit',['id'=>$row->id])?>">修改</a>
            <a href="<?=$this->createUrl('/goodcategory/delete',['id'=>$row->id])?>">删除</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
