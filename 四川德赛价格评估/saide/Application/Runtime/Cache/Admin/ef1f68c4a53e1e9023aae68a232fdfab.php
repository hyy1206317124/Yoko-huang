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

<link href="/saide/Public/Admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
             <input type="hidden" name="image" id="image" >
             <input type="hidden" name="thumb_path" >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="title" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                                <select name="uid" id="uid" class="select">
					<?php echo ($cate); ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="page" name="page">
			</div>
		</div>
                <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">防伪编码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="stert" name="stert">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">内容摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <textarea name="abstract" id="abstract" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<div id="filePicker">选择图片</div>       
					<button id="btnstar" type="button" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
                            <textarea id="body" name="body" style="width:100%;height:400px;"></textarea> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button id="but" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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
<script type="text/javascript" src="/saide/Public/Admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/saide/Public/Admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/saide/Public/Admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/saide/Public/Admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    $(function(){
       $('#but').click(function(){
          var uid = $('#uid').val();
          var image = $('#image').val();
          var page = $('#page').val();
          if(!/^[0-9]*$/.test(page)){
             layer.msg('排序值请输入数字');
             return false;
          }
          if(page == ''){
            layer.msg('请输入排序值');
            return false; 
          }
          var stert = $('#stert').val();
          var abstract = $('#abstract').val();
          if(!/^[0-9A-Za-z\u4e00-\u9fa5]{10,200}$/.test(abstract)){
              layer.msg('请输入10到200的内容摘要');
              return false;
          }
          var title =$('#title').val();
          if(!/^[0-9A-Za-z\u4e00-\u9fa5]{0,300}$/.test(title)){
              layer.msg('请输入0到300的标题');
              return false;
          }
          if(title == ''){
              layer.msg("请输入标题");
              return false;
          }
          var body=UE.getEditor('body').getContent();
          if(body == ''){
              layer.msg("请输入内容");
              return false;
          }
          var url="<?php echo U('Column/column_adds');?>";
          var data={uid:uid,image:image,page:page,stert:stert,abstract:abstract,body:body,title:title};
          var dataType='json';
          $.post(
                url,
                data,
                function(d){
                        if(d.code == 0){
                            layer.msg(d.msg,{icon: 6,time:1000});
                            layer.closeAll();
                            parent.location.reload();
                            location.href = "<?php echo U('Index/index');?>";
                        }else if(d.code == 1){
                            layer.msg(d.msg,{icon: 5,time:1000});
                        }
                    },
                    dataType,
                );
                return false;
       });
    });
    
    $(function(){
        var ue = UE.getEditor('body',{
            'enterTag' : 'br' 
        });
        /*init webuploader*/  
        var $list=$("#fileList");   //这几个初始化全局的百度文档上没说明，好蛋疼。  
        var $btn =$("#btnstar");   //开始上传  
        var thumbnailWidth = 100;   //缩略图高度和宽度 （单位是像素），当宽高度是0~1的时候，是按照百分比计算，具体可以看api文档  
        var thumbnailHeight = 100;  

        var uploader = WebUploader.create({  
            // 选完文件后，是否自动上传。  
            auto: false,  

            // swf文件路径  
            swf: '/saide/Public/Admin/lib/webuploader/0.1.5/Uploader.swf',  

            // 文件接收服务端。  
            server: "<?php echo U('Admin/Column/adver_upload');?>",  

            // 选择文件的按钮。可选。  
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.  
            pick: '#filePicker',  

            // 只允许选择图片文件。  
            accept: {  
                title: 'Images',  
                extensions: 'gif,jpg,jpeg,bmp,png',  
                mimeTypes: 'image/*'  
            },
            method:'POST',  
            fileNumLimit: 1,
        });  
        // 当有文件添加进来的时候  
        uploader.on( 'fileQueued', function( file ) {  // webuploader事件.当选择文件后，文件被加载到文件队列中，触发该事件。等效于 uploader.onFileueued = function(file){...} ，类似js的事件定义。  
            var $li = $(  
                    '<div id="' + file.id + '" class="file-item thumbnail">' +  
                        '<img>' +  
                        '<div class="info">' + file.name + '</div>' +  
                    '</div>'  
                    ),  
                $img = $li.find('img');  


            // $list为容器jQuery实例  
            $list.append( $li );  

            // 创建缩略图  
            // 如果为非图片文件，可以不用调用此方法。  
            // thumbnailWidth x thumbnailHeight 为 100 x 100  
            uploader.makeThumb( file, function( error, src ) {   //webuploader方法  
                if ( error ) {  
                    $img.replaceWith('<span>不能预览</span>');  
                    return;  
                }  

                $img.attr( 'src', src );  
            }, thumbnailWidth, thumbnailHeight );  
        });  
        // 文件上传过程中创建进度条实时显示。  
        uploader.on( 'uploadProgress', function( file, percentage ) {  
            var $li = $( '#'+file.id ),  
                $percent = $li.find('.progress span');  

            // 避免重复创建  
            if ( !$percent.length ) {  
                $percent = $('<p class="progress"><span></span></p>')  
                        .appendTo( $li )  
                        .find('span');  
            }  

            $percent.css( 'width', percentage * 100 + '%' );  
        });  

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。  
        uploader.on('uploadSuccess', function( file, res) {  
            if(res.image){
                 //alert(res.img_path);
                 $("input[name='image']").val(res.image);

                 //alert($("input[name='img_path']").val());
            }
            $( '#'+file.id ).addClass('upload-state-done');  
        });

        // 文件上传失败，显示上传出错。  
        uploader.on( 'uploadError', function( file ) {  
            var $li = $( '#'+file.id ),  
                $error = $li.find('div.error');  

            // 避免重复创建  
            if ( !$error.length ) {  
                $error = $('<div class="error"></div>').appendTo( $li );  
            }  

            $error.text('上传失败');  
        });  

        // 完成上传完了，成功或者失败，先删除进度条。  
        uploader.on( 'uploadComplete', function( file ) {  
            $( '#'+file.id ).find('.progress').remove();  
        });  
           $btn.on( 'click', function() {  
             //console.log("上传...");  
             uploader.upload();  
             layer.msg('上传成功',{icon: 6,time:1000});
             //console.log("上传成功");  
             //alert('上传成功');
           });  
});
</script>
</body>
</html>