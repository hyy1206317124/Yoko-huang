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
<link rel="stylesheet" href="/saide/Public/Admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/saide/Public/Admin/CSS/page.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>产品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span>资讯分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
                  <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
                <a class="btn btn-primary radius" onclick="picture_add('添加分类','<?php echo U('Information/information_cate_add');?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
            </span>
                <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
                                    <th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
                                        <th width="80">PID</th>
					<th width="100">分类</th>
					<th width="150">创建时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
                        <?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><tbody>
				<tr class="text-c" id="ad_id<?php echo $ro['id'];?>">
					<td><input name="ad_id" type="checkbox" value="<?php echo ($ro['id']); ?>"></td>
					<td><?php echo ($ro['id']); ?></td>
                                        <td><?php echo ($ro['pid']); ?></td>
                                        <td >
                                            <a href="<?php echo U('Information/information_cate_lists?id='.$ro['id']);?>"><?php echo ($ro['cate_title']); ?></a>
                                        </td>
					<td><?php echo (date("Y-m-d H:i:s",$ro['cate_time'])); ?></td>
                                        <td>
                                            <a style="text-decoration:none" class="ml-5" onClick="picture_cate_add('增加子类','<?php echo U('Information/cate_add?id='.$ro['id']);?>')" href="javascript:;" title="增加子类"><i class="Hui-iconfont">&#xe6f3;</i></a>
                                            <a style="text-decoration:none" class="ml-5" onClick="picture_edit('分类编辑','<?php echo U("Information/information_cate_update?id=".$ro["id"]);?>','1','800','500')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
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
<script type="text/javascript" src="/saide/Public/Admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script> 
<script type="text/javascript">
    /*-增加*/
function picture_add(title,url,w,h){
	layer_show(title,url,w,h);
}
function picture_cate_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?php echo U("Information/information_cate_delete");?>',
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
            url:"<?php echo U('Information/information_cate_delete_all');?>",
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
/*编辑*/
function picture_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
//var setting = {
//	view: {
//		dblClickExpand: false,
//		showLine: false,
//		selectedMulti: false
//	},
//	data: {
//		simpleData: {
//			enable:true,
//			idKey: "id",
//			pIdKey: "pId",
//			rootPId: ""
//		}
//	},
//	callback: {
//		beforeClick: function(treeId, treeNode) {
//			var zTree = $.fn.zTree.getZTreeObj("tree");
//			if (treeNode.isParent) {
//				zTree.expandNode(treeNode);
//				return false;
//			} else {
//				demoIframe.attr("src",treeNode.file + ".html");
//				return true;
//			}
//		}
//	}
//};

//var zNodes =[
//	{ id:1, pId:0, name:"一级分类", open:true},
//	{ id:11, pId:1, name:"二级分类"},
//	{ id:111, pId:11, name:"三级分类"},
//	{ id:112, pId:11, name:"三级分类"},
//	{ id:113, pId:11, name:"三级分类"},
//	{ id:114, pId:11, name:"三级分类"},
//	{ id:115, pId:11, name:"三级分类"},
//	{ id:12, pId:1, name:"二级分类 1-2"},
//	{ id:121, pId:12, name:"三级分类 1-2-1"},
//	{ id:122, pId:12, name:"三级分类 1-2-2"},
//];
//		
//var code;
//		
//function showCode(str) {
//	if (!code) code = $("#code");
//	code.empty();
//	code.append("<li>"+str+"</li>");
//}
//		
//$(document).ready(function(){
//	var t = $("#treeDemo");
//	t = $.fn.zTree.init(t, setting, zNodes);
//	demoIframe = $("#testIframe");
//	//demoIframe.on("load", loadReady);
//	var zTree = $.fn.zTree.getZTreeObj("tree");
//	//zTree.selectNode(zTree.getNodeByParam("id",'11'));
//});
</script>
</body>
</html>