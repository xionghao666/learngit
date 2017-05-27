<?php 
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class TopicController extends CommonController {
  public function index(){
  	if(IS_POST){
  		$map['text'] = array('like',"%{$_POST['topic']}%");
  	}else{
  		$map['text'] = array('like',"%{$_GET['topic']}%");
  	}
  	
  	$text = D('Text');
    // dump($map);exit;
    $count = $text->where($map)->count();
    $page = new \Think\Page($count,5);
    $page->setConfig('prev','上一页');
    $page->setConfig('next','下一页');
  	$result = $text->where($map)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->getselect();
    // dump($result);exit;
    $ad = D('Ad');
    $adlist = $ad->where('start =2')->select();
    $this->assign('adlist',$adlist);
    $pageButton = $page->show();
    $this->assign('pageButton',$pageButton);   
    $this->assign('result',$result);   
    $this->display();   
  }
  public function choose(){
    if(IS_POST){
      $id = $_POST['id'];
      // dump($id);exit;
      foreach($id as $key=>$val){
        $topicid.=$val.',';
      }
      $topicid = rtrim($topicid,',');
      $user = D('Users');
      $map['id'] = $_SESSION['home']['id'];
      $map['topic'] = $topicid;
        if($user->save($map)){
          $this->success('感谢您的选择，欢迎来到微博大世界！',U('Person/index'));
        } 
     
    }
    $topic = D('Topic');
    $topiclist = $topic->select();
    // dump($topiclist);exit;
    $this->assign('topiclist',$topiclist);
    $this->display();

  }
  public function look(){
    $map['id'] = $_SESSION['home']['id'];
    $user = D('Users');
    $userinfo = $user->where($map)->find();
    $topic = $userinfo['topic'];
    // dump($topic);exit;

    $topic1 = D('Topic');
    $topic1list = $topic1->where('id in('.$topic.')')->select();
    // dump($topic1list);exit;
    $this->assign('topic1list',$topic1list);
    $this->display();
  }
  public function show(){
    $this->display();
  }
}
 ?>