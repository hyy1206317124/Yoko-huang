<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
        <link rel="Shortcut Icon" href="/saide/Public/Desai/desai.jpeg" />
<title>四川德赛价格评估有限公司</title>
<style>
*{padding:0px;margin:0px;}
.middle{margin:0px auto 0px auto;}
.fanwei{width:1000px;height:1060px;}
.head{font-size:1em;padding:5px;font-weight:bold}
.infor{width:700px;height:320px;background:#fff;margin-top:90px}
.infor_t{width:472px;height:100%;float:left;}
.infor_t tr{padding:0px 0px 5px 0px; height:30px;vertical-align: top;}
.infor_t tr td{padding:0px 10px 0px 0px; font-size:1.2em}
.infor_m{width:228px;height:100%;float:left;}
.infor_m1{width:200px;height:200px;background:#fff;}
.infor_m2{text-align:center;padding:10px 0px 10px 0px}
.company{margin:30px auto 0px auto;}
.company h1{text-align:center;padding:0px 0px 10px 0px}
.company h2{text-align:center}
.company table{width:100%;margin:40px 0px 30px 100px}
.company tr{height:30px;font-size:1.2em}
.company tr td{padding:0px 10px 0px 0px;}
.statement{width:900px;height:120px;border-radius:5px;background:#f9f9f9;margin-top:40px}
.statement span{padding:10px;font-weight:bold;font-size:1em;display:block}
</style></head>




<body>
<div class="fanwei middle">
 <div class="head">四川德赛价格评估有限公司防伪验证</div>
 <div class="infor middle">
   <div class="infor_t">
    <table width="472" border="0">
	  <tbody><tr style="font-weight:bold">
		<td style="width: 120px; text-align: right;">防伪编码:</td>
		<td><?php echo ($row['code']); ?></td>
	  </tr>
	  <tr>
		<td style="text-align: right;">报告文号:</td>
		<td><?php echo ($row['document_number']); ?></td>
	  </tr>
	  <tr>
		<td style="text-align: right;">委托单位:</td>
		<td><?php echo ($row['company']); ?></td>
	  </tr>
	  <tr>
		<td style="text-align: right;">评估公司:</td>
		<td><?php echo ($row['company_title']); ?></td>
	  </tr>
	  <tr>
		<td style="text-align: right;">报告日期:</td>
		<td><?php echo ($row['report_date']); ?></td>
	  </tr>
	  <!--tr>
		<td>报备时间:</td>
		<td></td>
	  </tr>
	  <tr>
		<td>被评估单位所在地:</td>
		<td>成都市青羊区广富路239号3幢（N区3栋）5楼</td>
	  </tr>
	  <tr>
		<td>签名评估师:</td>
		<td>崔巍、李泉</td>
	  </tr-->
    </tbody></table>
	<script>
	 var tr = document.getElementsByTagName('tr');
	 for(var i=0;i<8;i++){
	   var k = tr[i].childNodes[1];
	   k.style.textAlign = "right";
	 }
	</script>
   </div>
   <script type='text/javascript' src='http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js'></script>
<script type="text/javascript" src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script> 
   <div class="infor_m">
    <div class="infor_m1 middle"><div id="erweima"></div></div>
	<div class="infor_m2">防伪二维码</div>
   </div>

  
   <script>
 <!-- 二维码 -->
$(function(){
       $url = "<?php echo ($url); ?>";   //获取当前网页地址
        $('#erweima').qrcode({ 
            width: 200, //宽度 
            height:200, //高度 
            text: $url //任意内容 
        }); 
})

	</script>
 </div>
 <div class="company">
   
   <h1><?php echo ($row['title']); ?></h1>
   <table id="ctable">
   <tbody><tr>
    <td style="text-align: right;">评估公司:</td>
	<td><?php echo ($row['company_title']); ?></td>
   </tr>
   <tr>
    <td style="text-align: right;">联系电话:</td>
	<td><?php echo ($row['phone']); ?>/<?php echo ($row['telephone']); ?></td>
   </tr>
   <tr>
    <td style="text-align: right;">通讯地址:</td>
	<td><?php echo ($row['address']); ?></td>
   </tr>
   <tr>
    <td style="text-align: right;">电子邮箱:</td>
	<td><?php echo ($row['emali']); ?></td>
   </tr>
   <tr>
    <td style="text-align: right;">网&nbsp;&nbsp;址:</td>
	<td><?php echo ($row['company_url']); ?></td>
   </tr>
   </tbody></table>
   <script>
	 var table = document.getElementById('ctable');
	 var trs = table.getElementsByTagName('tr');
	 for(var i=0;i<5;i++){
	   var k2 = trs[i].childNodes[1];
	   k2.style.textAlign = "right";
	 }
	</script>
 </div>
 <hr>
 <div class="statement middle">
    <span>
	 声明：<?php echo ($row['statement']); ?>
	</span>
 </div>
</div>
</body>
</html>