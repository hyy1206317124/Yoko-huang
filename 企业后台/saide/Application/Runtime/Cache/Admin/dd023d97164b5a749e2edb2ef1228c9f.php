<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>赛德管理系统</title>

<link href="/saide/Public/Admin/User/Css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/saide/Public/Admin/User/Javascript/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/layer/2.4/layer.js"></script>
</head>
<body onLoad="sendRequest()" >
<style>
    .m{
        width:200px; height:50px;margin-right: 80px;margin-bottom: -18px;
    }
</style>
<div class="videozz"></div>
	<video  autoplay muted loop poster="assets/images/fallba1ck.jpg">
		<source src="assets/images/mov.mp4">		
		你的游览器不支持video支持
	</video>
<div class="box">
	<div class="box-a">
    <div class="m-2">
          <div class="m-2-1">
            <form id="myForm">
                <div class="m-2-2">
                   <input type="text" id="name" name="name" placeholder="请输入账号" />
                </div>
                <div class="m-2-2">
                   <input type="password" id="password" name="password" placeholder="请输入密码"/>
                </div>
                <img class="m" id="code" src="<?php echo U('User/yan');?>?<?php echo md5(uniqid(time()))?>"  
                     onClick="this.src=this.src+'?'+Math.random()"/>
                <div class="m-2-2">
                   <input type="text" id="yan" name="yan" placeholder="请输入验证码"/>
                </div>
                <div class="m-2-2">
                   <button type="submit" id="sub" value="登陆" /> 登陆
                  
                </div>
                    
            </form>
          </div>
    </div>
    <div class="m-5"> 
    <div id="m-5-id-1"> 
    <div id="m-5-2"> 
    <div id="m-5-id-2">  
    </div> 
    <div id="m-5-id-3"></div> 
    </div> 
    </div> 
    </div>   
    <div class="m-10"></div>
    <div class="m-xz7"></div>
    <div class="m-xz8 xzleft"></div>
    <div class="m-xz9"></div>
    <div class="m-xz9-1"></div>
    <!-- <div class="m-x10"></div>
    <div class="m-x11"></div>
    <div class="m-x12 xzleft"></div>
    <div class="m-x13"></div>
    <div class="m-x14 xzleft"></div>
    <div class="m-x15"></div>
    <div class="m-x16 xzleft"></div>-->
    <div class="m-x17 xzleft"></div>
    <div class="m-x18"></div>
    <div class="m-x19 xzleft"></div>
    <div class="m-x20"></div>  
    <div class="m-8"></div>
    <div class="m-9"><div class="masked1" id="sx8">赛德管理系统</div></div> 
    <div class="m-11">
    	<div class="m-k-1"><div class="t1"></div></div>
        <div class="m-k-2"><div class="t2"></div></div>
        <div class="m-k-3"><div class="t3"></div></div>
        <div class="m-k-4"><div class="t4"></div></div>
        <div class="m-k-5"><div class="t5"></div></div>
        <div class="m-k-6"><div class="t6"></div></div>
        <div class="m-k-7"><div class="t7"></div></div>
    </div>   
    <div class="m-14"><div class="ss"></div></div>
    <div class="m-15-a">
    <div class="m-15-k">
    	<div class="m-15xz1">
            <div class="m-15-dd2"></div>
        </div>
    </div>
    </div>
    <div class="m-16"></div>
    <div class="m-17"></div>
    <div class="m-18 xzleft"></div>
    <div class="m-19"></div>
    <div class="m-20 xzleft"></div>
    <div class="m-21"></div>
    <div class="m-22"></div>
    <div class="m-23 xzleft"></div>
    <div class="m-24" id="localtime"></div>
    </div>
</div>
<script src="/saide/Public/Admin/User/Javascript/common.min.js"></script>
<script src="/saide/Public/jquery-3.1.0.min.js"></script>
<script>
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