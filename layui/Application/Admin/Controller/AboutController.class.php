<?php
namespace Admin\Controller;
class AboutController extends AdminBaseController {

    public function lis(){
        $id = I('get.cid');
        $model=M('About');
        $catmodel = M('category');
        $cat = $catmodel->where(array('id'=>$id))->find();
        $this->assign('cat',$cat);
        $list=$model->where(array('cid'=>$id))->find();
        if($list){
            $this->vo=$list;
        }
        if(IS_POST){
            $id=I('post.id');//echo $id;die;
            if($id){
                $data=I('post.');
                $result=$model->save($data);
                if($result!==false){
                    $this->success('修改成功',U('category/catLis'),1);
                    exit;
                }else{
                    $this->error($pmodel->getError());
                }
            }else{
                $data=I('post.');
                if($lastid=$model->add($data)){
                    $this->success('添加成功',U('category/catLis'),1);
                    exit;
                }else{
                    $this->error($pmodel->getError());
                }
            }
        }
        $this->display('about-lis');
    }



}