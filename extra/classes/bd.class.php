<?php

class banco_mysql
{
	private static $conn;
	public function __construct(){}
	public static function conn()
	{
		if(is_null(self::$conn))
		{
			self::$conn = new PDO('mysql:host=localhost;dbname=academia', 'root', '');
		}
		return self::$conn;
	}
}

?>