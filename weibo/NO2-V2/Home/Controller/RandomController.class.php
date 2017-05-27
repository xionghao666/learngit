<?php 
	namespace Home\Controller;
	use Think\Controller;
	class RandomController extends CommonController{
		public function index(){
			$id=$_SESSION['home']['id'];
			//dump($_SESSION['home']['id']);exit;
			$topic=D('topic');
			$user=D('users');
			$text=D('text');
			$userinfo=$user->where('id='.$id)->find();
			if($userinfo['topic']==''){
			$count=$text->count();
			$page=new \Think\Page($count,5);
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$textlist = $text->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->getselect();
			$pageButton=$page->show();
			
			}else{
				//dump("(".$userinfo['topic'].")");exit;
			$topiclist=$topic->where('id in '."(".$userinfo['topic'].")")->select();
			foreach($topiclist as $key=>$val){
				$str.="'".$val['topic']."'".",";
			}
			$str=rtrim($str,",");
			$str="(".$str.")";	
			$count=$text->where('topic in '.$str)->count();
			$page=new \Think\Page($count,5);
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$textlist=$text->where('topic in '.$str)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->getselect();
			//echo $text->getLastSql();
			//dump($textlist);exit;
			$pageButton=$page->show();
			}
			$ad = D('Ad');
        	$adlist = $ad->where('start =2')->select();
        	$this->assign('adlist',$adlist);
			$this->assign('pageButton',$pageButton);
			$this->assign('textlist',$textlist);
			$this->display();
		}
		public function praise(){
			$id=$_GET['id'];
			$praise=D('praise');
			$text=D('text');
			$arr=array(
				'uid' => $_SESSION['home']['id'],
				'tid'=>$id
			);
			$arr1=array('id'=>$id);
			$result=$praise->where($arr)->find();
			if($result){
				$praise->where($arr)->delete();
				$text->where($arr1)->setDec('praisenum');
				$this->redirect('index');
			}else{
				$praise->add($arr);
				$text->where($arr1)->setInc('praisenum');
				$this->redirect('index');
			}
		}
		public function del(){
			$text=D('text');
			$result=$text->where('id ='.$_GET['id'])->find();
			if(!empty($result['tid'])){
				$text->where('id ='.$result['tid'])->setDec('repostnum');
			}
			$text->where('id ='.$_GET['id'])->delete();
			$this->success('删除成功');
		}
		 public function add()
    	{
	        if(IS_POST)
	        {
	            $text = D('Text');
	            $_POST['uid'] = $_SESSION['home']['id'];
	            $_POST['nickname'] = $_SESSION['home']['nickname'];
	            $time = time();
	            $_POST['addtime'] = $time;
	            $_POST['head'] = $_SESSION['home']['picname'];

	            $upload = new \Think\Upload();// 实例化上传类    
	            $upload->maxSize = 3145728 ;// 设置附件上传大小
	            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	            $upload->rootPath = './';   
	            $upload->savePath  = 'Public/Uploads/'; // 设置附件上传目录
	            $upload->autoSub = false;
	            $info= $upload->upload();
	            if($info){
	                foreach ($info as $file) {
	                    $_POST['picname'] =  $file['savename'];  
	                }
	            }
	            $text->add($_POST);
	            $this->success('发布成功');  
	        }else{
	            $this->redirect('index');
        	}
    	}
    	public function collect(){
    		$id=$_GET['id'];
    		$uid=$_SESSION['home']['id'];
    		$collect=D('collect');
    		$info=array('wbid'=>$id,'uid'=>$uid);
    		$result=$collect->where($info)->find();
    		if($result){
    			$collect->where($info)->delete();
    			$this->redirect('index');
    		}else{
    			$collect->add($info);
    			$this->redirect('index');
    		}
    		$this->display();
    	}
	}
 ?>