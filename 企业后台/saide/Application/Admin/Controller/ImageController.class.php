<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    图片
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class ImageController extends Controller {
    /*
     * 图片列表
     */
    public function lists(){
        /* 图片列表详情 */
        $users = M('admin_image');
        $count= $users->count();                                     //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $join = $users
                ->order('id ')->limit($p->firstRow.','.$p->listRows)
                ->select();
        $this->assign('join',$join);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 图片添加
     */
    public function image_add(){
        $this->display();
    }
    /*
     * 图片添加处理
     */
    public function image_adds(){
        $image = M('admin_image');
        $data = array(
            'title' => I('title'),
            'source' => I('source'),
            'image' => I('image'),
            'author' => I('author'),
            'abstract' => I('abstract'),
            'time' => time(),
            'status' => 1
        );
        $row = $image ->where(array('title' => $data['title']))->find();
        if($row['title'] == $data['title']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "标题已存在";
            print json_encode($rest);
            exit;
        }else{
            $ret = M("admin_image")->add($data);
            $rest = array();
            $rest['code'] = 0;
            $rest['msg'] = "添加成功";
            print json_encode($rest);
            exit;
        }
    }
    /*
     * 图片启动停用
     */
    public function status(){
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
        $ret = M("admin_image ")->where($where)->save($data);
        if($ret){
            die(json_encode(array('code'=>1,'msg'=>$success_msg)));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>$error_msg)));
        }
    }
    /*
     * 图片上传
     */
    public function adver_upload(){
        $image = upload();
        die(json_encode(array('image'=>$image)));
    }
     /*
      * 文章删除
      */
     public function image_delete(){
        $users = M('admin_image');
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
    public function image_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_image")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
     /*
      * 内容更新
      */
    public function image_update(){
        $map = array();
        $map['id'] = I('id');
        $row = M('admin_image')->where($map)->find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 内容更新处理
     */
    public function image_updates(){
        $image = M('admin_image');
        $data = array(
            'title' => I('title'),
            'source' => I('source'),
            'image' => I('image'),
            'author' => I('author'),
            'abstract' => I('abstract'),
        );
        if(!IS_POST){
            $ser = $image -> where(array('title' => $data['title'])) -> find();
            if($ser['title'] == $data['title']){
                $eeres = array();
                $eeres['code'] = 1;
                $eeres['msg'] = "标题已存在";
                print json_encode($eeres);
                exit;
            }
        }
        else{
            $maps = array();
            $maps['id'] = I('id');
            $image->where($maps)->save($data);
            $eeres = array();
            $eeres['code'] = 0;
            $eeres['msg'] = "更新成功";
            print json_encode($eeres);
            exit;
        }
    }
}