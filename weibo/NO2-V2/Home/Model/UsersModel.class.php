<?php 
namespace Home\Model;
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
		$name = "name";
		return $name;

	}
}

 ?>
