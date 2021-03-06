<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>  
<html>  
<head>  
    <link rel="Bookmark" href="/saide/Public/Desai/desai.jpeg" />
    <link rel="Shortcut Icon" href="/saide/Public/Desai/desai.jpeg" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <title>四川德赛价格评估有限公司 </title>  
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 95.5%;overflow: hidden;margin:0;font-family:"微软雅黑";}
        .cbox{
	width:98%;
	margin:8px auto 0px;;
         }
         .footer{
	text-align:center;
	margin-top:10px;
	border-top:1px solid #DDD;
	font-size:12px;
	line-height:37px;
        }
        a{
	color:#03F;
        }
        a:hover{
                color:#F30;
                text-decoration:none;
        }
	</style> 
</head>  
<body>
    
    <div id="allmap"></div>
    <div id='box' style="position: absolute;top: 28px;left: 57px;color: #009999"></div>
    <div class="footer cbox">
	Powered by <a href="<?php echo U('Index/index');?>" target="_blank">四川德赛价格评估有限公司</a>
    </div>
 <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YDX56vbCDHg2cC0XiGoRMCKDyX5LslWp"></script>
 <script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
 <script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(104.077926,30.666421), 18);  // 初始化地图,设置中心点坐标和地图级别
	//添加地图类型控件
	map.addControl(new BMap.MapTypeControl({
		mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));	  
	map.setCurrentCity("成都");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        //获取经纬度 
        var geoc = new BMap.Geocoder();   
	//单击获取点击的经纬度
	map.addEventListener("onmousemove",function(e){
		var pt = e.point;
		geoc.getLocation(pt, function(rs){
			var addComp = rs.addressComponents;
                     document.getElementById("box").innerHTML = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
		}); 
	});
         map.addOverlay(map)
        // 添加带有定位的导航控件
  var navigationControl = new BMap.NavigationControl({
    // 靠左上角位置
    anchor: BMAP_ANCHOR_TOP_LEFT,
    // LARGE类型
    type: BMAP_NAVIGATION_CONTROL_LARGE,
    // 启用显示定位
    enableGeolocation: true
  });
  map.addControl(navigationControl);
  // 添加定位控件
  var geolocationControl = new BMap.GeolocationControl();
  geolocationControl.addEventListener("locationSuccess", function(e){
    // 定位成功事件
    var address = '';
    address += e.addressComponent.province;
    address += e.addressComponent.city;
    address += e.addressComponent.district;
    address += e.addressComponent.street;
    address += e.addressComponent.streetNumber;
    alert("当前定位地址为：" + address);
  });
  geolocationControl.addEventListener("locationError",function(e){
    // 定位失败事件
    alert(e.message);
  });
  map.addControl(geolocationControl);
var poi = new BMap.Point(104.077926,30.666421);
    map.centerAndZoom(poi, 18);
    map.enableScrollWheelZoom();

    var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                    '<img src="/saide/Public/guoji.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                    '地址：四川省成都市青羊区顺城大街206号四川国际大厦23楼<br/>电话：028-86532088<br/>手机：158-8222-8189<br/>简介：四川德赛价格评估有限公司位于四川国际大夏23楼，为德赛价格评估公司总部。' +
                  '</div>';

    //创建检索信息窗口对象
    var searchInfoWindow = null;
	searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
			title  : "<div style='color:red;font-weight: bold;'>四川德赛价格评估有限公司</div>",      //标题
			width  : 290,             //宽度
			height : 125,              //高度
			panel  : "panel",         //检索结果面板
			enableAutoPan : true,     //自动平移
			searchTypes   :[
				BMAPLIB_TAB_SEARCH,   //周边检索
				BMAPLIB_TAB_TO_HERE,  //到这里去
				BMAPLIB_TAB_FROM_HERE //从这里出发
			]
		});
    var marker = new BMap.Marker(poi); //创建marker对象
    marker.enableDragging(); //marker可拖拽
    marker.addEventListener("click", function(e){
	    searchInfoWindow.open(marker);
    })
    map.addOverlay(marker); //在地图中添加marker
</script>
</body>  
</html>