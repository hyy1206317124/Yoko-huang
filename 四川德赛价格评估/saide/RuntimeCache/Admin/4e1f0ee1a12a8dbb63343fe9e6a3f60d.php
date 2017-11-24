<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - 赛德管理系统 v3.1</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>
	 <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">
                    <span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <span class="select-box" style="width:150px;">
			<select class="select" id="sex" name="sex" size="1">
				<option value="sex-1">男</option>
				<option value="sex-2">女</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                        <select class="select" id="role" name="role" size="1">
				<option value="2">管理员</option>
			</select>
			</span> </div>
        </div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" id="sub" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
    $("#sub").click(function(){
    var name = $("#name").val();
    if(!/^[a-z]\w+[a-z0-9]$/i.test(name)){
        layer.msg('请输入合法的管理员名',{icon: 5,time:1000});
        return false;
    }
    var pass = $("#password").val();
    if(!/^\w+[a-zA-Z0-9]+$/.test( pass)){
        layer.msg('请输入合法的密码',{icon: 5,time:1000});
        return false;
    }
    if(pass.length<6 || pass.length>16){
        layer.msg('请输入6至16位的密码',{icon: 5,time:1000});
        return false;
    }
    var pass1 = $("#password2").val();
    
    if(pass != pass1){
        layer.msg('两次密码不一致',{icon: 5,time:1000});
        return false;
    }
    var phone = $("#phone").val();
    if(!/^[1](3|4|5|6|7|8)[0-9]{9}$/.test(phone)){
        layer.msg('请输入合法的手机号',{icon: 5,time:1000});
        return false;
    }
    var email = $("#email").val();
    if(!/^[a-z0-9]\w+@\w+(\.[a-z0-9])+/i.test(email)){
        layer.msg('请输入合法的邮箱',{icon: 5,time:1000});
        return false;
    }
    var url = "<?php echo U('User/doAdd');?>";
    var data = {};
    data['name'] = $("#name").val();
    data['password'] = $("#password").val();
    data['password2'] = $("#password2").val();
    data['role'] = $("#role").val();
    data['sex'] = $("#sex").val();
    data['phone'] = $("#phone").val();
    data['email'] = $("#email").val();
    var dataType = "json";
    $.post(
        url,
        data,
        function(ret){
            if(ret.code == 1){
                layer.msg(ret.msg,{icon: 6,time:1000});
                layer.closeAll();
                parent.location.reload();
//                location.href = "<?php echo U('Index/index');?>";
            }else if(ret.code == -1){
                layer.msg(ret.msg,{icon: 5,time:1000});
            }
            
        },
        dataType
//        error:function(){
//            layer.msg('请求失败',{icon: 6,time:1000});
//        }
    );
    return false;
    });
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>