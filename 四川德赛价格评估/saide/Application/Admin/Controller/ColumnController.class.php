<?php
// +----------------------------------------------------------------------------
// |    Thinkphp  [ WE CAN DO THAT THINK SO ]
// +----------------------------------------------------------------------------
// |    黄猷洋(Yoko huang)        1206317124      wanlala615@qq.com
// +----------------------------------------------------------------------------
// |    栏目内容
// +----------------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class ColumnController extends Controller {
    /*
     * 栏目列表
     */
    public function yoko_class(){
        /* 栏目 -> 栏目列表详情 */
        $column = M('admin_column_class');
        $count= $column->count();                                                        //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        $row= $column
                ->order('id')->limit($p->firstRow.','.$p->listRows)
                ->select();
        $this->assign('row',$row);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 栏目添加
     */
    public function yoko_class_add(){
        $this->display();
    }
    /*
     * 栏目添加处理
     */
    public function yokos_class_add(){
        $column = M('admin_column_class');
        $map['class_title'] = I('class_title');
        $map['class_time'] = time();
        /* 栏目添加 -> 查询后台数据 */
        $ser = $column -> where(array('class_title' => $map['class_title'])) -> find();
        /* 栏目添加 -> 判断,存入数据 */
        if($ser['class_title'] == $map['class_title']){
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "栏目已存在";
            print json_encode($eeres);
            exit;
        }else if($map != null){
            $column->add($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "栏目添加成功";
            print json_encode($eeres);
            exit;
        }else{
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "请输入栏目名称";
            print json_encode($eeres);
            exit;
        }
    }
       /*
        * 栏目删除
        */
     public function yoko_column_delete(){
        $users = M('admin_column_class');
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
       * 栏目批量删除
       */
    public function yoko_column_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
            $ret = M("admin_column_class")->where($where,array($id))->delete();
            if($ret){
                die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
            }else{
                die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
            }
    }
    /*
     * 栏目更新
     */
     public function yoko_class_update(){
        $users = M('admin_column_class');
        $map = array();
        $map['id'] = I('id');
        $row = $users->where($map)->find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 栏目更新处理
     */
    public function yokos_class_update(){
        $column = M('admin_column_class');
        $map['class_title'] = I('class_title');
        $map['class_update'] = time();
        /* 栏目更新 -> 查询后台数据 */
        $ser = $column -> where(array('class_title' => $map['class_title'])) -> find();
        /* 栏目更新 -> 判断,存入数据 */
        if(!IS_POST){
            if($ser['class_title'] == $map['class_title']){
                $eeres = array();
                $eeres['code'] = -1;
                $eeres['msg'] = "栏目已存在";
                print json_encode($eeres);
                exit;
            }
        }
        else{
            $maps = array();
            $maps['id'] = I('id');
            $column->where($maps)->save($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "栏目更新成功";
            print json_encode($eeres);
            exit;
        }
    }
    /*
     * 栏目子类添加
     */
    public function cate_add(){
        /* 栏目子类 -> 获取id,查询后台数据 */
        $cate = M('admin_column_class');
        $map = array();
        $map['id'] = I('id');
        $row = $cate->where($map)->find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 栏目子类添加处理
     */
    public function cate_adds(){
        /* 栏目子类 -> 添加子类详情处理 */
        $column = M('admin_column_class');
        $map['class_title'] = I('class_title');
        $map['class_time'] = time();
        $map['pid'] = I('pid');
        $ser = $column -> where(array('class_title' => $map['class_title'])) -> find();
        if($ser['class_title'] == $map['class_title']){
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "栏目已存在";
            print json_encode($eeres);
            exit;
        }else if($map != null){
            $column->add($map);
            $eeres = array();
            $eeres['code'] = 1;
            $eeres['msg'] = "栏目添加成功";
            print json_encode($eeres);
            exit;
        }else{
            $eeres = array();
            $eeres['code'] = -1;
            $eeres['msg'] = "请输入栏目名称";
            print json_encode($eeres);
            exit;
        }
    }
    /*
     * 内容列表
     */
    public function lists(){
        /* 内容 -> 列表详情 */
        $users = M('admin_column_body');
        $count= $users->count();                       //查询满足条件的总记录数
        $p = getPage($count,18); 
        $show = $p->show();                           // 分页显示输出
        /* 内容 -> 联表查询详情 */
        $join = $users
                ->order('id desc')->limit($p->firstRow.','.$p->listRows)
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_body.uid = admin_column_class.id')
                ->select();
        $this->assign('join',$join);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 文章列表
     */
    public function read_lists(){
        /* 文章 -> 列表详情 */ 
        $count= M('admin_column_body')->where(array('uid' => I('id')))->count();                       //查询满足条件的总记录数
        $p = getPage($count,18); 
        $show = $p->show();                                          // 分页显示输出
        /* 文章 -> 联表查询详情 */
        $join = M('admin_column_body')
                ->where(array('uid' => I('id')))
                ->order('id desc')->limit($p->firstRow.','.$p->listRows)
                ->field('admin_column_body. *,admin_column_class.class_title')
                ->join('admin_column_class ON admin_column_body.uid = admin_column_class.id')
                ->select();
        $this->assign('join',$join);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 内容添加
     */
    public function column_add(){
        $cate = M("admin_column_class")->select();
        $cate = make_tree($cate);
        $cate_str = $this->show_tree($cate, '');
        $this->assign('cate', $cate_str);
        $this->display();
    }
    /*
     * 无限极分类 -> 递归调用
     */
    public function show_tree($data,$flag=''){
        static $str = '';                           //静态变量 只有第一次才初始化
        foreach($data as $k=>$v){
            if(empty($v['child'])){
                $str .= "<option value='".$v['id']."'>$flag".$v['class_title']."</option>";
            }else{
                $str .= "<option value='".$v['id']."'>$flag".$v['class_title']."</option>";
                $this->show_tree($v['child'],$flag.'--|&nbsp;&nbsp');
            }
        }
        return $str;
    }
    /*
     *  内容添加处理
     */
    public function column_adds(){
        $column = M('admin_column_body');
        $data = array(
            'uid' => I('uid'),
            'page' => I('page'),
            'stert' => I("stert"),
            'image' => I('image'),
            'title' => I('title'),
            'body' => htmlspecialchars_decode(I('body')),           //反转义
            'abstract' => I('abstract'),
            'time' => time(),
            'status' => 1
        );
        /* 内容添加 -> 查询后台数据 */
        $row = $column ->where(array('title' => $data['title']))->find();
        $ro = $column -> where(array('page'=> $data['page']))->find();
        /* 内容添加 -> 判断,存入数据 */
        if($row['title'] == $data['title']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "标题已存在";
            print json_encode($rest);
            exit;
        }elseif($ro['page'] == $data['page'] and $data['page'] != null){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "排序值已存在";
            print json_encode($rest);
            exit;
        }else{
            $ret = M("admin_column_body")->add($data);
            $rest = array();
            $rest['code'] = 0;
            $rest['msg'] = "添加成功";
            print json_encode($rest);
            exit;
        }
    }
    /*
     * 内容发布状态
     */
    public function status(){
        /* 内容 -> 内容发布状态详情 */
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
        /* 内容 -> 更新发布状态 */
        $ret = M("admin_column_body ")->where($where)->save($data);
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
     * 内容删除
     */
    public function column_delete(){
        $users = M('admin_column_body');
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
     * 内容批量删除
     */
    public function column_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("admin_column_body")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
    /*
     * 内容更新
     */
    public function column_update(){
        $users = M('admin_column_body');
        $map = array();
        $map['id'] = I('id');
        $row = $users->where($map)->find();
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 内容更新处理
     */
    public function column_updates(){
        $column = M('admin_column_body');
        $data = array(
            'page' => I('page'),
            'stert' => I("stert"),
            'image' => I('image'),
            'title' => I('title'),
            'body' => htmlspecialchars_decode(I('body')),          //反转义
            'abstract' => I('abstract'),
            'updates' => time(),
        );
        /* 内容更新 -> 查询后台数据 */
        $row = $column ->where(array('title' => $data['title']))->find();
        $ro = $column -> where(array('page'=> $data['page']))->find();
        /* 内容更新 -> 判断,存入数据 */
        if(!IS_POST){
            if($row['title'] == $data['title']){
                $eeres = array();
                $eeres['code'] = 1;
                $eeres['msg'] = "标题已存在";
                print json_encode($eeres);
                exit;
            }else if($ro['page'] == $data['page']){
                $eeres = array();
                $eeres['code'] = 1;
                $eeres['msg'] = "排序值已存在";
                print json_encode($eeres);
                exit;
            }
        }else{
            $maps = array();
            $maps['id'] = I('id');
            $column->where($maps)->save($data);
            $eeres = array();
            $eeres['code'] = 0;
            $eeres['msg'] = "更新成功";
            print json_encode($eeres);
            exit;
        }
    }
    /*
     * 联系我们
     */
    public function contact() {
        /* 联系我们详情 */
        if(IS_AJAX){
            $contact = array(
                'contact_telephone' => I('contact_telephone'),
                'contact_phone' => I('contact_phone'),
                'contact_contacts' => I('contact_contacts'),
                'contact_url' => I('contact_url'),
                'contact_email' => I("contact_email"),
                'contact_address' => I("contact_address")
            );
            /* 联系我们 -> 查询后台数据判断 */
            $column = M("admin_column_contact") -> where(array('contact_contacts' => $contact['contact_contacts'])) -> find();
            if($column['contact_contacts'] == $contact['contact_contacts']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="联系人已存在";
                print json_encode($base_json);
                exit;
            }
            else if($column['contact_address'] == $contact['contact_address']){
                $base_json = array();
                $base_json['code'] = 1;
                $base_json['msg'] ="地址已存在";
                print json_encode($base_json);
                exit;
            }
            else{
                $ret = M("admin_column_contact") -> where(array( 'id' => 1)) -> find();
                /* 联系我们 -> 创建 */
                if(!$ret['id'] == 1){
                    $contact['contact_time'] = time();
                    M("admin_column_contact") -> add($contact);
                    $base_json = array();
                    $base_json['code'] = 0;
                    $base_json['msg'] ="创建成功";
                    print json_encode($base_json);
                    exit;
                }
                /* 联系我们 -> 更新 */
                else{
                    $contact['contact_update'] = time();
                    $map =array();
                    $map['id'] = 1;
                    M("admin_column_contact") -> where($map) -> save($contact);
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
     * 防伪验证
     */
    public function security_lists(){
        /* 防伪验证 -> 列表详情 */
        $security = M('security');
        $count= $security->count();                       //查询满足条件的总记录数
        $p = getPage($count,10); 
        $show = $p->show();                           // 分页显示输出
        /* 防伪验证 -> 联表查询详情 */
        $join = $security
                ->order('id desc')->limit($p->firstRow.','.$p->listRows)
                ->field('security. *,admin_column_class.class_title')
                ->join('admin_column_class ON security.uid = admin_column_class.id')
                ->select();
        $this->assign('join',$join);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->display();
    }
    /*
     * 防伪验证添加
     */
    public function security_add(){
        /* 无限极分类实现详情 */
        $cate = M("admin_column_class") ->where(array('id' =>12))->select();
        $cate = make_tree($cate);
        $cate_str = $this->show_aree($cate, '');
        $this->assign('cate', $cate_str);
        $this->display();
    }
     /*
     * 无限极分类 -> 递归调用
     */
    public function show_aree($data,$flag=''){
        static $str = '';                           //静态变量 只有第一次才初始化
        foreach($data as $k=>$v){
            if(empty($v['child'])){
                $str .= "<option value='".$v['id']."'>$flag".$v['class_title']."</option>";
            }else{
                $str .= "<option value='".$v['id']."'>$flag".$v['class_title']."</option>";
                $this->show_tree($v['child'],$flag.'--|&nbsp;&nbsp');
            }
        }
        return $str;
    }
    /*
     *  防伪验证添加处理
     */
    public function security_adds(){
        /* 防伪验证添加详情 */
        $security = M('security');
        /* 防伪验证添加 -> 传值,获取数据 */
        $data = array(
            'uid' => I('uid'),
            'document_number' => I('document_number'),            //报告文号
            'company' => I("company"),                            //委托单位
            'image' => I('image'),                                //二维码
            'company_title' => I('company_title'),                //公司名称
            'locations' =>I('locations'),                         //被评单位所在地
            'appraiser' => I('appraiser'),                        //签名鉴定师
            "telephone" => I('telephone'),                        //联系电话
            'phone' => I('phone'),                                //联系手机
            'address' => I("address"),                            //公司地址
            "emali" => I('emali'),                                //电子邮箱
            'company_url' => I('company_url'),                    //公司网站地址
            'statement' => I('statement'),                        //声明
            'code' => get_rand_str(20),                           //防伪编码
            'title' => I('title'),                                //报告标题
            'report_date' =>I('report_date'),                     //报告日期
            'security_time' => time(),                            //报告创建日期
        );
        /* 防伪验证添加 -> 查询后台数据 */
        $row = $security ->where(array('document_number' => $data['document_number']))->find();
        $ro = $security ->where(array('code' => $data['code']))->find();
        /* 防伪验证添加 -> 判断,存入数据 */
        if($row['document_number'] == $data['document_number']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "报告文号已存在";
            print json_encode($rest);
            exit;
        }elseif($ro['code'] == $data['code']){
            $rest = array();
            $rest['code'] = 1;
            $rest['msg'] = "防伪编码已存在";
            print json_encode($rest);
            exit;
        }
        else{
            M("security")->add($data);
            $rest = array();
            $rest['code'] = 0;
            $rest['msg'] = "添加成功";
            print json_encode($rest);
            exit;
        }
    }
    /*
     * 防伪验证图片上传
     */
    public function security_adver_upload(){
        $image = upload();
        die(json_encode(array('image'=>$image)));
    }
    /*
     * 防伪验证删除
     */
    public function security_delete(){
        $security = M('security');
        $map = array();
        $map['id'] = I('id');
        $row = $security->where($map)->delete();
        if($row){
         die(json_encode(array('code'=>1,'msg'=>"删除成功")));
        }else{
            die(json_encode(array('code'=>-1,'msg'=>"删除失败")));
        }
    }
    /*
     * 防伪验证批量删除
     */
    public function security_delete_all(){
        $id = I('id');
        $where = "id IN (%s)";
        $ret = M("security")->where($where,array($id))->delete();
        if($ret){
            die(json_encode(array('code'=>1, 'msg'=>'删除成功')));
        }else{
            die(json_encode(array('code'=>-1, 'msg'=>'删除失败')));
        }
    }
    /*
     * 防伪验证更新
     */
    public function security_update(){
        $security = M('security');
        /* 栏目 */
        $data = array();
        $data['uid'] = I('uid');
        $row =$security
                ->where($data)
                ->field('security. *,admin_column_class.class_title')
                ->join('admin_column_class ON security.uid = admin_column_class.id')
                ->find();
        /* 获取数据 */
        $map = array();
        $map['id'] = I('id');
        $row1 =$security
                ->where($map)
                ->find();
        $this->assign('row1',$row1);
        $this->assign('row',$row);
        $this->display();
    }
    /*
     * 防伪验证更新处理
     */
    public function security_updates(){
        if(IS_GET){
            /* 防伪验证添加详情 */
            $security = M('security');
            /* 防伪验证添加 -> 传值,获取数据 */
            $data = array(
                'document_number' => I('document_number'),            //报告文号
                'company' => I("company"),                            //委托单位
                'image' => I('image'),                                //二维码
                'company_title' => I('company_title'),                //公司名称
                'locations' =>I('locations'),                         //被评单位所在地
                'appraiser' => I('appraiser'),                        //签名鉴定师
                "telephone" => I('telephone'),                        //联系电话
                'phone' => I('phone'),                                //联系手机
                'address' => I("address"),                            //公司地址
                "emali" => I('emali'),                                //电子邮箱
                'company_url' => I('company_url'),                    //公司网站地址
                'statement' => I('statement'),                        //声明
                'code' => I('code'),                                  //防伪编码
                'title' => I('title'),                                //报告标题
                'report_date' =>I('report_date'),                     //报告日期
                'security_update' => time(),                          //报告创建日期
            );
            $maps = array();
            $maps['id'] = I('id');
            $security->where($maps)->save($data);
            $eeres = array();
            $eeres['code'] = 0;
            $eeres['msg'] = "更新成功";
            print json_encode($eeres); 
            exit;
        }else{
            /* 防伪验证添加 -> 查询后台数据 */
            $row = $security ->where(array('document_number' => $data['document_number']))->find();
            /* 防伪验证添加 -> 判断,存入数据 */
            if($row['document_number'] == $data['document_number']){
                $rest = array();
                $rest['code'] = 1;
                $rest['msg'] = "报告文号已存在";
                print json_encode($rest);
                exit;
            }
        }
    }
}