<?php
/**
 * 自定义方法
 * User: Administrator
 * Date: 2015/10/15
 * Time: 14:47
 */
/**
 * 自定义函数库
 */

//该函数实现根据无限分类path字段逗号个数来输出缩进样式
//模板里使用示例：{:countPath($vo['path'])}{$vo.cat_name}
//require_once("conn.class.php");



function verify($len=4,$width=100,$height=40,$font_size=20,$font_type="arial.ttf"){
    $verify = get_rand_str($len);
    $_SESSION['verify'] = $verify;
    $len = strlen($verify);
    $img = imagecreatetruecolor($width, $height); 
    // 定义要用到的颜色
    $back_color = imagecolorallocate($img, 235, 236, 237);
    $boder_color = imagecolorallocate($img, 118, 151, 199);

    // 画背景
    imagefilledrectangle($img, 0, 0, $width, $height, $back_color); 
    // 画边框
    imagerectangle($img, 0, 0, $width-1, $height-1, $boder_color);
    // 画干扰线
    for($i = 0;$i < 5;$i++) {
        $line_color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imageline($img, 0, mt_rand(0,$height), $width, mt_rand(0,$height), $line_color);
    } 
    // 画干扰点
    for($i = 0;$i < 100;$i++) {
        $point_color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imagesetpixel($img, mt_rand(0, $width), mt_rand(0, $height), $point_color);
    } 
    //写数据
    for($i=0; $i<$len; $i++){
        $code = substr($verify,$i,1);
        $text_color = imagecolorallocate($img, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120)); 
        imagefttext($img,$font_size,mt_rand(5,50),($width-$font_size*$len)/2+($i*$font_size),($font_size+$height)/2,$text_color,$font_type,$code);
    }
    //imagefttext($img,$font_size,0,($width-$font_size*$len)/2,($font_size+$height)/2,$text_color,$font_type,$verify);
    header("Content-type: image/png");
    imagepng($img);
    imagedestroy($img);
}
//随机字符串
function get_rand_str($len){
    $str = "1234567890asdfghjklqwertyuiopzxcvbnmASDFGHJKLZXCVBNMPOIUYTREWQ";
    return substr(str_shuffle($str),0,$len);
}
//图片上传
function upload(){
    $file = $_FILES['file'];//得到传输的数据
    $file_size = $file['size'];
    $file_max_size = 1024*1024*10;//10M
    $tmp_file = $file['tmp_name'];
    $file_name = $file['name'];

    $file_info = getimagesize($tmp_file);//获取文件信息
    $type = $file_info['mime'];

    //验证文件类型
    $type_arr = array('image/jpeg','image/jpg','image/png','image/gif');
    if(!in_array($type,$type_arr)){
        die('文件类型不存在，请上传....');
    }
    
    //验证文件大小
    if($file_size > $file_max_size || $file_size <=0){
        die('请上传合法大小的文件');
    }
    
    //验证是否是post上传的
    if(!is_uploaded_file($tmp_file)){
        die('文件上传失败');
    }
    $type = explode('/',$type);
    $new_name = date('YmdHis').rand(10000,99999);
    $dir = './appimg/'.date("Ymd").'/';
    
    
    if(!file_exists($dir)){
        mkdir($dir,0777,true);
    }

    $destination = $dir.$new_name.'.'.$type[1];
    //var_dump($destination);die;
    
    //讲本地文件移动到服务器上
    $ret = move_uploaded_file($tmp_file,$destination);
    if($ret){
        return $destination;
    }else{
        return false;
    }
}


function my_redirect($msg,$url,$sec = 5){
    $str = '<!DOCTYPE html>
    <html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
        <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

        <link rel="shortcut icon" href="favicon.ico"> <link href="'.ROOT_URL.'/script/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
        <link href="'.ROOT_URL.'/script/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

        <link href="'.ROOT_URL.'/script/Admin/css/animate.min.css" rel="stylesheet">
        <link href="'.ROOT_URL.'/script/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center animated fadeInDown">
            
            <h3 class="font-bold">'.$msg.'</h3>
            <h3 class="font-bold"><span id="sec">'.$sec.'</span>秒后跳转</h3>
            <a href="'.$url.'">立即跳转</a>
        </div>
        <script src="'.ROOT_URL.'/script/Admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="'.ROOT_URL.'/script/Admin/js/bootstrap.min.js?v=3.3.6"></script>
        <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    </body>
   
    <script >
        function redirect(){
            var sec = $("#sec").text();
            sec = parseInt(sec);
            sec--;
            if(sec<=0){
                sec = 0;
                clearInterval(t);
                window.location.href="'.$url.'"
            }
            $("#sec").text(sec);
        }

        
        var t = setInterval("redirect()",1000);
        
    </script>
    </html>';

    echo $str;
}


