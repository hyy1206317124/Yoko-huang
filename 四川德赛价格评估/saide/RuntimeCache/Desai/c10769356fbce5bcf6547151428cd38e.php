<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线留言_四川德赛价格评估有限公司</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/saide/Public/Desai/shouye/Css/layout.css" rel="stylesheet" media="screen" type="text/css" />
<link href="/saide/Public/Desai/shouye/Css/common.css" rel="stylesheet" media="screen" type="text/css" />
<link href="/saide/Public/Desai/shouye/Css/element.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="Bookmark" href="/saide/Public/Desai/desai.jpeg" >
<link rel="Shortcut Icon" href="/saide/Public/Desai/desai.jpeg" />
<meta http-equiv="mobile-agent" content="format=xhtml;url=/m/list.php?tid=1">
<script type="text/javascript">if(window.location.toString().indexOf('pref=padindex') != -1){}else{if(/AppleWebKit.*Mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))){if(window.location.href.indexOf("?mobile")<0){try{if(/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){window.location.href="/m/list.php?tid=1";}else if(/iPad/i.test(navigator.userAgent)){}else{}}catch(e){}}}}</script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/j.js" ></script>
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/CSS/page.css" />
<script type="text/javascript">
$(function () { 
var ie6 = document.all; 
var dv = $('#channel_scroll'), st; 
dv.attr('otop', dv.offset().top); //存储原来的距离顶部的距离 
$(window).scroll(function () { 
st = Math.max(document.body.scrollTop || document.documentElement.scrollTop); 
if (st > parseInt(dv.attr('otop'))) { 
if (ie6) ); 
} 
else if (dv.css('position') != 'fixed') dv.css({ 'position': 'fixed', top: 0 }); 
} else if (dv.css('position') != 'static') dv.css({ 'position': 'static' }); 
}); 
}); 
</script>
</head>
<body class="articlelist">
<!--顶部-->

<div class="index_head">
<div class="index_logo">
<img src="/saide.<?php echo ($image['image']); ?>"width="53" height="53"/>
</div>

<div class="index_name">
<?php echo ($base['base_title']); ?>
</div>

<div class="index_tel">
<span>联系电话：<?php echo ($contact['contact_phone']); ?>/<?php echo ($contact['contact_telephone']); ?></span>
</div>
</div>
<!--顶部-->
<!--导航-->
<div class="index_nav">
		<dl class="index_nav_ul">
	<dt class="index_nav_li"><a href="<?php echo U('Index/index');?>">网站首页</a></dt>
        <?php if(is_array($column)): $i = 0; $__LIST__ = $column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><dt class="index_nav_li"><a href='<?php echo U("Desai/Index/read?id=".$co["id"]);?>' ><?php echo ($co['class_title']); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
        <dt class="index_nav_li"><a href="<?php echo U('Index/body_gs?id='.$zizhi['id'].'&'.'uid='.$zizhi['uid']);?>" ><?php echo ($zizhi1['class_title']); ?></a></dt>
        <dt class="index_nav_li"><a href="<?php echo U('Index/info?id='.$info['id']);?>" ><?php echo ($info['cate_title']); ?></a></dt>
         <dt class="index_nav_li"><a href="<?php echo U('Index/body_gg?id='.$phone['id'].'&'.'uid='.$phone['uid']);?>" ><?php echo ($phone['class_title']); ?></a></dt>
	<dt class="index_nav_li"><a href='<?php echo U("Desai/Index/feddback");?>'>在线留言</a></dt>
	</dl>
</div>

<!--主体-->

<div class="con_sub">
    <input style="display:none" type="text" id="uid" name="uid">
    
	<div class="con_sub_left" id="channel_scroll">
		<div class="serlist">

			<div class="serlist_head">
				<span><?php echo ($reads['class_title']); ?></span>
			</div>
			<div class="serlist_li">
				<ul>
                                                          <?php if(is_array($read)): $i = 0; $__LIST__ = $read;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Desai/Index/body?id='.$co['id'].'&'.'uid='.$co['uid']);?>" target="_blank"><?php echo ($co['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
                   
		</div>
<div class="address">
			<div class="address_head">
				<span>联系地址</span>
			</div>
			<div class="address_con">
				　　    			<div>
	<span style="font-size:16px;"><span style="font-weight: bold;">联系人：<?php echo ($contact['contact_contacts']); ?></span></span></div>
<div>
	<span style="font-size:14px;"><span style="font-weight: bold;">电话：<?php echo ($contact['contact_telephone']); ?></span></span></div>
<div>
	<span style="font-size:14px;"><span style="font-weight: bold;">手机：<?php echo ($contact['contact_phone']); ?></span></span></div>
<div>
    <span style="font-size:14px;"><span style="font-weight: bold;">QQ&nbsp;：
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3172549834&site=qq&menu=yes">
                    <img style="margin-bottom: -6px;width: 60px;height: 20.17px;" border="0" src="http://wpa.qq.com/pa?p=2:3172549834:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
                </a>
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=389165447&site=qq&menu=yes">
                    <img style="margin-bottom: -6px;width: 60px;height: 20.17px;" border="0" src="http://wpa.qq.com/pa?p=2:389165447:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
                </a>
            </span></span></div>
<div>
	<span style="font-size:14px;">网址：<?php echo ($contact['contact_url']); ?></span></div>
<div>
	<span style="font-size:14px;">邮箱：<span style="font-size:12px;"><?php echo ($contact['contact_email']); ?></span></span></div>
