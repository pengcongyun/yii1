<?php
/* @var $this SmsController */

$this->breadcrumbs=array(
	'Sms',
);
?>
<form action="<?php echo $this->createUrl('/sms/index');?>" method="post">
    <input type="text" name="phone" value="18140014103">
    <span id="sms">获取验证码</span>
    <input type="submit">
</form>
<script src="/js/jquery.js"></script>
<script>
    $('#sms').click(function () {
        var phone=$('input[name=phone]').val();
        var url='<?php echo $this->createUrl('/sms/sms');?>';
        $.post(url,{phone:phone},function (res) {
            if (res.status == 1) {
                console.log(res.msg);
            }else {
                console.log(res.msg);
            }
        })
    })

</script>