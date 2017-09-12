<?php

namespace system\model;

use houdunwang\model\Model;

class Admin extends Model
{
	/**
	 * 登录
	 */
	public function login($data){
		$admin_username = $data['admin_username'];
		$admin_password = $data['admin_password'];
		$captcha = $data['captcha'];
		//数据验证
		//return ['code'=>0,'msg'=>'请输入用户名']
		//code 标识成功还是失败的标识 1代表成功，0代表失败
		//msg 提示消息
		if(!trim ($admin_username)) return ['code'=>0,'msg'=>'请输入用户名'];
		if(!$admin_password) return ['code'=>0,'msg'=>'请输入密码'];
		if(!trim ($captcha)) return ['code'=>0,'msg'=>'请输入验证码'];
		//比对用户名密码是否正确
		//根据用户提交的username在数据库进行查找
		$userInfo = $this->where("admin_username='{$admin_username}'")->getAll();
		//如果找不到数据，说明当前用户不存在
		if(!$userInfo)  return ['code'=>0,'msg'=>'用户名不存在'];
		//走到这说明$userInfo一定有数据
		//比对密码
		$userInfo = $userInfo->toArray();
		//dd($password);
		if(!password_verify ($admin_password,$userInfo[0]['admin_password'])) return ['code'=>0,'msg'=>'密码不正确'];
		//走到这里说明账号密码都正确
		//比对验证码是否正确
		if(strtolower ($captcha) != strtolower ($_SESSION['phrase'])) return ['code'=>0,'msg'=>'验证码不正确'];
		//登录成功
		//将用户登录信息存储到session中
		$_SESSION['id'] = $userInfo[0]['id'];
		$_SESSION['admin_username'] = $userInfo[0]['admin_username'];
		//返回成功标识和成功提示信息
		return ['code'=>1,'msg'=>'登录成功'];
	}

	/**
	 * 修改密码
	 * @param $data		post提交的数据
	 *
	 * @return array
	 */
	public function changePass($data){
		$admin_password = $data['admin_password'];//旧密码
		$new_password = $data['new_password'];//新密码
		$confirm_password = $data['confirm_password'];//确认密码
		//1.数据验证，都不能为空
		if(!$admin_password) return ['code'=>0,'msg'=>'请输入原始密码'];
		if(!$new_password) return ['code'=>0,'msg'=>'请输入新密码'];
		if(!$confirm_password) return ['code'=>0,'msg'=>'请输入确认密码'];
		//2.验证旧密码是否正确
			$userInfo = self::find($_SESSION['id'])->toArray();
			if(!password_verify ($admin_password,$userInfo['admin_password'])) return ['code'=>0,'msg'=>'原始密码不正确'];
		//3.比对两次新密码是否一致
			if($new_password != $confirm_password) return ['code'=>0,'msg'=>'两次新密码不一致'];
		//4.进行密码修改
			//该数组为修改数据库数据
			$newData = [
				//数据库要修改的字段   =>  更新的值
				'admin_password'=>password_hash ($new_password,PASSWORD_DEFAULT),
			];
			$this->where("id={$_SESSION['id']}")->update($newData);
		return ['code'=>1,'msg'=>'密码修改成功'];
	}
}