<div>
    <span style="font-size:14px;">地址：<a style="color: #333;" href="<?php echo U('Index/ditu');?>"><?php echo ($contact['contact_address']); ?></a></span></div>
 
			</div>
		</div>
	</div>
    
	<div class="con_sub_right">
		<div class="con_sub_right_head">
			<div class="con_sub_right_head_mark"></div>
			<div class="con_sub_right_head_name">在线留言</div>
			<!--div class="con_sub_right_head_en">About US</div-->
			<div class="con_sub_right_head_more">
                            <span style="font-weight:bold;">当前位置: </span>
                            <a href="<?php echo U('Index/index');?>">主页</a> > <a href='<?php echo U("Desai/Index/feddback");?>'>在线留言</a>></div>
		</div>
		<div class="con_sub_right_con">
			<div class="con_sub_right_con_m">
			 <h4>在线留言</h4>
				<form>
					<table style="width:97%;" cellpadding="0" cellspacing="8">
					<tr style="">
					  <td align="right" valign="top">留言主题：</td>
					  <td><input type='text' name='subject' id='subject' style='width:250px'  class='intxt' value='' />
					</td>
					</tr>
					<tr>
					  <td align="right" valign="top">留言内容：</td>
					  <td><textarea name='message' id='message' style='width:90%;height:100px'></textarea>
					</td>
					</tr>
					<tr>
					  <td align="right" valign="top">留言者：</td>
					  <td><input type='text' name='full_name' id='full_name' style='width:250px'  class='intxt' value='' />
					</td>
					</tr>
					<tr>
					  <td align="right" valign="top">联系电话：</td>
					  <td><input type='text' name='phone' id='phone' style='width:250px'  class='intxt' value='' />
					</td>
					</tr>
					<tr>
					  <td align="right" valign="top">QQ/MSN：</td>
					  <td><input type='text' name='qq' id='qq' style='width:250px'  class='intxt' value='' />
					</td>
					</tr>
                                        </table>
					<div align='center' style='height:30px;padding-top:10px;'>
					<input type="submit" id="sub" value="提 交" class='coolbg' />
					&nbsp;
					<input type="reset" value="重 置" class='coolbg' />
					</div>
				</form>	 
			 </div>
			 <div class="con_sub_right_con_ml">
				<ul>
                                    <?php if(is_array($feddback)): $i = 0; $__LIST__ = $feddback;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fe): $mod = ($i % 2 );++$i;?><li>
						<div><span><?php echo ($fe['full_name']); ?></span><span>(<?php echo (time_date($fe['time'])); ?>)</span></div>
						<div>
							<span>【问】：<?php echo ($fe['message']); ?></span>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			 </div>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" language="javascript">  
$(function(){
    $('#sub').click(function(){
       var subject = $("#subject").val();
       if(subject == ""){
            layer.msg('请输入主题',{icon: 5,time:1000});
            return false;
       }
       var message = $("#message").val();
       if(message == ""){
            layer.msg('请输入内容',{icon: 5,time:1000});
            return false;
       }
       var full_name = $("#full_name").val();
       if(full_name == ""){
            layer.msg('请输姓名',{icon: 5,time:1000});
            return false;
       }
       var phone = $("#phone").val();
       if(phone == ""){
            layer.msg('请输电话',{icon: 5,time:1000});
            return false;
       }
       if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
          layer.msg('请输入合法的手机号',{icon: 5,time:1000});
          return false; 
      }
      var qq = $("#qq").val();
      if(qq == ""){
            layer.msg('请输QQ',{icon: 5,time:1000});
            return false;
       }
      if(!(/^[1-9][0-9]{4,14}$/.test(qq))){
          layer.msg('请输入合法的QQ号',{icon: 5,time:1000});
          return false; 
      }
      var url = "<?php echo U('Index/feddback');?>";
      var data = {subject:subject,message:message,full_name:full_name,phone:phone,qq:qq};
      var dataType = "json";
      var type = 'post';
      $.ajax({
              url,
              data,
              type,
              dataType,
              success:function(feddback){
                  if(feddback.code == 0){
                      layer.msg(feddback.msg,{icon: 6,time:1000});
                      layer.closeAll();                 //关闭所有的layer弹出层
                      parent.location.reload();        //刷新父页面
                  }
                  else if(feddback.code == 1){
                      layer.msg(feddback.msg,{icon:5,time:1000});
                  }
                },
                error:function(){
                      layer.msg("警告!错误!",{icon:5,time:1000});
                }
          });
    });
});




</script>
<!--主体-->
<div style="clear:both;"></div>
<!--底部-->
<!--底部-->
<div class="index_footer">
	<div class="index_footer_copy">
		<span>相关链接</span><span>-</span>
                <?php if(is_array($url)): $i = 0; $__LIST__ = $url;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><a href="<?php echo ($u['url_http']); ?>" target="_blank"><?php echo ($u['url_title']); ?></a><span>-</span><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="index_footer_info">
		<span>版权页面所有：<?php echo ($base['base_title']); ?> <?php echo ($base['base_copyright']); ?></span>
	</div>
	<div class="index_footer_info">
		<span>地址：<?php echo ($base['base_address']); ?></span>
	</div>
	<div class="index_footer_info">
		<span><?php echo ($base['base_record_number']); ?></span>
	</div>
</div>
<!--底部-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?0dcdaf3668dc5b711dd343450fe668bc";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>