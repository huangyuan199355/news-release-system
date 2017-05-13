<?php
header('Content-Type:text/html;charset=utf-8');
$user_data=array(1=>array('username'=>'黄远','password'=>'123'));
if(isset($_POST['username']) && isset($_POST['password'])){
	$username=strtolower(trim($_POST['username']));
	$password=$_POST['password'];
	foreach($user_data as $k=>$v){
		if($v['username']==$username&&$v['password']==$password){
			// exit('登录成功！');
			
			session_start();
			$_SESSION['user']=array('id'=>$k,'username'=>$v['username']);
			header('Location:index.php');
			exit;
		}
	}
	exit('登录失败！用户名或密码错误');
}
require './login.html';

