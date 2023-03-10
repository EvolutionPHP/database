<?php

namespace EvolutionPHP\Database;

use EvolutionPHP\Database\Library\Driver;

class Database
{
	static $instance;
	static $connectionData;

	public function test($data)
	{
		try{
			$c = new Driver($data);
			$c->close();
			return true;
		}catch (\Exception $e){
			return $e->getMessage();
		}
	}

	public static function connect($data=null)
	{
		if(!self::$instance)
		{
			if(!is_array($data)){
				throw new \ErrorException('Invalid configuration data.');
			}
			self::$connectionData = $data;
			self::$instance = new Driver(self::$connectionData);
		}
		return self::$instance;
	}
}