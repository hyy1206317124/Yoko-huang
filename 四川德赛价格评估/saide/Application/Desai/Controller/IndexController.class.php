<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    前台
// +----------------------------------------------------------------------------
namespace Desai\Controller;
use Think\Controller;
class IndexController extends Controller {
    /*
     * 首页详情
     */
    public function index(){
        /* page 公告 */
        $page = M("admin_column_body")
                ->where(array('page'=> 2)) 
                ->find(); 
        /* company 公司简介 */
        $company = M("admin_column_body")
                ->where(array('page' => 15))
                ->find();
        /* information 新闻资讯 -> 政策法规 */ 
        $information = M("admin_information")
                ->where(array('uid' => 2))
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information_cate.id = admin_information.uid')
                ->select();
        /* information_jx 新闻资讯 -> 政策解析 */
        $infor = M('admin_information_cate')
                ->where(array('id' => 3))
                ->find();
        $information_jx = M("admin_information")
                ->where(array('uid' => 3))
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information_cate.id = admin_information.uid')
                ->select();
        /* 侧边服务栏 -> 服务专长 */
        $body_cb= M('admin_column_body')
                ->where(array('uid' => 13))
                ->order("id desc")
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->select();
        $body_cb_wzbt =M("admin_column_class")->where(array('id' => 13))->find();
        /* 主要客户 */
        $major_customers = M('admin_column_class')
                ->where(array('id' => 16))
                ->find();
        $major_customers_body = M("admin_column_body")
                ->where(array('uid' => 16,'status' => 1))
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->select();
        $this->assign('major_customers_body',$major_customers_body);
        $this->assign('major_customers',$major_customers);
        $this->assign('body_cb_wzbt',$body_cb_wzbt);
        $this->assign('body_cb',$body_cb);
        $this->assign('infor',$infor);
        $this->assign('information_jx',$information_jx);
        $this->assign('information',$information);
        $this->assign('company',$company);
        $this->assign('page',$page);
        $this->read();
        return "index";
        $this->display();
    }
    /*
     * 主要客户
     * major 列表详情
     * major_body 内容详情
     */
    public function major(){ 
        $count= M("admin_column_body") ->where(array("uid" => I('id'))) ->count();                         
        $p = getPage($count,20); 
        $s = $p->show();   
        $major= M("admin_column_body")
                ->where(array('uid' => I('id')))
                ->limit($p->firstRow.','.$p->listRows)
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->select(); 
        $this->assign('s',$s);
        $this->assign('major',$major);
        $this->read();
        return 'major';
        $this->display();
    }
    public function major_body(){
        /* 详情内容 body -> 位置 title */                                             
        $major= M("admin_column_body")->where(array('id' => I('id')))->select();
        /* 内容当前位置 class_title */                
        $majors= M("admin_column_body")
                ->where(array('uid' => I('uid')))
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find(); 
        $this->assign('majors',$majors);
        $this->assign("major",$major);
        $this->read();
        return 'major_body';
        $this->display();
    }
    /*
     * 新闻资讯
     * info 列表详情
     * info_body 内容详情
     */
    public function info() {
        /* 当前位置 */
        $infor = M('admin_information_cate')
                ->where(array('id' => I('id')))
                ->select(); 
        /* 详情内容 */
        $count= M("admin_information") ->where(array("uid" =>I('id'))) ->count();                         
        $p = getPage($count,10); 
        $ps = $p->show();                                              
        $infot= M("admin_information")
                ->where(array("uid" =>I('id')))
                ->limit($p->firstRow.','.$p->listRows)
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information_cate.id = admin_information.uid')
                ->select();
        $this->assign('infor',$infor);
        $this->assign('infot',$infot);
        $this->assign('ps',$ps);
        $this->read();
        return "info";
        $this->display();
    }
    public function info_body(){
        /* 详情内容 body -> 位置 information_title */                                                 
        $infor= M("admin_information")->where(array('id' => I('id')))->select();
        /* 内容当前位置 cate_title */                       
        $infot= M("admin_information")
                ->where(array('uid' => I('uid')))
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information_cate.id = admin_information.uid')
                ->find(); 
        $this->assign('infot',$infot);
        $this->assign("infor",$infor);
        $this->read();
        return 'info_body';
        $this->display();
    }
    /*
     * 首页 -> 新闻资讯
     */
    public function info_body_gx(){
        /* 详情内容 body -> 位置 information_title */                                                 
        $infor= M("admin_information")->where(array('id' => I('id')))->select();
        /* 内容当前位置 cate_title */                       
        $infot= M("admin_information")
                ->where(array('uid' => I('uid')))
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information_cate.id = admin_information.uid')
                ->find(); 
        $this->assign('infot',$infot);
        $this->assign("infor",$infor);
        $this->read();
        return 'info_body_gx';
        $this->display();
    }    
    /*
     * 公告内容
     */
    public function body_gg(){
        /* 公告内容详情 */
        $page = M("admin_column_body")
                ->where(array('id'=> I('id'))) 
                ->find();
        /* 公告当前位置 */
        $pages = M("admin_column_body")
                ->where(array('uid'=> I('uid'))) 
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find();
        $this->assign("pages",$pages);
        $this->assign("page",$page);
        $this->read();
        return "body_gg";
        $this->display();
    }
    /*
     * body_gs 公司简介
     */
    public function body_gs(){
        /* 公司简介 -> 内容详情 */
        $company = M("admin_column_body")
                ->where(array('id' => I('id')))
                ->find();
        /* 公司简介 -> 当前位置 */
        $company_go = M("admin_column_body")
                ->where(array('uid' => I('uid')))
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find();
        $this->assign('company_go',$company_go);
        $this->assign('company',$company);
        $this->read();
        return "body_gs";
        $this->display();
    }
    /*
     * read 详情列表页
     */
    public function read(){
        /* 顶部 */
        $column = M("admin_column_class") ->where(array('pid' => 1)) ->select();
        /* 侧边服务项目 */
        $map_12 = array(
            'admin_column_class.id' => 2,      
        );
        $read= M('admin_column_body')
                ->where($map_12)
                ->order("id desc")
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->select();
        $reads =M("admin_column_class")->where($map_12)->find();
        /* 当前位置 */
        $map1 = array(
            'id' => I('id'),
        );
        $body = M('admin_column_class')
                ->where($map1)
                ->select(); 
        /* 详情内容 */
        $map = array(
          'uid' => I("id")  
        );
        $count= M("admin_column_body") ->where(array("uid" =>$map["uid"])) ->count();                         
        $p = getPage($count,10); 
        $show = $p->show();                                              
        $row= M("admin_column_body")
                ->where($map)
                ->limit($p->firstRow.','.$p->listRows)
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->select();
        /* 相关链接 */
        $url = M("admin_system_url") ->select();
        /* 版权信息 */
        $base = M("admin_system_base") ->where(array('id' => 1)) ->find();
        /* 联系我们 */
        $contact = M("admin_column_contact") ->where(array('id' => 1)) ->find();
        /* 头部图片 */
        $image = M("admin_image") ->where(array('status' => 1) and array("page" => 1)) ->find();
        /* 在线留言 */
        $feddback = M("admin_feedback") -> order("id desc") -> select();
         /* 头部轮播图片 */
        $image_lb = M("admin_image") ->where(array('status' => 1,"page" => 2)) ->select();
        /* 头部狮子图片 */
        $image_sz = M("admin_image") ->where(array('status' => 1,"page" => 3)) ->find();
        /* 联系我们 */
        $phone = M('admin_column_body')
                ->where(array('uid' => 8))
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find();
         /* information 新闻资讯 -> 政策法规 */ 
        $info = M('admin_information_cate')
                ->where(array('id' => 2))
                ->find();
         /* 公司资质 */
        $zizhi1 = M('admin_column_class')
                ->where(array('id'=>6))
                ->find();
        $zizhi = M('admin_column_body')
                ->where(array('uid' => 6))
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find();
        $this->assign('zizhi1',$zizhi1);
        $this->assign('zizhi',$zizhi);
        $this->assign('info',$info);
        $this->assign('phone',$phone);
        $this->assign("image_lb",$image_lb);
        $this->assign("image_sz",$image_sz);
        $this->assign("feddback",$feddback);
        $this->assign('image',$image);
        $this->assign('contact',$contact);
        $this->assign('base',$base);
        $this->assign('url',$url);
        $this->assign("column",$column);
        $this->assign("read",$read);
        $this->assign("reads",$reads);
        $this->assign('body',$body);
        $this->assign("row",$row);
        $this->assign("show",$show);
        $this->display();
    }
    /*
     * 详情内容
     */
    public function body(){
         /* 详情内容 body -> 位置 title */
        $map = array(
          'id' => I("id")  
        );                                                     
        $csxx= M("admin_column_body")->where($map)->select();
        /* 内容当前位置 class_title */
         $map_1 = array(
          'uid' => I("uid")  
        );                          
        $bares= M("admin_column_body")
                ->where($map_1)
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_class.id = admin_column_body.uid')
                ->find(); 
        $this->assign('bares',$bares);
        $this->assign("csxx",$csxx);
        $this->read();
        return 'body';
        $this->display();
    }
    /*
     * 在线留言
     */
    public function feddback(){
        if(IS_AJAX){
            $data = array(
                        "subject"  => I("subject"),
                        "message" => I("message"),
                        "full_name" => I("full_name"),
                        "phone" => I("phone"),
                        "qq" => I("qq"),
                        "time" => time()
                      );
            M("admin_feedback") -> add($data);
            $output = array();
            $output['code'] = 0;
            $output['msg'] = '成功';
            print json_encode($output);
            exit();
               
        }
        else{
            $this->read();
            return 'feddback';
            $this->display();
        }
    }
    /*
     * 防伪验证
     */
    public function yan(){
       $security = M("security");
       $data = array(
         'code' => I("code")  
       );
       $row = $security -> where(array("code" => $data['code'])) ->find();
       if($data['code'] == null){
            $output = array();
            $output['code'] = 1;
            $output['msg'] = '不能为空';
            print json_encode($output);
            exit();
       }
       else if($row){
            cookie("code",$row['code']);
            cookie("title",$row['title']);
            $output = array();
            $output['code'] = 0;
            $output['msg'] = '验证成功';
            print json_encode($output);
            exit();
       }else{
            $output = array();
            $output['code'] = 1;
            $output['msg'] = '验证失败';
            print json_encode($output);
            exit();
       }
    }
    /*
     * soso 搜索结果表
     */
    public function soso(){
        $data['code'] = cookie('code');
        $count= M("security") ->where($data) ->count();                         
        $p = getPage($count,10); 
        $show = $p->show();   
        $row = M("security")
                -> where($data) 
                ->limit($p->firstRow.','.$p->listRows)
                ->select();
        $this->assign('show',$show);
        $this->assign('row',$row);
        $this->display();
    }
    public function yanzheng(){
        $data['id'] = I('id');
        $row = M("security")
                -> where($data) 
                ->find();
        $url =  "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];  // 获取当前页面地址
        $this->assign('url',$url);
        $this->assign('row',$row);
        $this->display();
    }
    public function ditu(){
        $this->read();
        return "ditu";
        $this->display();
    }
}