<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {
	private $first_row = 0;
	private $row_count = 1;
	
	public function index(){
        $Blog=D('Article');
        $count = $Blog->count();
	    $list=$Blog->relation(true)->order('aid DESC')->limit($this->first_row,$this->row_count)->select();
        $this->assign('list',$list);
        if(empty($list)){
        	$com = array();
        	$comcount = 0;
        }else{
            //文章记录
            $this->blog = $list[0];
        	$id = $list[0]['aid'];
        	//评论
        	$com=M('comment')->where('aid='.$id)->order('time DESC')->select();        	
        	$db=M('comment');
        	$comcount = $db->where('aid='.$id)->count();
        }
        $this->assign('com', $com);
        $this->assign('comcount',$comcount);
        
		S('index',$list,10);
		$this->display('/index');
    }
}