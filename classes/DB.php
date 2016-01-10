<?php
class DB {
	private $dbh;
	private $className = 'stdClass';

	public $link;
	public $ret;
	public function __construct()
	{
		/*
		$mysqli = new mysqli('localhost', 'root', '');
		$mysqli->select_db('news_test');
		$mysqli->set_charset('utf8');
		$this->mysqli = $mysqli;
		*/
		$this->dbh = new PDO('mysql:dbname=news_test;host=localhost', 'root', '');
	}
	public function setClassName($className)
	{
		$this->className = $className;
	}
	public function query($sql, $params=[])
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	}
	public function execute($sql, $params=[])
	{
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
	}
	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();
	}
	/*
	public function queryGetAll($sql, $class='stdClass')
	{
		$res = $this->mysqli->query($sql);
		if (false===$res) {
			return false;
		}
		$ret = [];
		while ($row = $res->fetch_object($class)) {
			$ret[] = $row;
		}
		return $ret;
	}
	public function queryGetOne($sql, $class='stdClass')
	{
		return $this->queryGetAll($sql, $class)[0];
	}
	public function queryAddOne($sql)
	{
		$this->mysqli->query($sql);
	}
	public function queryDeleteOne($sql)
	{
		$this->mysqli->query($sql);
	}
	public function queryUpdateOne($sql)
	{
		
		$this->mysqli->query($sql);
	}
	*/
}