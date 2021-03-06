<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/saide/Public/Admin//favicon.ico" >
<link rel="Shortcut Icon" href="/saide/Public/Admin//favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/CSS/page.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
               
               <?php if(session('role') == 2){ ?>
               <a href="javascript:;" onclick="" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
                <a href="#" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>
                <?php }else if(cookie('role') == 1){ ?>
                <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
                <a href="javascript:;" onclick="admin_add('添加管理员','<?php echo U('User/add');?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>
                <?php } ?>
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
                <?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><tbody>
			<tr class="text-c" id="ad_id<?php echo $ro['id'];?>">
				<td><input type="checkbox" value="<?php echo ($ro['id']); ?>" name="ad_id"></td>
				<td><?php echo ($ro['id']); ?></td>
				<td><?php echo ($ro['name']); ?></td>
				<td><?php echo ($ro['phone']); ?></td>
				<td><?php echo ($ro['email']); ?></td>
                                <td><?php
 if($ro['role'] == 2){ print "管理员"; } ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$ro['time'])); ?></td>
                                
                                <?php if(session('role') == 2){ ?>
                                
                                 <?php if($ro['status'] == 1){ ?>
                                    <td class="td-status"><span class="label label-success radius">已启用</span></td>
                                    <?php }elseif($ro['status'] == -1){ ?>
                                    <td class="td-status"><span class="label radius">已停用</span></td>
                                    <?php } ?>
				<td class="td-manage">
                                    <a title="编辑" href="javascript:;" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                                    <a title="删除" href="javascript:;" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                                <?php }else if(cookie('role') == 1){ ?>
                                
                               <?php if($ro['status'] == 1){ ?>
                                    <td class="td-status"><span class="label label-success radius" flag="<?php echo $ro['status'];?>" onClick="admin_stop(this,<?php echo ($ro['id']); ?>)">已启用</span></td>
                                    <?php }elseif($ro['status'] == -1){ ?>
                                    <td class="td-status"><span class="label radius" flag="<?php echo $ro['status'];?>" onClick="admin_stop(this,<?php echo ($ro['id']); ?>)">已停用</span></td>
                                    <?php } ?>
				<td class="td-manage">
                                    <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo U("User/update?id=".$ro["id"]);?>','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                                    <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo ($ro['id']); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                                <?php } ?>
			</tr>
		</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
    <div class="pages"><?php echo ($show); ?></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/saide/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("User/delete");?>',
                        data:{id:id},
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
/*批量删除*/

function datadel(){
    //alert(1);
    var id_arr = [];
    $("input[name='ad_id']:checked").each(function(index,ele){
        id_arr.push($(ele).val());
    });
    
    var id_str = id_arr.join(',');
    
    layer.confirm('确认要删除吗？',function(index){
        if(id_arr.length <= 0){
            layer.msg('请选择要删除的选项');
            return false;
        }
        
        $.ajax({
            url:"<?php echo U('User/delete_all');?>",
            data:{id:id_str},
            type:'post',
            dataType:'json',
            success:function(ret){
                //layer.msg(ret);
                if(ret.code == 1){
                    layer.msg(ret.msg);
                    var len = id_arr.length;
                    for(var i=0; i<len; i++){
                        $("#ad_id"+id_arr[i]).remove();
                    }
                }else if(ret.code == -1){
                    layer.msg(ret.msg);
                }
            },
            error:function(){
                layer.msg('请求失败');
            }
        });
	});
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
function admin_stop(ob,id){
    var flag = $(ob).attr('flag');
    $.ajax({
        url:'<?php echo U("User/status");?>',
        data:{id:id,flag:flag},
        type:'post',
        dataType:'json',
        success:function(data){
            if(data.code == -1){
                layer.msg(data.msg,{icon: 5,time:1000});
            }else if(data.code == 1){
                layer.msg(data.msg, {icon: 6,time:1000});
                if(flag == 1){
                    $(ob).removeClass('label-success');
                    $(ob).attr('flag',-1);
                    $(ob).text('已停用');
                }else if(flag == -1){
                    $(ob).addClass('label-success');
                    $(ob).attr('flag',1);
                    $(ob).text('已启用');
                   
                }
            }
        },
        error:function(){
            layer.msg('请求失败',{icon: 5,time:1000});
        }
        
    });
    
}
///*管理员-停用*/
//function admin_stop(obj,id){
//	layer.confirm('确认要停用吗？',function(index){
//		//此处请求后台程序，下方是成功后的前台处理……
//		
//		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
//		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
//		$(obj).remove();
//		layer.msg('已停用!',{icon: 5,time:1000});
//	});
//}
//
///*管理员-启用*/
//function admin_start(obj,id){
//	layer.confirm('确认要启用吗？',function(index){
//		//此处请求后台程序，下方是成功后的前台处理……
//		
//		
//		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
//		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
//		$(obj).remove();
//		layer.msg('已启用!', {icon: 6,time:1000});
//	});
//}
</script>
</body>
</html>