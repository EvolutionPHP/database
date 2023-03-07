<?php

namespace EvolutionPHP\Database;

use EvolutionPHP\Database\Library\Driver;

class Database
{
	static $instance;


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

			self::$instance = new Driver($data);
		}
		return self::$instance;
	}
}