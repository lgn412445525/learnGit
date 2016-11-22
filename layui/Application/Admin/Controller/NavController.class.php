<?php
namespace Admin\Controller;
/**
 * 后台菜单管理
 */
class NavController extends AdminBaseController{
	/**
	 * 菜单列表
	 */
	public function index(){
		$data=D('AdminNav')->getTreeData('tree','order_number,id');
		$assign=array(
			'navdata'=>$data
			);
		$this->assign($assign);
		$this->display('admin-nav');
	}

	/**
	 * 添加菜单
	 */
	public function add(){
		$data=I('post.');
		if($data['id']){
            $map=array(
                'id'=>$data['id']
            );
            D('AdminNav')->editData($map,$data);
            $this->redirect('Admin/Nav/index');
            die;
        } else {
            D('AdminNav')->addData($data);
            $this->redirect('Admin/Nav/index');
            die;
        }
	}


	public function ajax_edit(){
	    $id = I('post.id');
        $json = M('admin_nav')->find($id);
        $this->ajaxReturn($json);
    }

	/**
	 * 删除菜单
	 */
	public function delete(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('AdminNav')->deleteData($map);
		if($result){
		    $this->redirect('Admin/Nav/index');
            die;
		}else{
			$this->error('请先删除子菜单');
            die;
		}
	}

	/**
	 * 菜单排序
	 */
	public function order(){
		$data=I('post.');
		D('AdminNav')->orderData($data);
        $this->redirect('Admin/Nav/index');
        die;
	}


}
