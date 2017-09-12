<?php

namespace app\admin\controller;
use houdunwang\core\Controller;

class Common extends Controller
{
	public function __construct ()
	{
		//登录验证
		if(!isset($_SESSION['id'])){
			//跳转到登录页面
			header ('location:?s=admin/login/index');
			exit;
		}
	}
}