<?php
class DB {
	public $link;
	public $ret;
	public function __construct()
	{
		$this->link = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($this->link, 'news_test');
		mysqli_set_charset($this->link, 'utf8');
	}
	public function sqlExec($sql)
	{
		$res=mysqli_query($this->link, $sql);
	}
	public function sqlQuery($sql)
	{
		$res=mysqli_query($this->link, $sql);
		$this->ret = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$this->ret[] = $row;
		}
		return $this->ret;
	}
	public function addNews($title, $description, $picture = '')
	{
		if (!$title || !$description) {
			$this->res = 'Новость не может быть добавлена, т.к. заполена не полностью';
		} else {
			$sql = "INSERT INTO news (title, description, picture) VALUES ('".$title."', '".$description."', '".$picture."')";
			$this->res = $this->sqlExec($sql);
		}
		return $this->res;
	}
	public function newsGetOne($id)
	{
		$sql = "SELECT * FROM news WHERE id='".$id."'";
		return $this->sqlQuery($sql);
	}
	public function newsOneDelete($id)
	{
		$sql = "DELETE FROM news WHERE id='".$id."'";
		return $this->sqlQuery($sql);
	}
	public function newsOneUpdate($id, $title, $description, $picture = '')
	{
		
		if (!$title || !$description) {
			$this->res = 'Новость не может быть изменена, т.к. заполена не полностью';
		} else {
			$sql = "UPDATE news SET title='".$title."', description='".$description."', picture='".$picture."' WHERE id='".$id."'";
			return $this->sqlQuery($sql);
		}
		return $this->res;
	}
	public function newsGetAll()
	{
		$sql = "SELECT * FROM news";
		return $this->sqlQuery($sql);
	}
}