<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;

class CategoryController extends AdminBaseController {

    //栏目添加
    public function catAdd(){
        $model=D('Category');

        if(IS_POST){
            $data=I('post.');
            $id = $data['id'];

            if($id){

                if($model->where(array('id'=>$id))->save($data)!==false){
                    $this->success('修改成功',U('Category/catLis'),1);
                    exit;
                }else{
                    $this->error($model->getError());
                }

            } else {
                if($model->add($data)){
                    $this->redirect('Category/catLis');
                    exit;
                }else{
                    $this->error($model->getError());
                }

            }
        }
    }

    public function ajax_content(){
        $Aid = I('post.Aid');
        $model = M('category');
        $json = $model->find($Aid);
        $this->ajaxReturn($json);
    }


    public function catLis(){
        $model=D('Category');
        $arr = $model->getTree();
        $brr = array();
        
        foreach($arr as $k=>$v){
            if($v['model_name'] == 'Self'){
                $brr[] = $v['id'];
                unset($arr[$k]);
            }
        }

        foreach($arr as $k=>$v){
            $new = $model->familytree($v['id']);
            if(in_array($new[0]['id'],$brr)){
                unset($arr[$k]);
            }
        } 

        $this->dlist = $arr;
        $this->display('admin-catlist');
    }

    public function differ($brr){
        $model=D('Category');
        foreach($brr as $k=>$v){
            $new = $model->familytree($v);
            foreach($new as $k=>$v){
                $crr[] = $v['id'];
            } 
        }
        return $crr;
    }

    public function catDelete(){
        $id=I('get.id');
        $model=D('Category');
        $data = $model->getChildren($id);
        if(empty($data)){
            $result=$model->delete($id);
            if(false!==$result){
                $this->redirect('Category/catLis');
                exit;
            }else {
                $this->error($model->getError(),'',1);
            }
        } else {
            $this->error('仍有子栏目','',1);
        }
    }


    public function ajaxChange(){
        $mid=I('post.mid');
        $type=I('post.type');
        $val=I('post.xs');
        file_put_contents('d:/a.txt',$type);
        $model=M('Category');
        if($type==1){
            if($val==1){
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_show'=>'0'));
                exit;
            }else{
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_show'=>'1'));
                exit;
            }
        }else{
            if($val==1){
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_nav'=>'0'));
                exit;
            }else{
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_nav'=>'1'));
                exit;
            }
        }
    }
    
    public function editSortnum(){
        $id=I('post.id');
        $num=I('post.num');

        $model=M('Category');
        $model->where(array('id'=>$id))->save(array(
            'sort_num'=>$num,
        ));
        echo json_encode(array(
            'id'=>$id,
            'num'=>$num,
        ));die;
    }




}