<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($base['base_title']); ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link href="/saide/Public/Desai/shouye/Css/layout.css" rel="stylesheet" media="screen" type="text/css" />
<link href="/saide/Public/Desai/shouye/Css/common.css" rel="stylesheet" media="screen" type="text/css" />
<link href="/saide/Public/Desai/shouye/Css/element.css" rel="stylesheet" media="screen" type="text/css" />
<link rel="Bookmark" href="/saide/Public/Desai/desai.jpeg" />
<link rel="Shortcut Icon" href="/saide/Public/Desai/desai.jpeg" />
<meta http-equiv="mobile-agent" content="format=xhtml;url=/m/index.php" />
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/clamp.js" ></script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/clamp.min.js" ></script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/m.js"></script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/dedeajax2.js"></script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/j.js" ></script>
<script language="javascript" type="text/javascript" src="/saide/Public/Desai/shouye/JS/pic_scroll.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script language="javascript" type="text/javascript">
  $(function(){
    $("#yanzheng").click(function(){
       var code = $("#code").val(); 
       var url = "<?php echo U('Index/yan');?>";
       var dataType = "json";
       var data = {code:code};
       $.get(
            url,
            data,
            function(d){
                if(d.code == 0){
                    layer.msg(d.msg,{icon:6,time:1000});
                    location.href = '<?php echo U("Index/soso");?>';
                }
                else if(d.code == 1){
                    layer.msg(d.msg,{icon:5,time:1000});
                }
            },
           dataType
       );
       return false;
    });
    
  });
  <!-- 限制字符 -->
