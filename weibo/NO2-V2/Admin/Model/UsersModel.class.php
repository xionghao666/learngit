<?php 
  namespace Admin\Model;
  use Think\Model;
  class UsersModel extends Model{

   protected $_validate = array(
    array('username','require','用户名不能为空'), 
    array('username','','帐号名称已经存在！',0,'unique',1),
    array('repassword','password','确认密码不正确',0,'confirm') 
  );
	protected $_auto = array(
		array('password','md5',3,'function')
	);

  	public function getAll(){
  		$user = D('Users');
  		$userlist = $user->select();
  		$role = array(
                '无用',
               '普通用户',
               '管理员',
               '禁用',
               'VIP',
  			);
      $sex = array('无用','男','女');
  		foreach($userlist as $key=>$val){
  			$userlist[$key]['state'] = $role[$val['state']];
        $userlist[$key]['addtime'] = date('Y-m-d H:i:s',$val['addtime']);
        $userlist[$key]['sex'] = $sex[ $val['sex']];
  		}

  		return $userlist;
  	}
  }
 ?>