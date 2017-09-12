<?php

namespace houdunwang\view;

class Base{
	//存放数据
	protected $data = [];
	//存放模板路径
	protected $file;
	//分配变量
	public function with($var){
		$this->data = $var;
		return $this;
	}

	//显示模板
	public function make(){
		$this->file =  "../app/".MODULE."/view/".strtolower (CONTROLLER)."/".ACTION.".php" ;
		return $this;
	}

	/**
	 * 当echo 输出对象的时候出发
	 * @return string
	 */
	public function __toString ()
	{
		extract ($this->data);
		include $this->file;
		return '';
	}
}