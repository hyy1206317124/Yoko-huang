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
<link href="/saide/Public/Admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/saide/Public/Admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/saide/Public/Admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/saide/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 - 德赛后台 v3.1</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form-horizontal">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="name" name="name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
          <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe675;</i></label>
        <div class="formControls col-xs-8 ">
            <input class=" input-text size-L" type="text" id="yan" name="yan" placeholder="请输入验证码"/>
            <img style="width:150px;" id="code" src="<?php echo U('User/yan');?>?<?php echo md5(uniqid(time()))?>"  onClick="this.src=this.src+'?'+Math.random()"/>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input id="sub" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 四川德赛价格评估有限公司 by 德赛后台 v3.1</div>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
         $(function(){
             $("#sub").click(function(){
            //用户名
		var user = $('#name').val();
		var username = /(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{4,30}/ ;
		if(user.length == 0){
			layer.msg('账号不能为空',{icon: 5,time:1000});
                        return false;
		}
                if(!username.test(user)){
			layer.msg("请输入5-30的用户名",{icon: 5,time:1000});
                        return false;
		}
            //密码
		var pass=$('#password').val();
		var pass1= /(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{5,25}/;
		if(pass.length==0){
			layer.msg('密码不能为空',{icon: 5,time:1000});
                        return false;
		}
                if(!pass1.test(pass)){
			layer.msg("请输入6-25的密码",{icon: 5,time:1000});
                        return false;
		}
            //验证码
                var code=$("#yan").val();
                if(code.length == 0){
                         layer.msg('验证码不能为空',{icon: 5,time:1000});
                         return false;
                }
              var url = "<?php echo U('User/doLogin');?>";
              var data = {};
              data['name'] = $("#name").val();
              data['password'] = $("#password").val();
              data['yan'] = $("#yan").val();
              var dataType = "json";
;              $.post(
                    url,
                    data,
                    function(d){
                        if(d.code == 0){
                            layer.msg(d.msg,{icon: 6,time:1000});
                            layer.closeAll();
                            parent.location.reload();
                            location.href = "<?php echo U('Index/index');?>";
                        }else if(d.code == -1){
                            layer.msg(d.msg,{icon: 5,time:1000});
                        }
                    },
                    dataType
                );
                return false;
           });
    });
</script>
</body>
</html>