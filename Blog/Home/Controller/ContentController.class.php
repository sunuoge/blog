<?php
namespace Home\Controller;
use Think\Controller;

class ContentController extends CommonController {
    public function index(){

		$id = I('get.id');
		$field=	array('aid','title','content','time','click');
		$blog=M('article')->field($field)->find($id);
		$this->blog=$blog;
		
// 	    $coms=M('article')->$id;

		$com=M('Comment')->where('aid='.$id)->order('time DESC')->select();
        $this->assign('com', $com);
		
		$db=M('comment');
		$comcount = $db->where('aid='.$id)->count();
        $this->assign('comcount',$comcount);
		
		
		S('Content',$blog,10);
		S('Content',$com,10);
		$this->display('/content');
    }
}