function countpath($path){

    $num=substr_count($path,",")-1;


    return str_repeat('&nbsp;',$num*5).'|--';
}
function findart($cid){
    $rs=M("article")->where(array("aid"=>$cid))->getField("aname");
    return $rs;
}
function revertime($time){
    return date("Y-m-d",$time);
}
function node($method){
    $rs=M("think_node")->where(array("name"=>$method))->getField("remark");
    return $rs;
}

//该函数实现根据中文字符串截取,默认截取255个字
//By yjc 2014-10-18
function strlens($strs){
    $s=strip_tags($strs,"</br>");
    $str=mb_substr($s,0,80,"utf-8");
    $length=mb_strlen($str);
    if($length<50){
        return $str;
    }else{
        return str_pad($str,($length+3),"...");
    }
}

//转义表单'
function filter($content){
    if(get_magic_quotes_gpc()==0) {//如果系统没有开启转义，就转义'
        return addslashes($content);//转义
    }
}


/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
//function getpage(&$m,$where="",$pagesize=10){ 
//    $m1=clone $m;//浅复制一个模型
//    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
//	$m=$m1;//为保持在为定的连惯操作，浅复制一个模型
//    $p=new Think\Page($count,$pagesize);
//    $p->lastSuffix=false;
//    // $p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录  %NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li></ul>');
//    $p->setConfig('prev','上一页');
//    $p->setConfig('next','下一页');
//    $p->setConfig('last','末页');
//    $p->setConfig('first','首页');
//    $p->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><span>%HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</span></ul>");
//    //$p->parameter=I('get.');
//    $m->limit($p->firstRow,$p->listRows);  
//    return $p;
//}

function test(){
    echo 1111;
}

//支付宝支付接口调用
function alipay($orderno,$ordername,$money,$body="",$show_url=""){
    vendor('alipay.lib.alipay_submit#class');

    $alipay_config=C('alipay_config');
    $seller_email = C('alipay.seller_email');//卖家支付宝帐户,必填

    $payment_type = "1"; //支付类型 //必填，不能修改
    $notify_url = C('alipay.notify_url'); //服务器异步通知页面路径
    $return_url = C('alipay.return_url'); //页面跳转同步通知页面路径
    $seller_email = C('alipay.seller_email');//卖家支付宝帐户必填

    $out_trade_no = $orderno;//商户订单号,商户网站订单系统中唯一订单号，必填
    $subject = $ordername; //订单名称,必填
    $total_fee = $money;//付款金额,必填

    $body = "";//订单描述
    $show_url = "";//商品展示地址
    //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

    $anti_phishing_key = "";//防钓鱼时间戳
    //若要使用请调用类文件submit中的query_timestamp函数

    $exter_invoke_ip = "";//客户端的IP地址
    //非局域网的外网IP地址，如：221.0.0.1


    /************************************************************/

    //构造要请求的参数数组，无需改动
    $parameter = array(
        "service" => "create_direct_pay_by_user",
        "partner" => trim($alipay_config['partner']),
        "payment_type"	=> $payment_type,
        "notify_url"	=> $notify_url,
        "return_url"	=> $return_url,
        "seller_email"	=> $seller_email,
        "out_trade_no"	=> $out_trade_no,
        "subject"	=> $subject,
        "total_fee"	=> $total_fee,
        "body"	=> $body,
        "show_url"	=> $show_url,
        "anti_phishing_key"	=> $anti_phishing_key,
        "exter_invoke_ip"	=> $exter_invoke_ip,
        "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
    );

    //建立请求
    $alipaySubmit = new AlipaySubmit($alipay_config);
    $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
    echo $html_text;
}

/******************************
支付宝页面跳转同步通知页面
 *******************************/
