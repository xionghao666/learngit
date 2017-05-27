<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class IndexController extends CommonController {
    public function index(){
    	$text = D('Text');
        $inter = D('Inter');
        $praise = D('Praise');
        //获取当前已登录用户的关注的人,用于下面查找相关微博内容
        $arr = array("uid"=>$_SESSION['home']['id']);
        $list = $inter->where($arr)->select();

        //拼接查询sql语句中in条件的范围
        foreach ($list as $val) {
            $str .= $val['gzid'].',';
        }
        $str = "(".$str.$_SESSION['home']['id'].")";
        //查询已登录用户以及其关注用户所发的所有微博内容
        $count=$text->where("uid in ".$str."")->order('addtime desc')->count();
        $page = new \Think\Page($count,5);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $result = $text->where("uid in ".$str."")->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->getselect();
        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);
        $this->assign('result',$result);
        // dump($result);
        // exit;
        $map['topic'] = array('like','%明星%');
        $map1['topic'] = array('like','%娱乐%');
        $map2['topic'] = array('like','%汽车%');
        $map3['topic'] = array('like','%医学%');
        $map4['topic'] = array('like','%搞笑%');
        $map5['topic'] = array('like','%新闻时事%');
        $map6['topic'] = array('like','%川普%');
        $map7['topic'] = array('like','%时尚穿搭%');
        $map8['topic'] = array('like','%职场%');
        $map9['topic'] = array('like','%电影%');
        $map10['topic'] = array('like','%秘密%');
        $map11['topic'] = array('like','%维多利亚%');
        $map12['topic'] = array('like','%跑车%');
        $map13['topic'] = array('like','%综艺%');


        $counttopic = $text->where($map)->count();
        $counttopic1 = $text->where($map1)->count();
        $counttopic2 = $text->where($map2)->count();
        $counttopic3 = $text->where($map3)->count();
        $counttopic4 = $text->where($map4)->count();
        $counttopic5 = $text->where($map5)->count();
        $counttopic6 = $text->where($map6)->count();
        $counttopic7 = $text->where($map7)->count();
        $counttopic8 = $text->where($map8)->count();
        $counttopic9 = $text->where($map9)->count();
        $counttopic10 = $text->where($map10)->count();
        $counttopic11 = $text->where($map11)->count();
        $counttopic12 = $text->where($map12)->count();
        $counttopic13 = $text->where($map13)->count();

        $_SESSION['home']['counttopic'] = $counttopic;
        $_SESSION['home']['counttopic1'] = $counttopic1;
        $_SESSION['home']['counttopic2'] = $counttopic2;
        $_SESSION['home']['counttopic3'] = $counttopic3;
        $_SESSION['home']['counttopic4'] = $counttopic4;
        $_SESSION['home']['counttopic5'] = $counttopic5;
        $_SESSION['home']['counttopic6'] = $counttopic6;
        $_SESSION['home']['counttopic7'] = $counttopic7;
        $_SESSION['home']['counttopic8'] = $counttopic8;
        $_SESSION['home']['counttopic9'] = $counttopic9;
        $_SESSION['home']['counttopic10'] = $counttopic10;
        $_SESSION['home']['counttopic11'] = $counttopic11;
        $_SESSION['home']['counttopic12'] = $counttopic12;
        $_SESSION['home']['counttopic13'] = $counttopic13;
        
        //查询当前登录用户所发的微博数量并存在SESSION中便于在各个页面中调用
        $textnum = $text->where("uid=".$_SESSION['home']['id'])->count();
        $_SESSION['home']['textnum'] = $textnum;

        //查询当前登录用户关注的人总数
        $gznum = $inter->where('uid='.$_SESSION['home']['id'])->count();
        $_SESSION['home']['gznum'] = $gznum;

        //查询当前登录用户粉丝总人数
        $fsnum = $inter->where('gzid='.$_SESSION['home']['id'])->count();
        $_SESSION['home']['fsnum'] = $fsnum;

        $this->display();



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
            $_POST['text'] = htmlspecialchars($_POST['text']);
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
            // dump($_POST);exit;
            preg_match_all("/#(.*?)#/",$_POST['text'],$name);
            $name = $name['1']['0'];
            $_POST['topic'] = $name;
            
            $text->add($_POST);
            $lastid = mysql_insert_id();
            preg_match_all("/@(.*?):/",$_POST['text'],$nickname);
            $nickname = $nickname['1']['0'];
             // dump($nickname);exit;
            $user = D('Users');
            $map['nickname'] = $nickname;
            $userinfo = $user->where($map)->find();
            $at = D('At');
            $arr1 = array(
                    'atid' => $userinfo['id'],
                    'uid' => $_SESSION['home']['id'],
                    'tid' => $lastid
                );
                $at->add($arr1);

            $this->success('发布成功');  
        }else
        {
            $this->redirect('index');
        }
    }

    public function del()
    {
        $text = D('Text');
        $result = $text->where('id='.$_GET['id'])->find();
        
        //如果为转发的微博,对原微博的转发数进行减1
        if(!empty($result['tid']))
        {
            $text->where('id='.$result['tid'])->setDec('repostnum');
        }
        $text->where('id='.$_GET['id'])->delete();

        $this->success("删除成功");
    }

    public function praise()
    {
        $id = $_GET['id'];
        $praise = D('Praise');
        $text = D('Text');
        $arr = array( 
            'uid' => $_SESSION['home']['id'],
            'tid' => $id
            );
        $arr1 = array('id'=> $id);
        $result = $praise->where($arr)->find();
        if($result){
            $praise->where($arr)->delete();
            $text->where($arr1)->setDec('praisenum');
            $this->success('已取消点赞');
        }else{
            $praise->add($arr);
            $text->where($arr1)->setInc('praisenum');
            $this->success('已点赞');
        }

    }

    public function newmsg()
    {
        //AJAX长轮询查询新消息,新AT,新私信
        set_time_limit(0);
        //设置条件 查询的ID为当前登陆用户的ID read为1 即未阅读
        $arr = array(
            'getid'=>$_SESSION['home']['id'],
            'read'=>'1' 
            );
        //新评论
        $comment =D('comment');
        $commentnum = $comment->where($arr)->count();
        //新私信
        $chat =D('chat');
        $chatnum = $chat->where($arr)->count();

        //新AT
        $arr1 = array(
            'atid'=>$_SESSION['home']['id'],
            'read'=>'1' 
            );
        $at = D('at');
        $atnum =$at->where($arr1)->count();

        $info['comment'] = $commentnum;
        $info['chat'] = $chatnum;
        $info['at'] = $atnum;

        $this->ajaxReturn($info);
        exit();

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