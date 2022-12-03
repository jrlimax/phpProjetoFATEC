<?php
require_once 'configBD.php';
// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if ($mysqli -> connect_errno)
// {
// 	echo "Connect failed: " . $mysqli->connect_error;
// 	exit();
// }
class DB
{
	private static $instance;
	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			try {
				self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}
	public static function prepare($sql)
	{
		return self::getInstance()->prepare($sql);
	}
}
