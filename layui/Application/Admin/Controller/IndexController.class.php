<?php
namespace Admin\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends AdminBaseController{
	/**
	 * 首页
	 */

    public function index(){
        $this->display('admin-index');
	}


    public function welcome(){
        $model=M('Admin');
        //echo date("Y-m-d",1468249856);die;
        //echo time()-3600*24+456;die;
        //echo strtotime(date('Y-m-d'));die;
        //$condition[date_format()]
        //date_format(now(),'%Y-%m-%d')等价于to_days(now())；
        $sql="select count(*) zs from
        __PREFIX__Admin where from_unixtime(login_time,'%Y-%m-%d')=
        date_format(now(),'%Y-%m-%d')";
        $today=$model->query($sql);
        //echo $model->getLastSql();die;
        $sql2="select count(*) zs from
        __PREFIX__Admin where
        unix_timestamp(from_unixtime(login_time,'%Y-%m-%d'))=
        unix_timestamp(date_format(now(),'%Y-%m-%d'))-3600*24";
        $yesterday=$model->query($sql2);
        //echo $model->getLastSql();die;
        //dump($today);die;
        $this->total=$model->count();
        //dump($this->total);die;
        $this->today=$today[0]['zs'];
        $this->yesterday=$yesterday[0]['zs'];
        $this->display();
    }



}