function returnurl(){
    vendor('alipay.lib.alipay_notify#class');
    $alipay_config=C('alipay_config');

    //计算得出通知验证结果
    $alipayNotify = new AlipayNotify($alipay_config);
    $verify_result = $alipayNotify->verifyReturn();
    if($verify_result){//验证成功
        $out_trade_no   = $_GET['out_trade_no'];      //商户订单号
        $trade_no       = $_GET['trade_no'];          //支付宝交易号
        $trade_status   = $_GET['trade_status'];      //交易状态
        $total_fee      = $_GET['total_fee'];         //交易金额
        $notify_id      = $_GET['notify_id'];         //通知校验ID。
        $notify_time    = $_GET['notify_time'];       //通知的发送时间。
        $buyer_email    = $_GET['buyer_email'];       //买家支付宝帐号

        $parameter = array(
            "out_trade_no"     => $out_trade_no, //商户订单编号；
            "trade_no"     => $trade_no,     //支付宝交易号；
            "total_fee"     => $total_fee,    //交易金额；
            "trade_status"     => $trade_status, //交易状态
            "notify_id"     => $notify_id,    //通知校验ID。
            "notify_time"   => $notify_time,  //通知的发送时间。
            "buyer_email"   => $buyer_email,  //买家支付宝帐号；
        );

        if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
            return $parameter;
        }else {
            return false;
        }

    }else {
        return false;
    }
}

/******************************
服务器异步通知页面方法
其实这里就是将notify_url.php文件中的代码复制过来进行处理
 *******************************/
function notifyurl(){
    vendor('alipay.lib.alipay_notify#class');
    $alipay_config=C('alipay_config');

    //计算得出通知验证结果
    $alipayNotify = new AlipayNotify($alipay_config);
    $verify_result = $alipayNotify->verifyNotify();

    if($verify_result) {//验证成功
        $out_trade_no   = $_POST['out_trade_no'];      //商户订单号
        $trade_no       = $_POST['trade_no'];          //支付宝交易号
        $trade_status   = $_POST['trade_status'];      //交易状态
        $total_fee      = $_POST['total_fee'];         //交易金额
        $notify_id      = $_POST['notify_id'];         //通知校验ID。
        $notify_time    = $_POST['notify_time'];       //通知的发送时间。格式为yyyy-MM-dd HH:mm:ss。
        $buyer_email    = $_POST['buyer_email'];       //买家支付宝帐号；

        $parameter = array(
            "out_trade_no"     => $out_trade_no,      //商户订单编号；
            "trade_no"     => $trade_no,          //支付宝交易号；
            "total_fee"      => $total_fee,         //交易金额；
            "trade_status"     => $trade_status,      //交易状态
            "notify_id"      => $notify_id,         //通知校验ID。
            "notify_time"    => $notify_time,       //通知的发送时间。
            "buyer_email"    => $buyer_email,       //买家支付宝帐号
        );

        if($_POST['trade_status'] == 'TRADE_FINISHED') {
            //
        }else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
            return $parameter;
        }
    }else {
        return false;
    }
}

//生成商品编号
function goodscode(){
    return 'gd'.time().rand(100,999);
}

//生成订单编号
function ordercode(){
    return time().rand(10,99);
}

/**************************************************************
 *
 *	使用特定function对数组中所有元素做处理
 *	@param	string	&$array		要处理的字符串
 *	@param	string	$function	要执行的函数
 *	@return boolean	$apply_to_keys_also		是否也应用到key上
 *	@access public
 *
 *************************************************************/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
    static $recursive_counter = 0;
    if (++$recursive_counter > 1000) {
        die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter--;
}

/**************************************************************
 *
 *	将数组转换为JSON字符串（兼容中文）
 *	@param	array	$array		要转换的数组
 *	@return string		转换得到的json字符串
 *	@access public
 *
 *************************************************************/
function JSON($array) {
    arrayRecursive($array, 'urlencode', false);
    iconv('gbk','utf8');
    $json = json_encode($array);
    return urldecode($json);
}
/**
 * 友好的时间显示
 *
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @param string $alt   已失效
 * @return string
 */
