<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {

    public function login(){
        if(IS_POST){

            $map=I('post.');
            $map['password']=md5($map['password']);
            $data=M('Users')->where($map)->find();
            if (empty($data)) {
                $this->error('账号或密码错误');
                die;
            }else{
                $_SESSION['user']=array(
                    'id'=>$data['id'],
                    'username'=>$data['username'],
                    'avatar'=>$data['avatar']
                );
                $this->success('登录成功',U('Admin/Index/index'),1);
                die;
            }
        }

        $this->display();
    }


    /**
     * 退出
     */
    public function logout(){
        session('user',null);
        $this->success('退出成功',U('Admin/User/login'),1);
    }


    public function checkUser(){
        $name=$_POST['param'];
        $model=M('Users');
        $data=$model->where(array(
            'username'=>$name,
        ))->find();
        if($data){
            echo 'y';
        }else{
            echo '你输入的用户名不存在';
        }
    }

    public function test(){
        $this->display();
    }






}