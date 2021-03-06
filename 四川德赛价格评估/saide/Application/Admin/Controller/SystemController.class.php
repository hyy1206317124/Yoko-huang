<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    系统
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller {
    /* 系统统计 */
    public function charts_1(){
        /* 获取一周每天数据 */
        $time['end_time'] = date('Y-m-d',time());                                               //获取当前周一
        $time['start_time'] =date("Y-m-d", strtotime("-6 day"));                                //获取当前周日
        $time_sc = Yoko_time($time);
        $date_json = json_encode($time_sc);                                   //json格式输出
        /* 遍历七天每天的记录 */
        foreach ($time_sc as $key => $value) {
        /* 时间条件 */
        $map =array();
        $map["time"]=array(array('egt',strtotime($value." 00:00:00")),array('ELT',strtotime($value." 23:59:59")));
        /* 资讯本周每天记录数 */
        $information=M("admin_information")->where( array('information_time'=>$map["time"]))->count();  
        $information_count[] = $information;
        $information_json = json_encode($information_count);                //json格式输出
        /* 图片本周每天记录数 */
        $image=M("admin_image")->where(array('time'=>$map['time']))->count();  
        $image_count[] = $image;
        $image_json = json_encode($image_count);                            //json格式输出
        /* 留言本周每天记录数 */
        $feedback=M("admin_feedback")->where(array('time'=>$map['time']))->count();  
        $feedback_count[] = $feedback;
        $feedback_json = json_encode($feedback_count);                      //json格式输出
        /* 管理员本周每天记录数 */
        $user=M("admin_name")->where(array('time'=>$map['time']))->count();  
        $user_count[] = $user;
        $user_json = json_encode($user_count);                               //json格式输出
         /* 栏目本周每天记录数 */
        $column=M("admin_column_class")->where(array('class_time'=>$map['time']))->count();  
        $column_count[] = $column;
        $column_json = json_encode($column_count);                           //json格式输出
        }
        $this->assign('date_json',$date_json); 
        $this->assign("information_json",$information_json);
        $this->assign('image_json',$image_json);
        $this->assign('feedback_json',$feedback_json);
        $this->assign('user_json',$user_json);
        $this->assign('column_json',$column_json);
        $this->display(); 
    }
    /*
     * 系统设置
     */
    public function system_base(){
        /* 系统设置详情 */
        if(IS_AJAX){
            $base = array(
                'base_title' => I('base_title'),
                'base_copyright' => I('base_copyright'),
                'base_record_number' => I('base_record_number'),
                'base_address' => I('base_address')
            );
            /* 系统设置 -> 查询后台数据判断 */
            $system = M("admin_system_base") -> where(array('base_title' => $base['base_title'])) -> find();
            if($system['base_title'] == $base['base_title']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="网站名称已存在";
                print json_encode($base_json);
                exit;
            }
            else if($system['base_copyright'] == $base['base_copyright']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="版权信息已存在";
                print json_encode($base_json);
                exit;
            }
            else{
                $ret = M("admin_system_base") -> where(array( 'id' => 1)) -> find();
                /* 系统设置 -> 创建 */
                if(!$ret['id'] == 1){
                    $base['base_time'] = time();
                    M("admin_system_base") -> add($base);
                    $base_json = array();
                    $base_json['code'] = 0;
                    $base_json['msg'] ="创建成功";
                    print json_encode($base_json);
                    exit;
                }
                /* 系统设置 -> 更新 */
                else{
                    $base['base_update'] = time();
                    $map =array();
                    $map['id'] = 1;
                    M("admin_system_base") -> where($map) -> save($base);
                    $base_json = array();
                    $base_json['code'] = 0;
                    $base_json['msg'] ="更新成功";
                    print json_encode($base_json);
                    exit;
                }
            }
        }
        else{
            $this->display();
        }
    }
    /*
     * 相关链接
     */
    public function system_url(){
        /* 相关链接详情 */
        if(IS_AJAX){
            $url = array(
                'url_title' => I('url_title'),
                'url_http' => I('url_http'),
            );
            /* 相关链接 -> 查询后台数据判断 */
            $system = M("admin_system_url") -> where(array('url_title' => $url['url_title'])) -> find();
            if($system['url_title'] == $url['url_title']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="网站名称已存在";
                print json_encode($base_json);
                exit;
            }
            else{
                /* 相关链接 -> 创建 */
                    $url['url_time'] = time();
                    M("admin_system_url") -> add($url);
                    $base_json = array();
                    $base_json['code'] = 0;
                    $base_json['msg'] ="创建成功";
                    print json_encode($base_json);
                    exit;
                }
        }
        else{
            $this->display();
        }
    }
    /*
     * 相关链接列表
     */
    public function system_url_lists(){
         /* 相关链接列表分页详情 */
        $url= M('admin_system_url');
        $count= $url ->count();                              //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $row= $url
                ->order('id')->limit($p->firstRow.','.$p->listRows)
                ->select();
        $this->assign('row',$row);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 相关链接更新
     */
    public function system_url_update(){
        /* 相关链接更新详情 */
        if(IS_AJAX){
            $url = array(
                'url_title' => I('url_title'),
                'url_http' => I('url_http'),
            );
            /* 相关链接 -> 查询后台数据判断 */
            $system = M("admin_system_url") -> where(array('url_title' => $url['url_title'])) -> find();
            if($system['url_title'] == $url['url_title']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="网站名称已存在";
                print json_encode($base_json);
                exit;
            }
            else{
                /* 相关链接 -> 更新 */
                    $url['url_update'] = time();
                    $map =array();
                    $map['id'] = I("id");
                    M("admin_system_url") -> where($map) -> save($url);
                    $base_json = array();
                    $base_json['code'] = 0;
                    $base_json['msg'] ="更新成功";
                    print json_encode($base_json);
                    exit;
                }
        }
        else{
            $map = array();
            $map['id'] = I('id');
            $row = M("admin_system_url") -> where($map) -> find();
            $this->assign('row',$row);
            $this->display();
        }
    }
    /*
     * 相关链接删除
     */
     public function system_url_delete(){
        $information = M('admin_system_url');
        $map = array();
        $map['id'] = I('id');
        $row = $information -> where($map) -> delete();
        if($row){
         die(json_encode(array('code'=>1,'msg'=>"删除成功")));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>"删除失败")));
        }
    }
    /*
     * 相关链接批量删除
     */
    public function system_url_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_system_url")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
}