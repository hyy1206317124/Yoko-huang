<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="Shortcut Icon" href="/saide/Public/Desai/desai.jpeg" />
 <link rel="stylesheet" type="text/css" href="/saide/Public/Admin/CSS/page.css" />
<title>搜索结果页 - 四川德赛价格评估有限公司</title>
</head>
<style type="text/css">
*{
	padding:0px;
	margin:0px;
}
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
}
a{
	color:#03F;
}
a:hover{
	color:#F30;
	text-decoration:none;
}

.cbox{
	width:98%;
	margin:8px auto 0px;;
}

.top{
	height:60px;
	background:url(/templets/images/toplogo.gif) 6px center no-repeat;
}
.searchbox{
	margin:20px 0px 0px 240px;
}
input,select,textarea{
	vertical-align:middle;
	font-size:14px;
}
.searchbox .keyword{
	margin:-1px 5px 0 2px;
	padding:5px;
	width:223px;
	height:13px;
	border:1px solid #a7a6aa;
	font-size:14px;
}
.searchbox .searchbut{
	padding:1px 6px 0px 6px;
	height:23px;
	line-height:12px;
	font-size:14px;
	margin-top:-2px;
}
.searchbox .adslink{
	margin-left:10px;
}
.stitle{
	height:35px;
	line-height:35px;
	background-color:#F0F9EE;
	text-indent:20px;
}
.lightkeyword{
	font-weight:bold;
	color:#F00;
}
.slist{

}
.slist dl{
	display:block;
	width:96%;
	margin:12px auto 0px;
	padding-bottom:8px;
}
.slist dl dt a{
	line-height:27px;
	font-size:14px;
	letter-spacing:1px;
	/*font-weight:bold;*/
}
.slist dl dd p{
	line-height:19px;
	color:#444;
	font-size:14px;
	margin-left:5px;
}
.slist dl dd span{
	font-size:12px;
	line-height:23px;
	color:#390;
}
.slist dl dd a{
	color:#777;
	text-decoration:none
}
.slist dl dd a:hover{
	color:#F30;
}
.slist dl dd span{
	margin-right:10px;
}
.spage{
	margin-top:30px;
	line-height:25px;
	height:34px;
	background:#F7F7F7;
	text-align:center;
}
.spage *{
	text-decoration:none;
	vertical-align:middle;
	letter-spacing:1px;
}
.otherkey{
	margin-top:10px;
	height:31px;
	line-height:31px;
	overflow:hidden;
	text-indent:10px;
}
.footer{
	text-align:center;
	margin-top:10px;
	border-top:1px solid #DDD;
	font-size:12px;
	line-height:37px;
}
.footer span{
	color:#060;
}
</style>
<body>
<div class="top cbox">
	<div class="searchbox">

	</div>
</div>
<div class="stitle cbox">
	验证结果
</div>
<div class="slist cbox">
		<dl>    <?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo U('Index/yanzheng?id='.$ro['id']);?>" target="_blank"><?php echo ($ro['title']); ?></a></dt>
			<dd><p>...</p></dd>
			<dd>
				<span>防伪编码: <?php echo ($ro['code']); ?></span>
			</dd><?php endforeach; endif; else: echo "" ;endif; ?>
		</dl>
</div>
<div class="spage cbox pages">
	<span><?php echo ($show); ?></span>  
</div>



<div class="footer cbox">
	Powered by <a href="<?php echo U('Index/index');?>" target="_blank">四川德赛价格评估有限公司</a>
</div>


</body>
</html>