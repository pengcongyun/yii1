<a href="<?php echo $this->createUrl('/Photo/add')?>">新增</a>
<table>
    <tr>
        <th>ID</th>
        <th>图片</th>
        <th>操作</th>
    </tr>
<?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row->id;?></td>
        <td><?php echo $row->photo;?></td>
        <td>
            <a href="">删除</a>
        </td>
    </tr>
<?php endforeach;?>
</table>
