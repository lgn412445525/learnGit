<?php
namespace Admin\Controller;
use Think\Controller;
class AdminBaseController extends Controller{

    public function search($model,$cid,$pageSize=10){

        $model = M($model);
        /************************************* 翻页 ****************************************/

        $where['cate_id']=$cid;
        $goodsName = bian(trim(I('get.keyword')));
        if($goodsName){
            $data['title'] = array('like', "%$goodsName%");
            //$data['company_name'] = array('like', "%$goodsName%");
            $data['content'] = array('like', "%$goodsName%");
            $data['_logic']='or';
            $where['_complex'] = $data;
        }

        $count = $model->where($where)->count();

        if(!$count){
            $data['page']='无查询数据!';
        }else{
            $page = new \Think\Page($count,$pageSize);
            $page->rollPage=6;
            $page->setConfig('theme','%UP_PAGE%  &nbsp;%LINK_PAGE%&nbsp; %DOWN_PAGE%');
            // 配置翻页的样式
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $data['page'] = $page->show();
            $data['count'] = $count;
            /************************************** 取数据 ******************************************/
            $data['data'] = $model->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
            ///echo $this->getLastSql();exit;
        }
        return $data;
    }

    public function commonsearch($model,$pageSize=10){
        /************************************* 翻页 ****************************************/
        $model = M($model);
        $count = $model->where($where)->count();
        if(!$count){
            $data['page']='无数据!';
        }else{
            $page = new \Think\Page($count, $pageSize);
            $page->rollPage=6;
            $page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  &nbsp;%LINK_PAGE%&nbsp; %DOWN_PAGE% %END% <li><span>当前是第%NOW_PAGE%页 总共%TOTAL_PAGE%页</span></li>');
            // 配置翻页的样式
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $data['page'] = $page->show();
            /************************************** 取数据 ******************************************/
            $data['data'] = $model->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
            ///echo $this->getLastSql();exit;
        }
        return $data;
    }

    public function searchArticle($keywords='',$pageSize=10){
        $model = M('Active');
        $article = bian(trim($keywords));
        if($article){
            $data['title'] = array('like', "%$article%");
            //$data['content'] = array('like', "%$goodsName%");
            $data['_logic']='or';
            $where['_complex'] = $data;
        }

        $count = $model->where($where)->count();

        if(!$count){
            $data['page']='无查询数据!';
        }else{
            $page = new \Think\Page($count,$pageSize);
            $page->rollPage=6;
            $page->setConfig('theme','%UP_PAGE%  &nbsp;%LINK_PAGE%&nbsp; %DOWN_PAGE%');
            // 配置翻页的样式
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $data['page'] = $page->show();
            /************************************** 取数据 ******************************************/
            $data['data'] = $model->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
            ///echo $this->getLastSql();exit;
        }
        return $data;
    }

    /*
     *  普通后台登陆验证检测
     */

//  public function _initialize(){
//       header('content-type:text/html;charset=utf-8');
//       if(!session("?admin_id")) {
//           $this->success('你还没有登录呢！',U('Login/login'),1);
//           exit;
//       }
//  }


    /**
     * 权限管理初始化方法
     */
    public function _initialize(){

        $nav_data=D('AdminNav')->getTreeData('level','order_number,id');
        $assign=array(
            'data'=>$nav_data
        );


        $this->assign($assign);

//        if(isset($_SESSION['user']['id'])){
//            $auth=new \Think\Auth();
//            $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
//            $result=$auth->check($rule_name,$_SESSION['user']['id']);
//            if(!$result){
//                $this->error('您没有权限');
//                die;
//            }
//        } else {
//            $this->success('请登录',U('Admin/User/login'),1);
//            die;
//        }
    }






}

