<?php
//抽象策略类
abstract class StrategyNotify{
   //参数检查
   abstract function checkParam();
   //发送道具
   abstract function sendProp();
   //输出报文
   abstract function outputMessage();
   //支付回调状态
   protected $_status = -1;
   //第三方参数
   protected $_params = array();

   protected $_errMsg = array(
	   '-1'=>'系统错误',
	   '-2'=>'参数验证错误',
	   '-3'=>'发送道具失败',
   );
   //通知方法
   public final function notify(){
	   if(!$this->checkParam()){
		   $this->_status = -2;
	   }else if(!$this->sendProp()){
		   $this->_status = -3;
	   }else{
		   $this->_status = 1;
	   }
	   if($this->_status != 1){
		   $this->log();
	   }
	   $this->outputMessage();
   }
   //写日志例子
   protected function log(){
	   echo isset($this->_errMsg[$this->_status]) ? $this->_errMsg[$this->_status] : '';
	   echo PHP_EOL;
   }
}

//微信支付
class Weixin extends StrategyNotify{
   public function checkParam() {
	   return false;
   }

   public function outputMessage() {
	   if($this->_status === 1){
		   die('OK');
	   }else{
		   die('FAIL');
	   }
   }

   public function sendProp() {
	   return false;
   }
}

//支付环境类
class Pay{
	private static $_notify = null;
	//策略工厂
	public static function factory($notify){
		if(class_exists($notify) && self::$_notify == null){
			self::$_notify = new $notify();
		}
		return self::$_notify;
	}
}

Pay::factory('Weixin')->notify();


