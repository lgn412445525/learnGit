<?php
namespace Common\Model;
use Think\Model;
class CategoryModel extends Model{
    protected $insertFields='cate_name,is_show,is_nav,pid,sort_num,model_name';
    
    protected $updateFields='id,cate_name,is_show,is_nav,pid,sort_num,model_name';
    
    protected $_validate = array(
            array('cate_name','require','栏目名称不能为空','regex',3),
            array('is_nav',array(0,1),'是否导航未选',3,'in'),
            array('is_show',array(0,1),'是否显示未选',3,'in'),
        );

    public function getTree($pid=0){
        $data=$this->order('sort_num')->select();
        return $this->resort($data,$pid=0);
    }
    public function resort($data,$pid=0,$level=0,$clear=true){
        static $arr=array();
        if($clear){
            $arr=array();
        }
        foreach($data as $key=>$val){
            if($val['pid']==$pid){
                $val['level']=$level;
                $val['model_url']=$val['model_name']."/lis";
                $arr[]=$val;
                $this->resort($data,$val['id'],$level+1,false);
            }
        }
        return $arr;
    }

    public function getChildren($id){
        $data=$this->select();
        //return $data;
        $list=$this->myChildren($data,$id);
        //这里这个true与false表示清空刚才那个
        return $list;
    }

    public function catSon($id){
        $data = $this->order('sort_num')->select();
        $list = $this->myChildren($data,$id);
        return $list;
    }

    private function myChildren($data,$id,$clear=true)
    {
        static $arr =array();
        if ($clear) {
            $arr =array();
        }
        foreach ($data as $val) {
            if ($val['pid'] == $id) {
                $arr[] = $val;
                $this->myChildren($data, $val['id'], false);
            }
        }
        return $arr;
    }


    protected function _before_insert(&$data,$option){
        
    }
    
    public function _before_update($data,$option){
       
    }

    public function _after_insert($data,$option){
        
    }

    public function _before_delete($option){

    }


    public function getOneCate($cid,$num=5){
        $arr=array();
        $data=$this->select();
        $gmodel=D('Goods');
        //dump($data);
        foreach($data as $k=>$v){
            if($v['pid']==$cid){
                $glist=$gmodel->getGoodsCate($v['id'],5);
                $v['gdata']=$glist;
                $data[$k]=$v;
                $arr[]=$v;
                if(count($arr)>=$num){
                    break;
                }
            }
        }
        return $arr;
    }


    public function getAllCate(){
        $arr=array();
        $data=$this->select();
        foreach($data as $key=>$val){
            if($val['pid']==0){
                foreach($data as $k=>$v){
                    if($v['pid']==$val['id'])
                        $val['children'][]=$v;
                }
                $arr[]=$val;
            }
        }
        return $arr;
    }


    public function getType(){
        $tmodel=M('Type');
        $list=$tmodel->where(array(
            'is_show'=>'1'))->select();
        return $list;
    }


    

    public function familytree($id) {
        $tree = array();
        $arr = $this->select();
        foreach($arr as $v) {
            if($v['id'] == $id) {// 判断要不要找父栏目
                if($v['pid'] > 0) { // parnet>0,说明有父栏目
                    $tree = array_merge($tree,$this->familytree($v['pid']));
                }
                $tree[] = $v;
            }
        }
        return $tree;
    }

    

}

?>