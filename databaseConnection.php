<?php
require_once 'LoginDatabase.php';
class Database
{
private static $db = null;
private static $pdo;
final private function __construct()
{
	try {
		self::getDb();
	} catch (Exception $e) {
			echo 'Fatal Error: ' . $e->getMessage();
	        exit();
	}
}
public static function getInstance()
	{
		if (self::$db === null){
			self::$db = new self();
		}
		return self::$db;
	}
public function getDb()
{
	if(self::$pdo == null){
		self::$pdo = new PDO(
			'mysql:dbname='. DATABASE .
			';host=' . HOSTNAME .
			';port:63343;',
			USERNAME,
			PASSWORD);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	return self::$pdo;
}
final protected function __clone()
{
}
function _destructor()
{
	self::$pdo=null;
}
}
 ?>