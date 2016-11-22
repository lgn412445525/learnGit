<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
class ActiveController extends AdminBaseController {
    //article内容添加
    public function article(){

        $p=I('get.p');
        $model=M('Active');

        if(IS_POST){
            $data=I('post.');
            $id = $data['id'];
            $cid = $data['cate_id'];
            if($id){
                //编辑
                if($_FILES['myfile']['size']>=1024*1024*2){
                    $this->error('上传图片不能大于2M');
                }

                if($data['uptime']){
                    $data['uptime']=strtotime($data['uptime']);
                }else{
                    $data['uptime']=time();
                }

                $info=$this->upload();

                if($info){
                    $logo=$model->where(array('id'=>$id))->find();
                    unlink('./Public/Uploads/'.$logo['logo']);
                    unlink('./Public/Uploads/'.$logo['thumb_logo']);
                    $yt=$info['myfile']['savepath'].$info['myfile']['savename'];
                    if($data['width'] && $data['height']){
                        $tp=$this->thumb('./Public/Uploads/'.$yt,$info['myfile']['savename'],$data['width'],$data['height']);
                        $data['logo']=$yt;
                        $data['thumb_logo']=$tp;
                    } else {
                        $tp=$this->thumb('./Public/Uploads/'.$yt,$info['myfile']['savename']);
                        $data['logo']=$yt;
                        $data['thumb_logo']=$tp;
                    }

                } else {
                    $logo=$model->where(array('id'=>$id))->find();
                    //dump($logo);die;
                    if($data['width'] && $data['height']){
                        $image = new \Think\Image();
                        $image->open("./Public/Uploads/".$logo['logo']);
                        $image->thumb($data['width'],$data['height'],6)->save("./Public/Uploads/".$logo['thumb_logo']);
                    }
                }

                if($model->where(array('id'=>$id))->save($data)!==false){
                    $this->redirect("/admin/Active/lis/cid/$cid/p/$p");
                    die;
                } else {
                    $this->error($model->getError());
                }

            } else {
                //增加
                if($_FILES['myfile']['size']>=1024*1024*2){
                    $this->error('上传图片不能大于2M');
                }

                $data['addtime']=time();
                if($data['uptime']){
                    $data['uptime']=strtotime($data['uptime']);
                }else{
                    $data['uptime']=time();
                }

                $info=$this->upload();
                //dump($info);
                if($info){
                    $data['logo'] = $info['myfile']['savepath'].$info['myfile']['savename'];
                    }
                }

                if($lastid=$model->add($data)){
                    $this->redirect("/admin/Active/lis/cid/$cid/p/$p");
                    die;
                } else {
                    $this->error($model->getError());
                }


        }
    }


    public function ajax_content(){
        $Aid = I('post.Aid');
        $model = M('Active');
        $json = $model->find($Aid);
        if($json['logo']){
            $json['logo'] = '/Public/Uploads/'.$json['logo'];
        } else {
            unset($json['logo']);
        }
        $json['uptime'] = date('Y-m-d h:i:s',$json['uptime']);
        $json['content'] = html_entity_decode($json['content']);
        $this->ajaxReturn($json);
    }


    public function uploadTest(){

        $this->display('upload');

    }

    public function lis(){
        $cid=I('get.cid');
        $cmodel=M('Category');
        $va=$cmodel->where('id='.$cid)->find();
        $this->va=$va;
        $data=$this->search($va['model_name'],$cid,10);
        $this->dlist = $data['data'];
        $this->count = $data['count'];
        $this->plist = $data['page'];
        $cate_name = $cmodel->where(array('model_name'=>'Active'))->select();
        $this->cate_name = $cate_name;

        $this->display('active-lis');
    }

    public function delete(){
        $id=I('get.id');
        $cid=I('get.cid');
        $model=M('Active');
        $logo=$model->where(array('id'=>$id))->find();
        unlink('./Public/Uploads/'.$logo['logo']);
        unlink('./Public/Uploads/'.$logo['thumb_logo']);
        $model->where(array(
            'id'=>$id,
        ))->delete();
        $this->redirect("/Admin/active/lis/cid/$cid");
        die;
    }

    public function upload($size=2,$lanmu='active/'){
        $config=array(
            'maxSize'    =>    $size*1024*1024,
            'savePath'   =>$lanmu,
            'rootPath'=>'./Public/Uploads/',
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd')
        );
        $upload = new \Think\Upload($config);// 实例化上传类

        if($_FILES['myfile']['error']==0) {

            $info = $upload->upload();

            if ($info) {
                return $info;
            }
        }else {
            return false;
        }
    }

    public function thumb($file,$filename,$width=300,$height=200,$type=1){
        $image = new \Think\Image();
        $image->open($file);
        $savepath = str_replace($filename, '', $file); // ./Public/Uploads/2015-01-01/
        $savename = 'thumb_'.$filename;
        $image->thumb($width,$height,$type)->save($savepath.$savename);
        $url=str_replace('./Public/Uploads/','',$savepath.$savename);
        return $url;
    }

    public function ajaxChange(){
        $mid=I('post.mid');
        $type=I('post.type');
        $val=I('post.xs');
        file_put_contents('d:/a.txt',$type);
        $model=M('Active');
        if($type==1){
            if($val==1){
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_common'=>'0'));
                exit;
            }else{
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_common'=>'1'));
                exit;
            }
        }else if($type==3){
            if($val==1){
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_vip'=>'0'));
                exit;
            }else{
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_vip'=>'1'));
                exit;
            }
        }else {
            if($val==1){
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_super'=>'0'));
                exit;
            }else{
                $model->where(array(
                    'id'=>$mid
                ))->save(array(
                    'is_super'=>'1'));
                exit;
            }
        }
    }

    public function ajax_up(){
        $id=I('post.mid');
        $sort=I('post.val');
        $model=M('Active');
        $data=array();
        $last=$model->where(array('id'=>array('gt',$id)))->order('id desc')->find();
        if($last){
            $model->where(array('id'=>$id))->setField('sort_num',$last['sort_num']);
            $model->where(array('id'=>$last['id']))->setField('sort_num',$sort);
            $now=$model->find($id);
            $updata=$model->find($last['id']);
            $data['now']=$now;
            $data['updata']=$updata;
            echo json_encode($data);die;
        }else{
            echo json_encode($data);
        }
    }

    public function newList($keyword=''){
        $data = $this->searchArticle($keyword,$pageSize=8);
        $this->dlist = $data['data'];
        $this->plist = $data['page'];
        $CatModel =  M('category');
        $cate_name = $CatModel->where(array('model_name'=>'Active'))->select();
        $this->cate_name = $cate_name;
        $this->display();
    }

    public function test(){
        $this->display();
    }

    public function test_upload(){

        if(!empty($_FILES)){

            $config=array(
                'maxSize'    =>    2*1024*1024,
                'savePath'   =>    'test',
                'rootPath'=>'./Public/Uploads/',
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
                'subName'    =>    array('date','Ymd')
            );
            $upload = new \Think\Upload($config);// 实例化上传类

            $info = $upload->upload();

            $data = array();
            if(!$info){
                // 返回错误信息
                $error = $upload->getError();
                $data['error_info']=$error;
                //var_dump($data);
            }else{
                // 返回成功信息
                foreach($info as $file){
                    $data['name']=trim($file['savepath'].$file['savename'],'.');
                    // p($data);
                }
                $json = '/Public/Uploads/'.$data['name'];
                $this->ajaxReturn($json);
            }

        }
    }



}
