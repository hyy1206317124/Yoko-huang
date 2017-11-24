<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/saide/Public/Admin/favicon.ico" >
<link rel="Shortcut Icon" href="/saide/Public/Admin/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	基本设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
				<span>其他设置</span>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
                                            <input type="text" id="base_title" name="base_title" placeholder="控制在25个字、50个字节以内" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						底部版权信息：</label>
					<div class="formControls col-xs-8 col-sm-9">
                                            <input type="text" id="base_copyright" name="base_copyright" placeholder="&copy; 2016 H-ui.net" value="" class="input-text">
					</div>
				</div>
                                <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
                                            <input type="text" id="base_address" name="base_address" placeholder="地址信息" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">备案号：</label>
					<div class="formControls col-xs-8 col-sm-9">
                                            <input type="text" id="base_record_number" name="base_record_number" placeholder="京ICP备00000000号" value="" class="input-text">
					</div>
				</div>
			</div>
			<div class="tabCon">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button id="but" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/saide/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
});

//系统基本配置 AJAX判断请求
$(function(){
   $("#but").click(function(){
      var  base_title = $("#base_title").val();
      if(base_title == ""){
          layer.msg('请输入网站名称',{icon: 5,time:1000});
          return false;
      }
      if(base_title.length > 50){
          layer.msg('输入字数超过50个',{icon:5,time:1000});
          return false;
      }
      var base_copyright = $("#base_copyright").val();
      if(base_copyright == ""){
          layer.msg('请输入版权信息',{icon: 5,time:1000});
          return false;
      }
      var base_address = $("#base_address").val();
      var base_record_number = $("#base_record_number").val();
      var data = {base_title:base_title,base_copyright:base_copyright,base_address:base_address,base_record_number:base_record_number};
      var url = "<?php echo U('System/system_base');?>";
      var type = 'post';
      var dataType = "json";
      $.ajax({
              url,
              data,
              type,
              dataType,
              success:function(base){
                  if(base.code == 0){
                      layer.msg(base.msg,{icon: 6,time:1000});
                      layer.closeAll();                 //关闭所有的layer弹出层
                      parent.location.reload();        //刷新父页面
                  }
                  else if(base.code == 1){
                      layer.msg(base.msg,{icon:5,time:1000});
                  }
                },
                error:function(){
                      layer.msg("警告!错误!",{icon:5,time:1000});
                }
          });
   });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>