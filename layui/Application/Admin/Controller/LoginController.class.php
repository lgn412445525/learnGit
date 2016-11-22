<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function login(){
        $model=M('Admin');
        $data=I('post.');
        if(IS_POST){
			      $pw=md5($data['password']);

            if($this->CheckLogin($data['username'],$pw)){
                $admin_id = session('admin_id');
        				$model->save(array(
        				    'id'=>session('admin_id'),
        					  'login_time'=>time(),
        				));
                $this->success('登录成功', U('Index/index'), 1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $this->display();
    }


    public function checkLogin($name,$pw){
        $Model = M('Admin');
        $data = $Model->where(array(
            'username'=>$name
        ))->find();

        if($data['is_deny']=='1'){
            $this->error='该用户已被禁用了';
            return false;
        }

        if($data['password'] == $pw){
            session('admin_id',$data['id']);
            session('admin_us',$name);
            return true;
        }else{
            $this->error='密码错误';
            return false;
        }
    }


    public function logout(){
        session('admin_us',null);
        session('admin_id',null);
        $this->success('等待中...', U('Login/login'), 1);
        exit;
    }


    public function checkUser(){
        $name=$_POST['param'];
        $model=D('Admin');
        $data=$model->where(array(
            'username'=>$name,
        ))->find();
        if($data){
            echo 'y';
        }else{
            echo '你输入的用户名不存在';
        }
    }


}
