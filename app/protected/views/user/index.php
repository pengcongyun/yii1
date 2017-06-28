<a href="<?=$this->createUrl('/User/add')?>">添加</a>
<table class="table table-hover  table-striped">
    <tr>
        <td>id</td>
        <td>用户名</td>
        <td>密码</td>
        <td>最后登录时间</td>
        <td>操作</td>
    </tr>
    <?php foreach($model as $row):?>
        <tr>
            <td><?=$row->id?></td>
            <td><?=$row->username?></td>
            <td><?=$row->password?></td>
            <td><?=date('Y-m-d H:i:s',$row->last_time)?></td>
            <td>
                <a href="<?=$this->createUrl('/User/delete',['id'=>$row->id])?>">删除</a>
                <a href="<?=$this->createUrl('/User/edit',['id'=>$row->id])?>">修改</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>

