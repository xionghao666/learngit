<?php 
  namespace Admin\Controller;
  use Think\Controller;
  class CommonController extends Controller{
  	  public function _initialize(){

         if(empty($_SESSION['admin']))$this->redirect('Login/login');


  	  }
  }
 ?>