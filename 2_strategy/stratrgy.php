<?php
/*
 *抽象策略类 
 */
abstract class Stratrgy{
	abstract function AlgorithmInterface();
}

//具体实现类A
class ConcreateStratrgyA extends Stratrgy{
	public function AlgorithmInterface() {
		echo '算法A', PHP_EOL;
	}
}

//具体实现类B
class ConcreateStratrgyB extends Stratrgy{
	public function AlgorithmInterface() {
		echo '算法B', PHP_EOL;
	}
}

//具体实现类C
class ConcreateStratrgyC extends Stratrgy{
	public function AlgorithmInterface() {
		echo '算法C', PHP_EOL;
	}
}

//上下文环境类
class Context{
	private $_strategy;
	//通过构造方法注入策略对像
	public function __construct(Stratrgy $strategy) {
		$this->_strategy = $strategy;
	}
	public function ContextInterface(){
		$this->_strategy->AlgorithmInterface();
	}
}

//客户端类
class Client{
	public static function main(){
		$context = new Context(new ConcreateStratrgyA());
		$context->ContextInterface();
		
		$context = new Context(new ConcreateStratrgyB());
		$context->ContextInterface();
		
		$context = new Context(new ConcreateStratrgyC());
		$context->ContextInterface();
	}
}
Client::main();