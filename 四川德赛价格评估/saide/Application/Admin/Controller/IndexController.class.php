<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    首页
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    /* 首页列表 */
    public function index(){
        $names = M('admin_name');
        $users = M('admin_user');
        $name['name'] = session('name');
        $user['name'] = cookie('name');
        $row = $names ->where($name)->find();
        $ro = $users ->where($user)->find();
        $this->assign('row',$row);
        $this->assign('ro',$ro);
        if(session('role') == null and cookie('role') == null){
            $this->success('没有登录，请登录',U("User/login"));
        }
        else{
            $this->display(); 
        } 
    }
}