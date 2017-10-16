<?php
/**
 * 抽像工厂模式
 */
interface IDB{
	public function connect();
	public function query();
}

interface ICache{
	public function connect();
	public function get();
}

interface IFactory{
	public function creatDB();
	public function createCache();
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

class MysqlCache implements ICache{
	public function connect(){
		echo "连接mysql缓存\n";
	}
	
	public function get(){
		echo "查询mysql缓存\n";
	}
}

class SqlServerCache implements ICache{
	public function connect(){
		echo "连接sqlserver缓存\n";
	}
	
	public function get(){
		echo "查询sqlserver缓存\n";
	}
}


class MysqlFatory implements IFactory{
	public function creatDB(){
		return new Mysql();
	}
	
	public function createCache() {
		return new MysqlCache();
	}
}

class SqlServerFatory implements IFactory{
	public function creatDB(){
		return new SqlServer();
	}
	
	public function createCache() {
		return new SqlServerCache();
	}
}


class Client{
	public static  function main(){
		$factory = new MysqlFatory();
		$db = $factory->creatDB();
		$db->connect();
		$db->query();
		
		$cache = $factory->createCache();
		$cache->connect();
		$cache->get();
		
		$factory = new SqlServerFatory();
		$db = $factory->creatDB();
		$db->connect();
		$db->query();
		
		$cache = $factory->createCache();
		$cache->connect();
		$cache->get();
	}
}
Client::main();