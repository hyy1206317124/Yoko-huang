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
<title>文章列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<!--	<div class="text-c">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>-->
	<div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
                <a class="btn btn-primary radius" onclick="picture_add('添加内容','<?php echo U('Information/information_add');?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加内容</a>
            </span> 
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
                            
				<tr class="text-c" >
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
					<th width="100">分类</th>
					<th width="150" >标题</th>
                                        <th width="100">来源</th>
					<th width="150">发布时间</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
                        
                        <?php if(is_array($join)): $i = 0; $__LIST__ = $join;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><tbody>
				<tr class="text-c" id="ad_id<?php echo $ro['id'];?>">
					<td><input name="ad_id" type="checkbox" value="<?php echo ($ro['id']); ?>"></td>
					<td><?php echo ($ro['id']); ?></td>
					<td><?php echo ($ro['cate_title']); ?></td>
					<td class="text-l"><a class="maincolor" href="javascript:;" onClick="picture_edit('编辑','','10001')"><?php echo ($ro['information_title']); ?></a></td>
                                        <td><?php echo ($ro['source']); ?></td>
					<td><?php echo (date("Y-m-d H:i:s",$ro['information_time'])); ?></td>
                                       <?php if($ro['status'] == 1){ ?>
                                        <td class="td-status"><span class="label label-success radius" flag="<?php echo $ro['status'];?>" onClick="picture_stop(this,<?php echo ($ro['id']); ?>)">已发布</span></td>
                                        <?php }elseif($ro['status'] == -1){ ?>
                                        <td class="td-status"><span class="label radius" flag="<?php echo $ro['status'];?>" onClick="picture_stop(this,<?php echo ($ro['id']); ?>)">已下架</span></td>
                                        <?php } ?>
					<td class="td-manage">
                                            <a style="text-decoration:none" class="ml-5" onClick="picture_edit('编辑','<?php echo U("Information/information_update?id=".$ro["id"]);?>','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
                                            <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'<?php echo ($ro['id']); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
<script type="text/javascript" src="/saide/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/saide/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
//$('.table-sort').dataTable({
//	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
//	"bStateSave": true,//状态保存
//	"aoColumnDefs": [
//	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
//	]
//});

/*-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*-查看*/
function picture_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}


/*-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*
 * 内容发布详情
 */
function picture_stop(ob,id){
    var flag = $(ob).attr('flag');
    $.ajax({
        url:'<?php echo U("Information/status");?>',
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
                    $(ob).text('已下架');
                }else if(flag == -1){
                    $(ob).addClass('label-success');
                    $(ob).attr('flag',1);
                    $(ob).text('已发布');
                   
                }
            }
        },
        error:function(){
            layer.msg('请求失败',{icon: 5,time:1000});
        }
        
    });
    
}
/*-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("Information/information_delete");?>',
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
            url:"<?php echo U('Information/information_delete_all');?>",
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