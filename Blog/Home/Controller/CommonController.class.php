<?php
namespace Home\Controller {
	use Think\Controller;
     
	class CommonController extends Controller{
	
        public function _initialize(){
	        $menu=M('menu')->order('sort ASC')->select();
	        $this->menu=$menu;
	    }
	    //提交评论
	    public function add(){
	    	//判断验证码
	    	if (I('verify', 'verify', 'strtolower') !== session('verify')) {
	    		$this->error('验证码错误！');
	    	}
	    	$article = M('comment');
	    	$article->find($_GET["coid"]);
	    	$data['aid'] = $_POST['aid'];
	    	$data['couname'] = $_POST['couname'];
	    	$data['content'] = $_POST['content'];
	    	if ($_POST['time'] == '') {
	    		$data['time'] = time();
	    	} else {
	    		$data['time'] = strtotime($_POST['time']);
	    	}
// 	    	$data['email'] = $_POST['email'];

	    	if ($article->add($data)) {
	    		$this->success('<p>提交成功</p>');
	    	} else {
	    		$this->error('<p>'.L('Write_error').'</p>');
	    	}
	    
	    }
	    //导入验证码，4为文字
	    public function verify(){
	    	$config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
	    	$verify = new \Think\Verify($config);
	    	$verify->entry();
	    }
	    //记录浏览
	    public function add_view_count(){
	    	$aid = I("aid");
	    	$article = M('article')->where("aid=$aid")->field('click')->find();
	    	$click = $article['click'];
	    	++$click;
	    	$article = M('article')->where("aid=$aid")->save(array('click'=>$click));
	    }
	    
	}
}