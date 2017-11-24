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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用德赛管理系统 <span class="f-14">v3.1</span>后台</p>
        <p>上次登录IP：<?php print GetHostByName($_SERVER['SERVER_NAME']) ?> &nbsp; <?php
 if(!empty($_COOKIE['lastvisit'])){ echo "上次登录时间是：".$_COOKIE['lastvisit']; setCookie("lastvisit",date("Y-m-d H:i:s"),time()+3600*24*360); }else{ echo "您是第一次登录，欢迎！"; setCookie("lastvisit",date("Y-m-d H:i:s"),time()+3600*24*360); } ?></p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>资讯库</th>
				<th>图片库</th>
				<th>栏目库</th>
				<th>留言库</th>
				<th>管理员</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo ($information); ?></td>
				<td><?php echo ($image); ?></td>
				<td><?php echo ($column); ?></td>
				<td><?php echo ($feedback); ?></td>
				<td><?php echo ($user); ?></td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td><?php echo ($information1); ?></td>
				<td><?php echo ($image1); ?></td>
				<td><?php echo ($column1); ?></td>
				<td><?php echo ($feedback1); ?></td>
				<td><?php echo ($user1); ?></td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td><?php echo ($information2); ?></td>
				<td><?php echo ($image2); ?></td>
				<td><?php echo ($column2); ?></td>
				<td><?php echo ($feedback2); ?></td>
				<td><?php echo ($user2); ?></td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td><?php echo ($information3); ?></td>
				<td><?php echo ($image3); ?></td>
				<td><?php echo ($column3); ?></td>
				<td><?php echo ($feedback3); ?></td>
				<td><?php echo ($user3); ?></td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td><?php echo ($information4); ?></td>
				<td><?php echo ($image4); ?></td>
				<td><?php echo ($column4); ?></td>
				<td><?php echo ($feedback4); ?></td>
				<td><?php echo ($user4); ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName">http://127.0.0.1/</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?php print GetHostByName($_SERVER['SERVER_NAME']) ?></td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td><?php print $_SERVER["HTTP_HOST"] ?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>80</td>
			</tr>
			<tr>
				<td>服务器IIS版本 </td>
				<td>Microsoft-IIS/6.0</td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td><?php echo dirname(__FILE__); ?></td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td><?php print php_uname() ?></td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td><?php print $_SERVER['SystemRoot'] ?></td>
			</tr>
			<tr>
				<td>服务器脚本超时时间 </td>
				<td><?php
 print ini_get('max_execution_time')."分钟"; ?></td>
			</tr>
			<tr>
				<td>服务器的语言种类 </td>
				<td><?php print $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?></td>
			</tr>
			<tr>
				<td>.NET Framework 版本 </td>
				<td>2.050727.3655</td>
			</tr>
			<tr>
				<td>服务器当前时间 </td>
				<td><?php print date("Y-m-d H:i:s") ?></td>
			</tr>
			<tr>
				<td>服务器IE版本 </td>
				<td>6.0000</td>
			</tr>
			<tr>
				<td>服务器上次启动到现在已运行 </td>
				<td><?php
 $starttime = explode('date("Y-m-d H:i:s",time()); ',microtime()); $endtime = explode(' ',microtime()); $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]); $thistime = round($thistime,3); echo intval($thistime / 60) ."分钟"; ?></td>
			</tr>
			<tr>
				<td>逻辑驱动器 </td>
				<td>C:\D:\</td>
			</tr>
			<tr>
				<td>CPU 总数 </td>
				<td><?php print $_SERVER['PROCESSOR_IDENTIFIER'] ?></td>
			</tr>
			<tr>
				<td>CPU 类型 </td>
				<td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
			</tr>
			<tr>
				<td>虚拟内存 </td>
				<td>52480M</td>
			</tr>
			<tr>
				<td>当前程序占用内存 </td>
				<td><?php  $_LANG['memory_info']='%0.3f MB'; if($_LANG['memory_info']&&function_exists('memory_get_usage')){ echo sprintf($_LANG['memory_info'], memory_get_usage()/1048576); } ?></td>
			</tr>
			<tr>
				<td>Asp.net所占内存 </td>
				<td>51.46M</td>
			</tr>
			<tr>
				<td>当前Session数量 </td>
				<td>8</td>
			</tr>
			<tr>
				<td>当前SessionID </td>
				<td><?php print getmypid() ?></td>
			</tr>
			<tr>
				<td>当前系统用户名 </td>
				<td><?php print Get_Current_User() ?></td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>