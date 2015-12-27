<?php
class DB {
	public $link;
	public $ret;
	public function __construct()
	{
		$mysqli = new mysqli('localhost', 'root', '');
		$mysqli->select_db('news_test');
		$mysqli->set_charset('utf8');
		$this->mysqli = $mysqli;
	}
	public function queryGetAll($sql, $class='stdClass')
	{
		$res = $this->mysqli->query($sql);
		if (false===$res) {
			return false;
		}
		$ret = [];
		while ($row = mysql_fetch_object($res, $class)) {
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
}