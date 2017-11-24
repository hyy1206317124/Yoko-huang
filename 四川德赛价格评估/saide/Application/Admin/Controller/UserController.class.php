<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    管理员
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    /*
     * 后台登录
     */
    public function Login(){
        session_destroy();
        cookie(null);
        $this->display();
    }
    /*
     * 后台登录出来
     */
    public function doLogin(){
        /* 登录详情 */
        session('[start]');
        $names = M('admin_name');
        $users = M('admin_user');
        $user['name'] = I('name');
        $user['password'] = I('password');
        $row = $names ->where($user)->find();
        $ro =$users->where($user)->find();
        /* 判断验证码 */
        $code= I('post.yan');                       //这是提取页面上打字输入的code即验证码
        if(check_code($code) === false){          //给function.php中定义的函数check_code，然后它返回真假
            $output = array();
            $output['code'] = -1;
            $output['msg'] = '验证码错误';
            print json_encode($output);
            exit();
        }
        /* 判断用户名 */
        else if($row['name'] != $user['name'] and $ro['name'] != $user['name']){
            $output = array();
            $output['code'] = -1;
            $output['msg'] = '用户不存在';
            print json_encode($output);
        }
        /* 判断用户是否禁用 */
        else if($row['status'] == -1){
            $output = array();
            $output['code'] = -1; 
            $output['msg'] = '用户已禁用';
            print json_encode($output);
            exit;
        }
        /* 判断密码 */
        else if($row['password'] != $user['password'] and $ro['password'] != $user['password']){
            $output = array();
            $output['code'] = -1; 
            $output['msg'] = '密码不正确';
            print json_encode($output);
            exit;
        }
        /* 存cookie session */
        else{
            session('name',$row['name']);
            session('role',$row['role']);
            cookie('name',$ro['name']);
            cookie('role',$ro['role']);
            cookie('id',$ro['id']);
            $output = array();
            $output['code'] = 0;
            $output['msg'] = '登录成功';
            print json_encode($output);
            exit;
        }
    }
    /*
     * 验证码
     */
    public function yan(){
        $config = [
            'fontSize' => '40',                  // 验证码字体大小
            'length' => 4,                      // 验证码位数 
            'useImgBg' => true,               // 开启背景图片
            'useNoise' => false,             // 开启验证码杂点
        ];
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    /*
     * 桌面
     */
    public function welcome(){
        /* 获取今天,昨天,本周,本月的数据 */
        $time = strtotime(date('Y-m-d'));                                            //今天
        $yesterday = strtotime(date("Y-m-d",strtotime("-1 day")));                  //昨天
        $this_week = strtotime(date("Y-m-d",strtotime("this week")));              //本周第一天
        $this_month = strtotime(date('Y-m-01', strtotime(date("Y-m-d"))));        //本月第一天
        /* 管理员记录数 */
        $users = M('admin_name');
        $user = $users -> count();
        $user1 = M('admin_name') ->where(array("time >= '{$time}'"))->count();
        $user2 = M('admin_name') ->where(array("time >='{$yesterday}'"))->count();
        $user3 = M('admin_name') ->where(array("time >='{$this_week}'"))->count();
        $user4 = M('admin_name') ->where(array("time >='{$this_month}'"))->count();
        $this->assign('user',$user);
        $this->assign('user1',$user1);
        $this->assign('user2',$user2);
        $this->assign('user3',$user3);
        $this->assign('user4',$user4);
        /* 栏目记录数 */
        $column = M('admin_column_class') ->count();
        $column1 = M('admin_column_class') ->where(array("class_time >='{$time}'"))->count();
        $column2 = M('admin_column_class') ->where(array("class_time >='{$yesterday}'"))->count();
        $column3 = M('admin_column_class') ->where(array("class_time >='{$this_week}'"))->count();
        $column4 = M('admin_column_class') ->where(array("class_time >='{$this_month}'"))->count();
        $this->assign('column',$column);
        $this->assign('column1',$column1);
        $this->assign('column2',$column2);
        $this->assign('column3',$column3);
        $this->assign('column4',$column4);
        /* 图片记录数 */
        $image = M('admin_image') ->count();
        $image1 = M('admin_image') ->where(array("time >= '{$time}'"))->count();
        $image2 = M('admin_image') ->where(array("time >= '{$yesterday}'"))->count();
        $image3 = M('admin_image') ->where(array("time >= '{$this_week}'"))->count();
        $image4 = M('admin_image') ->where(array("time >= '{$this_month}'"))->count();
        $this->assign('image',$image);
        $this->assign('image1',$image1);
        $this->assign('image2',$image2);
        $this->assign('image3',$image3);
        $this->assign('image4',$image4);
        /* 留言记录数 */
        $feedback = M('admin_feedback') ->count();
        $feedback1 = M('admin_feedback') ->where(array("time >= '{$time}'"))->count();
        $feedback2 = M('admin_feedback') ->where(array("time >= '{$yesterday}'"))->count();
        $feedback3 = M('admin_feedback') ->where(array("time >= '{$this_week}'"))->count();
        $feedback4 = M('admin_feedback') ->where(array("time >= '{$this_month}'"))->count();
        $this->assign('feedback',$feedback);
        $this->assign('feedback1',$feedback1);
        $this->assign('feedback2',$feedback2);
        $this->assign('feedback3',$feedback3);
        $this->assign('feedback4',$feedback4);
        /* 资讯记录数 */
        $information = M('admin_information') ->count();
        $information1 = M('admin_information') ->where(array("information_time >='{$time}'"))->count();
        $information2 = M('admin_information') ->where(array("information_time >='{$yesterday}'"))->count();
        $information3 = M('admin_information') ->where(array("information_time >='{$this_week}'"))->count();
        $information4 = M('admin_information') ->where(array("information_time >='{$this_month}'"))->count();
        $this->assign('information',$information);
        $this->assign('information1',$information1);
        $this->assign('information2',$information2);
        $this->assign('information3',$information3);
        $this->assign('information4',$information4);
        $this->display();
    }
    /*
     * 管理员列表
     */
    public function Lists(){
        /* 管理员列表详情 */
        $users = M('admin_name');
        $count= $users->count();                            //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $row= $users->order('id')->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('row',$row);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 管理员启用
     */
    public function status(){
        /* 管理员启用停用详情 */
        $id = I('id');
        $flag = I('flag');
        if($flag == 1){
            $where = array('id'=>$id, 'status'=>1);
            $data = array('status'=>-1);
            $success_msg = "停用成功";
            $error_msg = "停用失败";
        }elseif($flag == -1){
            $where = array('id'=>$id, 'status'=>-1);
            $data = array('status'=>1);
            $success_msg = "启用成功";
            $error_msg = "启用失败";
        }
        $ret = M("admin_name ")->where($where)->save($data);
        if($ret){
            die(json_encode(array('code'=>1,'msg'=>$success_msg)));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>$error_msg)));
        }
    }
    /*
     * 添加管理员
     */
    public function Add(){
        $this->display();
    }
    /*
     * 添加管理员处理
     */
    public function doAdd(){
        $names = M('admin_name');
        $user['name'] = I('name');
        $user['password'] = I('password');
        $user['email'] = I('email');
        $user['phone'] = I('phone');
        $user['sex'] = I('sex');
        $user['role'] = I('role');
        $user['status'] = 1;
        $user['uid'] = cookie('id');
        $user['time'] = time();
        $data = I('password2');
        if($user['password'] != $data){
            $output = array();
            $output['code'] = -1;
            $output['msg'] = '密码不一致';
            print json_encode($output);
            exit();
        }
        else if($user == null or $data == null){
            $output = array();
            $output['code'] = -1;
            $output['msg'] = '不能为null';
            print json_encode($output);
            exit();
        }
        else if(strlen($user['password'])< 6 and strlen($user['password'])>16){
            $output = array();
            $output['code'] = -1;
            $output['msg'] = '密码长度不符合';
            print json_encode($output);
            exit();
        }
        else{
            $row = $names -> where(array('name'=>$user['name']))->find();
            $row1 = M("admin_user") -> where(array('name'=>$user['name']))->find();
            if($row['name'] != $user['name'] and $row1['name'] != $user['name']){
                $hyy = $names->add($user);
                $output = array();
                $output['code'] = 1;
                $output['msg'] = '添加成功';
                print json_encode($output);
                exit();
            }
            else{
                $output = array();
                $output['code'] = -1;
                $output['msg'] = '用户名已存在';
                print json_encode($output);
                exit();
            }
        }
    }
    /*
     * 删除管理员
     */
    public function delete(){
        $users = M('admin_name');
        $map = array();
        $map['id'] = I('id');
        $row = $users->where($map)->delete();
        if($row){
         die(json_encode(array('code'=>1,'msg'=>"删除成功")));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>"删除失败")));
        }
    }
    /*
     * 批量删除
     */
    public function delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_name")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
    /*
     * 更新管理员
     */
    public function update(){
        $users = M('admin_name');
        $map = array();
        $map['id'] = I('id');
        $row = $users->where($map)->find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 更新管理员处理
     */
    public function doUpdate(){
        $names = M('admin_name');
        $user['name'] = I('name');
        $user['password'] = I('password');
        $user['email'] = I('email');
        $user['phone'] = I('phone');
        $user['sex'] = I('sex');
        $user['status'] = 1;
        if(strlen($user['password'])< 6 and strlen($user['password'])>16){
                $output = array();
                $output['code'] = -1;
                $output['msg'] = '密码长度不符合';
                print json_encode($output);
                exit();
            }
        else{
            $row = $names->where(array('name'=>$user['name']))->find();
            if($row['name'] != $user['name']){
                $map = array();
                $map['id'] = I('id');
                $row = $names->where($map)->save($user);
                $output = array();
                $output['code'] = 1;
                $output['msg'] = '添加成功';
                print json_encode($output);
                exit();
            }
            else{
                $output = array();
                $output['code'] = -1;
                $output['msg'] = '用户名已存在';
                print json_encode($output);
                exit();
            }
        }
    }
}