function friendlyDate($sTime,$type = 'normal',$alt = 'false') {
    if (!$sTime)
        return '';
    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime      =   time();
    $dTime      =   $cTime - $sTime;
    $dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    //$dDay     =   intval($dTime/3600/24);
    $dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    //normal：n秒前，n分钟前，n小时前，日期
    if($type=='normal'){
        if( $dTime < 60 ){
            if($dTime < 10){
                return '刚刚';    //by yangjs
            }else{
                return intval(floor($dTime / 10) * 10)."秒前";
            }
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
            //今天的数据.年份相同.日期相同.
        }elseif( $dYear==0 && $dDay == 0  ){
            //return intval($dTime/3600)."小时前";
            return '今天'.date('H:i',$sTime);
        }elseif($dYear==0){
            return date("m月d日 H:i",$sTime);
        }else{
            return date("Y-m-d H:i",$sTime);
        }
    }elseif($type=='mohu'){
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif( $dDay > 0 && $dDay<=7 ){
            return intval($dDay)."天前";
        }elseif( $dDay > 7 &&  $dDay <= 30 ){
            return intval($dDay/7) . '周前';
        }elseif( $dDay > 30 ){
            return intval($dDay/30) . '个月前';
        }
        //full: Y-m-d , H:i:s
    }elseif($type=='full'){
        return date("Y-m-d , H:i:s",$sTime);
    }elseif($type=='ymd'){
        return date("Y-m-d",$sTime);
    }else{
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif($dYear==0){
            return date("Y-m-d H:i:s",$sTime);
        }else{
            return date("Y-m-d H:i:s",$sTime);
        }
    }


}

function trans($data){

    return  sprintf(" %.2f KB", $data / 1024);
}
function getdianpu($dian){

	$u=M("user")->where(array("id"=>$dian))->find();
	return $u['user_id'];
}
function getname($user){

	$u=M("user")->where(array("id"=>$user))->find();
	return $u['user_id'];
}
function teamnum($user){ 
	$num=M()->query("select count(id) num from adp_user start with id = '$user' connect by nocycle dianpu =prior id ");
	return $num[0]['num']-1;
}
//总收益
function allincome($id){
	//60091
	//60029
	if($id==60091||$id==60029||$id==60089||$id==60092||$id==60088){
		return 0;
	}
	else{
		$buy=M("buy")->where(array("user_id"=>$id,"status"=>1))->sum("e_moneys");
		$sale=M("sale")->where(array("user_id"=>$id,"status"=>1))->sum("e_moneys");
		$allincome=$sale-$buy;
		return $allincome;
	}
	
}
function allteam($id){ 
		
		$conn=Conn::getInstance()->getConn();
	 //$conn= oci_connect('system','maxdb','125.66.246.42/maxdb','gbk');
	$sql = 'BEGIN allincome(:in_id, :sums); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':in_id',$id,32);
	oci_bind_by_name($stmt,':sums',$message,32);
	$ret=ociexecute($stmt);
		if($ret){
			return $message;
		}
		else{
			return 0;
		}
}

function getConn(){
    $conn=Conn::getInstance()->getConn();
    return $conn;
}
//静态钱包
function staticmoney($id){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN staticmoney(:in_id, :staticSUMS); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':in_id',$id,32);
	oci_bind_by_name($stmt,':staticSUMS',$message,32);
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	}
	else{
		return 0;	
	}
}
//动态钱包
function dynamicmoney($id){
	//60091
	//60029
	if($id==60091||$id==60029||$id==60089||$id==60092||$id==60088){
		return 0;
	}else{
		$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN dynamicmoney(:in_id, :dynamicSUMS); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':in_id',$id,32);
	oci_bind_by_name($stmt,':dynamicSUMS',$message,32);
	$ret=ociexecute($stmt);
	
		if($ret){
			
			return $message;
			
		}
		else{
			return 0;
		}
	}
	
}
function ordermoney($v){   //订单金额
	$sum=M("honest_prize")->where(array("b_id"=>$v['id'],"b_user_id"=>$v['user_id']))->sum("e_moneys"); //利息\
	$sum=$v['e_moneys']+$sum-$v['add_money'];
	return $sum;
} 
//已解债
function outdebt($id){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN out_debt(:in_id, :e_money); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':in_id',$id,32);
	oci_bind_by_name($stmt,':e_money',$message,32); 
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	}
	else{
		return 0;
	}
}
function out_debts($id){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN OUT_DEBTS(:in_id, :e_money); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':in_id',$id,32);
	oci_bind_by_name($stmt,':e_money',$message,32); 
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	} 
	else{
		return 0;
	}
}
	function checkorder($order){
	$orders=M("buy")->where(array("sn"=>$order))->find();
	if(!empty($orders)){
			$order="P".date("Ymd",time()).rand(1000000,9999999);
		checkorder($order);
	}
	return $order;
}