$(document).ready(function(){
    //限制字符个数
    $(".core").each(function(){
        var maxwidth=15;
        if($(this).text().length>maxwidth){
            $(this).text($(this).text().substring(0,maxwidth));
            $(this).html($(this).html()+'..');
        }
    });
});
</script>
<style>
.fsearch{width:250px;height:50px;position:absolute;bottom:2px;left:10px;}
.fsearch span{padding:0px 0px 5px 0px;display:block;color:#fff;}
</style>
</head>
<body class="index">
<!--顶部-->

<div class="index_head">
<div class="index_logo">
<img src="/saide.<?php echo ($image['image']); ?>" width="53" height="53"/>
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
<!--导航-->

<!-- /header -->

<!--轮播-->
<div class="index_slid">
    <?php if(is_array($image_lb)): $i = 0; $__LIST__ = $image_lb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><img src="/saide.<?php echo ($in['image']); ?>" width="1000" height="269"/><?php endforeach; endif; else: echo "" ;endif; ?>

<div class="index_slid_img">
<img src="/saide.<?php echo ($image_sz['image']); ?>" width="293" height="314"/>
</div>
<div class="fsearch">
    <form>
	<span>报告防伪编码 :</span> <input id ='code' type="text" name="code" value="" />
	<button id="yanzheng" type="button">验证</button>
	</form>
</div>
</div>
<!--轮播-->
<!--主体-->
<div class="index_sub">
	<div class="index_info">
       
	<span><marquee direction=left width="680px"><a href="<?php echo U('Desai/Index/body_gg?id='.$page['id'].'&'.'uid='.$page['uid']);?>" target="_blank"><?php echo ($page['title']); ?></a></marquee></span>
	</div>
	<div class="index_s_left">
		<div class="index_s_left_top">
			<div class="item_head">
			<a href="<?php echo U('Index/read?id=2');?>"><?php echo ($reads['class_title']); ?></a>
			</div>
			<div class="item_sub" style="height:330px;">
			<ul>
                            <?php if(is_array($read)): $i = 0; $__LIST__ = $read;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Desai/Index/body?id='.$co['id'].'&'.'uid='.$co['uid']);?>" target="_blank"><?php echo ($co['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div>
			<div class="item_foot">
			
			</div>
		</div>
		<div class="index_s_left_bottom">
			<div class="item_head">
				<span>联系我们</span>
			</div>
			<div class="item_sub" style="height:193px;">
			<div class="item_sub_c">
			<dl>
				　　    			<div>
	<span style="font-size:16px;"><span style="font-weight: bold;">联系人：<?php echo ($contact['contact_contacts']); ?></span></span></div>
<div>
	<span style="font-size:14px;"><span style="font-weight: bold;">电话：<?php echo ($contact['contact_telephone']); ?></span></span></div>
<div>
	<span style="font-size:14px;"><span style="font-weight: bold;">手机：<?php echo ($contact['contact_phone']); ?></span></span></div>
<div>
    <span style="font-size:14px;"><span style="font-weight: bold;">QQ&nbsp;：
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3172549834&site=qq&menu=yes">
                    <img style="margin-bottom: -6px;width: 56px;height: 20.17px;" border="0" src="http://wpa.qq.com/pa?p=2:3172549834:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
                </a>
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=389165447&site=qq&menu=yes">
                    <img style="margin-bottom: -6px;width: 56px;height: 20.17px;" border="0" src="http://wpa.qq.com/pa?p=2:389165447:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
                </a>
            </span></span></div>
<div>
	<span style="font-size:14px;">网址：<?php echo ($contact['contact_url']); ?></span></div>
<div>
	<span style="font-size:14px;">邮箱：<span style="font-size:12px;"><?php echo ($contact['contact_email']); ?></span></span></div>
<div>
    <span style="font-size:14px;">地址：<a style="color: #333;" href="<?php echo U('Index/ditu');?>"><?php echo ($contact['contact_address']); ?></a></span></div>
 
			</dl>
			</div>
			</div>
			<div class="item_foot">
			</div>
		</div>
	</div>
	<div class="index_s_right">
		<div class="index_s_right_top">
			<div class="item_co">
				<div class="item_co_head">
					<span>公司简介</span>
				</div>
				<div class="item_co_li" style="height:110px;">
					<div class="item_co_li_img">
						<img src="/saide.<?php echo ($company['image']); ?>" width="122" height="78"/>
					</div>
					<div class="item_co_li_con">
						<a href="<?php echo U('Index/body_gs?id='.$company['id'].'&'.'uid='.$company['uid']);?>" target="_blank"><?php echo ($company['abstract']); ?><span style="color:#e70012">[点击更多]</span></a>
					</div>
				</div>
				<div class="item_co_foot">
				</div>
			</div>
			<div class="item_li">
                        
				<div class="item_li_item">
                                        
					<div class="item_li_item_head">
					
						<div class="item_li_item_head_mark"></div>
						<div class="item_li_item_head_name"><?php echo ($info['cate_title']); ?></div>
						<div class="item_li_item_head_en">Laws</div>
					<div class="item_li_item_head_more"><a href="<?php echo U('Index/info?id='.$info['id']);?>" target="_blank">MORE</a></div>
					</div>
					<div class="item_li_item_con">
						<ul>
                                                    <?php if(is_array($information)): $i = 0; $__LIST__ = $information;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><li><a class="core" href="<?php echo U('Index/info_body?id='.$in['id'].'&'.'uid='.$info['id']);?>" target="_blank"><?php echo ($in['information_title']); ?>..</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
                                             
				</div>
                           
				<div class="item_li_item">
					<div class="item_li_item_head">
						<div class="item_li_item_head_mark"></div>
						<div class="item_li_item_head_name"><?php echo ($infor['cate_title']); ?></div>
						<div class="item_li_item_head_en">Information</div>
					<div class="item_li_item_head_more"><a href="<?php echo U('Index/info?id='.$infor['id']);?>" target="_blank">MORE</a></div>
					</div>
					<div class="item_li_item_con">
						<ul>
                                                    <?php if(is_array($information_jx)): $i = 0; $__LIST__ = $information_jx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jx): $mod = ($i % 2 );++$i;?><li ><a  class="core" href="<?php echo U('Index/info_body_gx?id='.$jx['id'].'&'.'uid='.$infor['id']);?>" target="_blank"><?php echo ($jx['information_title']); ?>..</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="index_s_right_titem">
				<div class="titem_head">
				<a href="<?php echo U('Desai/Index/read?id='.$body_cb_wzbt['id']);?>" target="_blank"><?php echo ($body_cb_wzbt['class_title']); ?></a>
				</div>
				<div class="item_sub" style="height:298px;">
					<ul>
                                            <?php if(is_array($body_cb)): $i = 0; $__LIST__ = $body_cb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Desai/Index/body?id='.$co['id'].'&'.'uid='.$co['uid']);?>" target="_blank"><?php echo ($co['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			<div class="titem_foot">
			
			</div>
			</div>
		</div>
		<div class="index_s_right_bottom">
			<div class="item_cus">
				<div class="item_cus_head">
					<div class="item_cus_head_mark"></div>
					<div class="item_cus_head_name"><?php echo ($major_customers['class_title']); ?></div>
					<div class="item_cus_head_en">Main customer</div>
					<div class="item_cus_head_more"><a href="<?php echo U('Index/major?id='.$major_customers['id']);?>" target="_blank">MORE</a></div>
				</div>
				<div class="item_cus_con">
					<ul>
                                             <?php if(is_array($major_customers_body)): $i = 0; $__LIST__ = $major_customers_body;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ma): $mod = ($i % 2 );++$i;?><li>
                                               
							<div class="item_cus_con_img">
							<a href="<?php echo U('Index/major_body?id='.$ma['id'].'&'.'uid='.$major_customers['id']);?>" target="_blank"><img src="/saide.<?php echo ($ma['image']); ?>" width="75" height="48"/></a>
							</div>
							<div class="item_cus_con_con">
							<a href="<?php echo U('Index/major_body?id='.$ma['id'].'&'.'uid='.$major_customers['id']);?>" target="_blank"><?php echo ($ma['title']); ?></a>
							</div>
                                               
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--主体-->
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