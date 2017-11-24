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
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/CSS/page.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>留言</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 留言管理 <span class="c-gray en">&gt;</span>留言列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="60">ID</th>
					<th width="60">留言者</th>
                                        <th width="150">留言主题</th>
                                        <th width="100">联系方式</th>
                                        <th width="100">QQ/MSN</th>
					<th>留言内容</th>
					<th width="100">操作</th>
				</tr>
			</thead>
                        <?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><tbody>
				<tr class="text-c" id="ad_id<?php echo $ro['id'];?>">
					<td><input type="checkbox" value="<?php echo ($ro['id']); ?>" name="ad_id"></td>
					<td><?php echo ($ro['id']); ?></td>
					<td><?php echo ($ro['full_name']); ?></td>
                                        <td><?php echo ($ro['subject']); ?></td>
                                        <td><?php echo ($ro['phone']); ?></td>
                                        <td><?php echo ($ro['qq']); ?></td>
                                        <td class="text-l"><div class="c-999 f-12">
							<u style="cursor:pointer" class="text-primary" onclick="member_show('张三','','10001','360','400')"><?php echo ($ro['full_name']); ?></u> <time title="" datetime=""><?php echo (date("Y-m-d H:i:s",$ro['time'])); ?></time> <span class="ml-20"><?php echo ($ro['phone']); ?></span></div>
<!--							<div class="f-12 c-999"><a href="http://www.h-ui.net/Hui-4.22-comment.shtml" target="_blank">http://www.h-ui.net/Hui-4.22-comment.shtml</a></div>-->
						<div><?php echo ($ro['message']); ?></div></td>
					<td class="td-manage">
                                            <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo ($ro['id']); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                                        </td>
				</tr>
			</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
        <div class="pages"><?php echo ($show); ?></div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/saide/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/layer/2.4/layer.js"></script>  
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/saide/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
//$(function(){
//	$('.table-sort').dataTable({
//		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
//		"bStateSave": true,//状态保存
//		"aoColumnDefs": [
//		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//		  {"orderable":false,"aTargets":[0,2,4]}// 制定列不参与排序
//		]
//	});
//
//});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("Feedback/feedback_delete");?>',
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
            url:"<?php echo U('Feedback/feedback_delete_all');?>",
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
</script>
</body>
</html>