<?php
/**
 * 简单工厂模式
 */
interface IDB{
	public function connect();
	public function query();
}

class Mysql implements IDB{
	public function connect(){
		echo "连接mysql\n";
	}
	
	public function query(){
		echo "查询mysql\n";
	}
}

class SqlServer implements IDB{
	public function connect(){
		echo "连接sqlserver\n";
	}
	
	public function query(){
		echo "查询sqlserver\n";
	}
}

class DbFactory{
	public static $instance = null;
	public static function Create($dbname){
		switch($dbname){
			case 'mysql':
				self::$instance =  new Mysql();
				break;
			case 'sqlserver' : 
				self::$instance =  new SqlServer();
		}
		return self::$instance;
	}
}

class Client{
	public static  function main(){
		$db = DbFactory::Create('mysql');
		$db->connect();
		$db->query();
		
		$db = DbFactory::Create('sqlserver');
		$db->connect();
		$db->query();
	}
}
Client::main();