function changemoney($v){
	$e=M("dynamic")->where(array("user_id"=>$v['id'],"type"=>7))->sum("b_moneys");
	$out=outdebt($v['id']);
	return $v['e_money']-$e-$out;
}
function changbmoney($v){
		$b=M("dynamic")->where(array("user_id"=>$v['id'],"type"=>8))->sum("b_moneys");
		return $v['b_money']-$b;
}

//卖方确认收款时调用
function update_order($c_id){
    $conn=Conn::getInstance()->getConn();
    $sql = 'BEGIN IS_COMPLETE_ALL_ORDER (:c_id) ; END;';
    $stmt = oci_parse($conn,$sql);
    oci_bind_by_name($stmt,':c_id',$c_id,32);
    $ret=ociexecute($stmt);
    if($ret){
        return $c_id;
    }
    else{
        return false;
    }
}


//统计所有新动态钱包
function alldynamic(){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN alldynamicmoney(:dynamicSUMS); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':dynamicSUMS',$message,32);
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	}
	else{
		return 0;
	}
}
//统计所有新静态钱包
function allstatic(){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN allstaticmoney(:staticSUMS); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':staticSUMS',$message,32);
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	}
	else{
		return 0;
	}
}
function alloutdebt(){
	$conn=Conn::getInstance()->getConn();
	$sql = 'BEGIN allOUT_DEBT(:E_MONEY); END;';
	$stmt = oci_parse($conn,$sql);
	oci_bind_by_name($stmt,':E_MONEY',$message,32);
	$ret=ociexecute($stmt);
	if($ret){
		return $message;
	}
	else{
		return 0;
	}
}
function getordersn($orderid){
	if(!empty($orderid)){
		$s=M("buy")->field("sn")->where(array("id"=>$orderid))->find();
		return $s['sn'];
	}
	else{
		return "";
	}
	
	
}
function orderemoney($orderid){
	if(!empty($orderid)){
		$s=M("buy")->field("e_moneys")->where(array("id"=>$orderid))->find();
		return $s['e_moneys'];
	}
	else{
		
		return 0; 
	} 
	function getname($name){
		if(!empty($name)){
			$user=M("user")->field("user_id")->where(array("id"=>$name))->find();
			return $user['user_id'];
		}
		else{
			return "";
		}
	}
	
}
function getchild($id){
	$c=M("user")->where(array("ppid"=>$id))->count();
	return $c;
}
function getmobile($id){
	$m=M("user")->field("mobile")->where(array("id"=>$id))->find();
	return $m['mobile'];
}
function getcardname($id){
	$m=M("user")->field("card_name")->where(array("id"=>$id))->find();
	return $m['card_name']; 
}
function sale($id){
	$uid=session("uuid");
	$ss=M("dynamic")->where(array("user_id"=>$uid,"type"=>3))->sum("b_moneys");
	$m=M("dynamic")->field("b_moneys")->where(array("b_id"=>$id,"type"=>6))->find();
	$mm=M("dynamic")->where(array("b_id"=>$id,"type"=>3))->sum("b_moneys");
}

function to_string(){
    $str = "qwertyuiopasdfghjklzxcvbnm";
    $str = str_shuffle($str);
    $str = substr($str,0,4);
    return $str;
}

function sendmessage($phones,$contents){
//    lg(SYSTEMID,FLAGSYSTEM,"sendmessage:phones:".$phones."|contents:".$contents);
    return send_message('LKSDK0003594','amy@3594',$phones,$contents);
}
//发送短信1
function send_message($uid,$passwd,$num,$message){
    header("Content-type: textml; charset=utf-8");
    date_default_timezone_set('PRC'); //设置默认时区为北京时间
    $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));
    $gateway = "http://mb345.com:999/WS/BatchSend.aspx?CorpID=$uid&Pwd=$passwd&Mobile=$num&Content=$msg&Cell=&SendTime=";
    $result = file_get_contents($gateway);
    return $result;
    exit;
}
function getstatus($v){
	if($v['buy'] ==1){
		$ee=M("detail")->where(array("b_id"=>$v['id'],"status"=>1))->sum("e_moneys");
		$ee=empty($ee)?0:$ee;
		if($v['e_moneys']-$ee==0){
			return 1;
		}
		else{
			return 2;
		}
	}
	else {
		$ee=M("detail")->where(array("s_id"=>$v['id'],"status"=>1))->sum("e_moneys");
		$ee=empty($ee)?0:$ee;
		if($v['e_moneys']-$ee==0){
			return 1; 
		}
		else{
			return 2;
		}
		
	}
}
function create_order($j_id,$get_user_id,$d_money){
    //var_dump($j_id,$get_user_id,$d_money);
    $conn=Conn::getInstance()->getConn();
    $sql = 'BEGIN order_sale(:j_id,:get_user_id,:d_money,:results); END;';
    $stmt = oci_parse($conn,$sql);
    oci_bind_by_name($stmt,':j_id',$j_id,32);
    oci_bind_by_name($stmt,':get_user_id',$get_user_id,32);
    oci_bind_by_name($stmt,':d_money',$d_money,32);
    oci_bind_by_name($stmt,':results',$results,32);
    $ret=ociexecute($stmt);
//    var_dump($ret);
//    die;
    if($ret){
        return $results;
    }
    else{
        return 0;
    }
}


