<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    资讯
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class InformationController extends Controller {
    /*
     * 资讯分类列表
    */
    public function information_cate_lists(){
        /* 资讯列表分页详情 */
        $information = M('admin_information_cate');
        $count= $information ->count();                              //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $row= $information
                ->order('id')->limit($p->firstRow.','.$p->listRows)
                ->select();
        $this->assign('row',$row);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 资讯分类添加
     */
    public function information_cate_add(){
        $this->display();
    }
    /*
     * 资讯分类添加处理
     */
    public function information_cate_doAdd(){
        /* 资讯分类 -> 分类添加详情 */ 
        $information = M('admin_information_cate');
        $map['cate_title'] = I('cate_title');
        $map['cate_time'] = time();
        /* 资讯分类 -> 查询分类后台数据 */
        $ser = $information -> where(array('cate_title' => $map['cate_title'])) -> find();
        /* 资讯分类 -> 判断,存入数据库 */
        if($ser['cate_title'] == $map['cate_title']){
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "分类已存在";
            print json_encode($eeres);
            exit;
        }else if($map != null){
            $information -> add($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "分类添加成功";
            print json_encode($eeres);
            exit;
        }else{
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "请输入分类名称";
            print json_encode($eeres);
            exit;
        }
    }
    /*
     * 资讯分类删除
     */
     public function information_cate_delete(){
        $information = M('admin_information_cate');
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
     * 资讯分类批量删除
     */
    public function information_cate_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_information_cate")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
    /*
     * 资讯分类更新
     */
     public function information_cate_update(){
        $information = M('admin_information_cate');
        $map = array();
        $map['id'] = I('id');
        $row = $information -> where($map) -> find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 资讯分类更新处理
     */
    public function information_cate_doUpdate(){
        $information = M('admin_information_cate');
        $map['cate_title'] = I('cate_title');
        $map['cate_update'] = time();
        /* 资讯分类更新 -> 查询后台数据 */
        $ser = $information -> where(array('cate_title' => $map['cate_title'])) -> find();
        /* 资讯分类更新 -> 判断,更新数据 */
        if(!IS_POST){
            if($ser['cate_title'] == $map['cate_title']){
                $eeres = array();
                $eeres['code'] = -1;
                $eeres['msg'] = "分类已存在";
                print json_encode($eeres);
                exit;
            }
        }
        else{
            $maps = array();
            $maps['id'] = I('id');
            $information->where($maps)->save($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "分类更新成功";
            print json_encode($eeres);
            exit;
        }
    }
    /*
     * 资讯分类子类添加
     */
    public function cate_add(){
        $information = M('admin_information_cate');
        $map = array();
        $map['id'] = I('id');
        $row = $information -> where($map) -> find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 资讯分类子类添加处理
     */
    public function cate_adds(){
        $information = M('admin_information_cate');
        $map['cate_title'] = I('cate_title');
        $map['cate_time'] = time();
        $map['pid'] = I('pid');
        $ser = $information -> where($map) -> find();
        if($ser['cate_title'] == $map['cate_title']){
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "子类已存在";
            print json_encode($eeres);
            exit;
        }else if($map != null){
            $information->add($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "子类添加成功";
            print json_encode($eeres);
            exit;
        }else{
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "请输入子类名称";
            print json_encode($eeres);
            exit;
        }
    }
    /* 
     * 资讯列表
     */
    public function information_lists(){
        /* 资讯列表分页详情 */
        $information = M('admin_information');
        $count= $information->count();                            //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        /* 资讯列表 -> 联表查询列表详情 */
        $join = $information
                ->order('id ')->limit($p->firstRow.','.$p->listRows)
                ->field('admin_information. *,admin_information_cate.cate_title')
                ->join('admin_information_cate ON admin_information.uid = admin_information_cate.id')
                ->select();
        $this->assign('join',$join);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 资讯添加
     */
    public function information_add(){
        $information = M("admin_information_cate")->select();
        $information = make_tree($information);
        $cate_str = $this->show_tree($information, '');
        $this->assign('information', $cate_str);
        $this->display();
    }
   /* 
    * 无限极分类 -> 递归调用
    */
    public function show_tree($data,$flag=''){
        static $str = '';                           //静态变量 只有第一次才初始化
        foreach($data as $k=>$v){
            if(empty($v['child'])){
                $str .= "<option value='".$v['id']."'>$flag".$v['cate_title']."</option>";
            }else{
                $str .= "<option value='".$v['id']."'>$flag".$v['cate_title']."</option>";
                $this->show_tree($v['child'],$flag.'--|&nbsp;&nbsp');
            }
        }
        return $str;
    }
    /*
     * 资讯添加处理
     */
    public function information_doAdd(){
        $information= M('admin_information');
        /* 资讯 -> 获取数据详情 */
        $data = array(
            'uid' => I('uid'),
            'information_page' => I('information_page'),
            'information_image' => I('information_image'),
            'information_title' => I('information_title'),
            'information_body' => htmlspecialchars_decode(I('information_body')),       //反转义
            'information_abstract' => I('information_abstract'),
            'information_time' => time(),
            'source' => $_SERVER['HTTP_REFERER'],                   // 获取提交来源
            'status' => 1
        );
        /* 资讯 -> 查询后台数据 */
        $row = $information ->where(array('information_title' => $data['information_title'])) -> find();
        $ro = $information ->where(array('information_page' => $data['information_page'])) -> find(); 
        /* 资讯 -> 判断,存入数据库 */
        if($row['information_title'] == $data['information_title']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "标题已存在";
            print json_encode($rest);
            exit;
        }elseif($ro['information_page'] == $data['information_page']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "排序值已存在";
            print json_encode($rest);
            exit;
        }else{
            M("admin_information")->add($data);
            $rest = array();
            $rest['code'] = 0;
            $rest['msg'] = "添加成功";
            print json_encode($rest);
            exit;
        }
    }
    /*
     * 资讯发布状态
     */
    public function status(){
        /* 资讯 -> 资讯发布状态详情 */
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
        /* 资讯 -> 更新发布状态 */
        $information = M("admin_information")->where($where)->save($data);
        if($information){
            die(json_encode(array('code'=>1,'msg'=>$success_msg)));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>$error_msg)));
        }
    }
    /*
     * 资讯图片上传
     */
    public function adver_upload(){
        $image = upload();
        die(json_encode(array('image'=>$image)));
    }
    /*
     * 资讯删除
     */
     public function information_delete(){
        $users = M('admin_information');
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
     * 资讯批量删除
     */
    public function information_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_information")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
    /*
     * 资讯更新
     */
    public function information_update(){
        $information = M('admin_information');
        $map = array();
        $map['id'] = I('id');
        $row = $information -> where($map) -> find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 资讯更新处理
     */
    public function information_doUpdate(){
        $information = M('admin_information');
        $data = array(
            'information_page' => I('information_page'),
            'information_image' => I('information_image'),
            'information_title' => I('information_title'),
            'information_body' => htmlspecialchars_decode(I('information_body')),       //反转义
            'information_abstract' => I('information_abstract'),
            'information_update' => time(),
        );
        /* 资讯更新 -> 查询后台数据 */
        $row = $information ->where(array('information_title' => $data['information_title'])) -> find();
        $ro = $information ->where(array('information_page' => $data['information_page'])) -> find(); 
        /* 资讯更新 -> 判断,更新数据 */
        if(!IS_POST){
            if($row['information_title'] == $data['information_title']){
                $eeres = array();
                $eeres['code'] = 1;
                $eeres['msg'] = "标题已存在";
                print json_encode($eeres);
                exit;
            }else if($ro['information_page'] == $data['information_page']){
                $eeres = array();
                $eeres['code'] = 1;
                $eeres['msg'] = "排序值已存在";
                print json_encode($eeres);
                exit;
            }
        }/* 资讯更新 -> 插入数据库 */
        else{
                $maps = array();
                $maps['id'] = I('id');
                $information->where($maps)->save($data);
                $eeres = array();
                $eeres['code'] = 0;
                $eeres['msg'] = "更新成功";
                print json_encode($eeres);
                exit;
        }
    }
}