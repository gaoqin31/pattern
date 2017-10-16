<?php
/**
 * 工厂方法模式
 */
interface IDB{
	public function connect();
	public function query();
}

interface IDbFactory{
	public function create();
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

class MysqlFatory implements IDbFactory{
	public function create(){
		return new Mysql();
	}
}

class SqlServerFatory implements IDbFactory{
	public function create(){
		return new SqlServer();
	}
}

class Client{
	public static  function main(){
		$dbFactory = new MysqlFatory();
		$db = $dbFactory->create();
		$db->connect();
		$db->query();
		
		$dbFactory = new SqlServerFatory();
		$db = $dbFactory->create();
		$db->connect();
		$db->query();
	}
}
Client::main();