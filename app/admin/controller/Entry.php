<?php

namespace app\admin\controller;

use houdunwang\view\View;
use system\model\Admin;

class Entry extends Common
{
	public function index(){
		//加载模板文件
		return View::make();
	}

	/**
	 * 修改密码
	 */
	public function changePass(){
		if(IS_POST){
			$res = (new Admin())->changePass($_POST);
			if($res['code']){
				//成功
				//密码修改成功之后。清除session
				session_unset ();
				session_destroy ();
				$this->setRedirect (u('entry.index'))->message ($res['msg']);
			}else{
				//失败
				$this->setRedirect ()->message ($res['msg']);
			}
		}
		return View::make();
	}

	/**
	 * 退出登录
	 */
	public function out(){
		session_unset ();
		session_destroy ();
		header ('location:?s=admin/login/index');exit;
	}
}