// 检测输入的验证码是否正确，$code为用户输入的验证码字符串 
function check_verify($code, $id = '') { 
    $verify = new \Think\Verify(); 
    return $verify->check($code, $id); 
}


//文件上传
function uploads(){

    $file = $_FILES['file'];//得到传输的数据
    //得到文件名称
    $name = $file['name'];
    $size=$_FILES['file']['size'];
    $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    //判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        //如果不被允许，则直接停止程序运行
        return ;
    }
    //判断是否是通过HTTP POST上传的
    if(!is_uploaded_file($file['tmp_name'])){
        //如果不是通过HTTP POST上传的
        return ;
    }
    if($size>10240000){//10240000
         echo "<script language='JavaScript'>parent.showSuccess('',-4);</script>";exit;
    }
    $new_name = date("YmdHis").rand(1000,9999).'.'.$type;
    //开始移动文件到相应的文件夹
    $http = $_SERVER['HTTP_HOST'];
    $upload_path =  "./Uploads/"; //上传文件的存放路径
    //        if(is_dir($upload_path)){
    //            echo 1111111;
    //        }
    if(!(move_uploaded_file($file['tmp_name'],$upload_path.$new_name))){
        die(json_encode(array('code'=>-1,'msg'=>'凭证上传失败')));
    }
}

function create_code() {
    $img = imagecreatetruecolor(100, 50);
    $black = imagecolorallocate($img, 0x00, 0x00, 0x00);//点颜色
    $green = imagecolorallocate($img, 0x00, 0xFF, 0x00);//线颜色
    $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);//字体颜色
    $fontSize = 20;
    imagefill($img, 0, 0, $white);
    //生成随机的验证码
    $code = make(5);
    
    imagestring($img, 5, 10, 10, $code, $black);
    //加入噪点干扰
    for ($i = 0; $i < 300; $i++) {
        imagesetpixel($img, rand(0, 100), rand(0, 100), $black);
        //imagesetpixel($img, rand(0, 100), rand(0, 100), $green);
    }
    //加入线段干扰
    for ($n = 0; $n <= 1; $n++) {
        imageline($img, 0, rand(0, 40), 100, rand(0, 40), $black);
        //imageline($img, 0, rand(0, 40), 100, rand(0, 40), $white);
    }
    /*for($i=0;$i<=5;$i++){
        $sum=mb_substr($code,$i,1,'utf-8');
        imagettftext($img,$fontSize,5,$i*$fontSize+rand(2,5),rand(40/1.2,40/2.5),$white,$font,$sum);

    }*/
    //输出验证码
    header("content-type: image/png");
    imagepng($img);
    //销毁图片
    imagedestroy($img);
}

function create_code1() {
    $fontSize=20;
    $fontHigh=$fontSize*1.1;
    $chnr = make(4);
    $width=ceil(strlen($chnr)*($fontSize+1.5));
    $height=$fontHigh*1.8;
    $im=imagecreate($width,$height);
    
    //var_dump($chnr);die;

    imagecolorallocate($im,255,255,255);  //背景色
    $borCo=imagecolorallocate($im,204,255,0);//边框色
    $pixCo=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));//点色
    $lineCo=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));//线色
    $fontCo=imagecolorallocate($im,0,0,0);//文本色
    $white= imagecolorallocate($im, 255, 255, 255);//字体颜色
    imagefilledrectangle($im, 0, 0, 399, 29, $white);
    //画边框
    //imagerectangle($im,0,0,$width-1,$height-1,$borCo);
    //画点
    for($i=1;$i<50;$i++){
        imagesetpixel($im,rand(1,$width),rand(1,$height),$pixCo);}
    //画线
    for($i=0;$i<3;$i++){
        imageline($im,0,rand(1,$height-1),$width,rand(1,$height-1),$lineCo);
    }
    $font = C('TMPL_PARSE_STRING.__CSS__')."/arial.ttf";
    //var_dump($font);die;
    for($i=0;$i<=strlen($chnr);$i++){
        $sum=mb_substr($chnr,$i,1,'utf-8');
        imagettftext($im,$fontSize,5,$i*$fontSize+rand(2,5),rand($height/1.2,$height/2.5),$fontCo,$font,$sum);
    }
    header("content-type: image/png");
    //生成图片
    imagepng($im);
    //释放资源
    imagedestroy($im);
}

