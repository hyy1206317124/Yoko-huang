<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    留言
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class FeedbackController extends Controller {
    /* 留言列表 */
    public function lists(){
        /* 留言列表详情 */
        $users = M('admin_feedback');
        $count= $users->count();                                                 //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $row= $users->order('id desc')->limit($p->firstRow.','.$p->listRows)->select();
        $this->assign('row',$row);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 删除
     */
    public function feedback_delete(){
        $users = M('admin_feedback');
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
    public function feedback_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_feedback")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
}