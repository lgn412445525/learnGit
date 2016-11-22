<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
class AdminController extends AdminBaseController {

    public function add(){
        $model=M('Admin');
        if(IS_POST){
            $data = I('post.');

            if($data['password'] !== $data['cpw']){
              $this->error('密码重复输入错误');
              exit;
            }


            $data['password'] = md5($data['password']);

            if($model->add($data)){
                $this->success('添加成功',U('Admin/lis'),1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $this->display();
    }

    public function lis(){
        $model=D('Admin');
        $this->dlist=$model->select();
        $this->display();
    }

    public function edit(){
        $id=I('get.id');
        $model=M('Admin');
        if(IS_POST){
            $data=I("post.");

            if($data['password'] !== $data['cpw']){
              $this->error('密码重复输入错误');
              exit;
            }

            $data['password'] = md5($data['password']);

            if($data['is_deny']=='1' && $data['username']=='admin'){
                $this->error('超级管理员不能被禁用');die;
            }
            if($model->where(array('id'=>$id))->save($data)){
                $this->success('修改成功',U('Admin/lis'),1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $this->data = $model->find($id);
        $this->display();
    }

    public function delete(){
        $id=I('get.id');
        $model=D('Admin');
        //dump($id);exit;
        //$cid=$model->getChildren($id);
        //false表示sql出错，0表示没有删除任何数据
        $result=$model->delete($id);
        if(false!==$result){
            $this->success('删除成功',U('Admin/lis'),1);
            exit;
        }else {
            $this->error($model->getError(),'',1);
        }
        $this->display();
    }

    public function ajaxChange(){
        $id=I('post.mid');
        $val=I('post.val');
        $model=D('Admin');
        //file_put_contents('e:/a.txt',$val);
        $list=$model->find($id);
        if($list['username']=='admin'){
            echo 1;
        }else{
            if($val==1){
                $model->where(array(
                    'id'=>$id
                ))->save(array(
                    'is_deny'=>'0'));
                echo 0;
                exit;
            }else{
                $model->where(array(
                    'id'=>$id
                ))->save(array(
                    'is_deny'=>'1'));
                echo 0;
                exit;
            }
        }
    }


}