//生产随机验证码的函数
function make($length)
{
    $code = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle($code), 0, $length);
}


/*
* 制作缩略图
     * @param1 string $src，原图路径，/uploads/20150122101010abcdef.gif
     * @param2 string $path，缩略图保存路径/uploads/thumb_20150122101010abcdef.gif
     * @return 缩略图的名字
    */
function make_thumb($src,$path,$thumb_width,$thumb_height){
    $thumb_error = '';//判断原图是否存在
    if(!file_exists($src)){
    $thumb_error = '原图不存在！';
        return false;
    }
    //打开原图资源
    //获取能够使用的后缀
    $ext = getFunctionName($src); //gif
    //拼凑函数名
    $open = 'imagecreatefrom' . $ext; //imagecreatefromgif
    $save = 'image' . $ext; //imagegif
    //如果不清楚；echo $open,$save;exit;
    //可变函数打开原图资源
    $src_img = $open($src);     //利用可变函数打开图片资源
    //imagecreatefromgif($src)
    //缩略图资源
    $dst_img = imagecreatetruecolor($thumb_width,$thumb_height);
    //背景色填充白色
    $dst_bg_color = imagecolorallocate($dst_img,255,255,255);
    imagefill($dst_img,0,0,$dst_bg_color);
    //宽高比确定宽高
    $dst_size = $thumb_width / $thumb_height;
    //获取原图数据
    $file_info = getimagesize($src);
    $src_size = $file_info[0]/$file_info[1];
    //求出缩略图宽和高
    if($src_size > $dst_size){
    //原图宽高比大于缩略图
    $width = $thumb_width;
    $height = round($width / $src_size);
    }else{
    $height = $thumb_height;
    $width = round($height * $src_size);
    }
    //求出缩略图起始位置
    $dst_x = round($thumb_width - $width)/2;
    $dst_y = round($thumb_height - $height)/2;
    //制作缩略图
    if(imagecopyresampled($dst_img,$src_img,$dst_x,$dst_y,0,0,$width,$height,$file_info[0],$file_info[1])){
    //采样成功：保存，将文件保存到对应的路径下
    $thumb_name = 'thumb_' . basename($src);
    $save($dst_img,$path . '/' . $thumb_name);
    //保存成功
    return $thumb_name;
    }else{
        //采样失败
        $thumb_error = '缩略图采样失败！';
        return false;
    }
}

//无限极分类 生成树形数组
function make_tree($list,$root=0){
    $tree=array();
    $packData=array();
    //将所有的分类id作为数组key
    foreach ($list as $k=>$v) {
        $packData[$v['id']] = $v;
    }
    //利用引用，将每个分类添加到父类child数组中，这样一次遍历即可形成树形结构。
    foreach ($packData as $key =>$val){
        if($val['pid']==$root){//代表跟节点
            $tree[] = &$packData[$key];
        }else{
            //找到其父类
            $packData[$val['pid']]['child'][] = &$packData[$key];
        }
    }
    return $tree;
}




/*
* 获取文件要调用的函数名
* @param1 string $file，文件名字
* @return 通过文件后缀名得到的函数字符串
*/
function getFunctionName($file){
    //得到文件的后缀
    $file_info = pathinfo($file);
    $ext = $file_info['extension']; //后缀：gif,png,jpg,jpeg,pjpeg
    //imagecreatefromgif,imagecreatefromjpeg,imagecreatefrompng
    //定义一个数组保存函数名
    $func = array(
    'gif' => 'gif',
    'png' => 'png',
    'jpg' => 'jpeg',
    'jpeg' => 'jpeg',
    'pjpeg' => 'jpeg'
    );
    //返回值
    return $func[$ext];
}
?>