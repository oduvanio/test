<?php
abstract class AbstractModel()
{
	protected static $table;
	protected static $class;
	public static function getAll()
	{
		$db = new DB();
		$sql = 'SELECT * FROM' . static::$table;
		return $db->queryGetAll($sql, static::$class);
	}
	public static function getOne($id)
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
		return $db->queryGetOne($sql, static::$class);
	}
	public static function addOne($title, $description, $picture)
	{
		if (!$title || !$description) {
			$res = 'Новость не может быть добавлена, т.к. заполена не полностью';
		} else {
			$db = new DB();
			$sql = "INSERT INTO news (title, description, picture) VALUES ('".$title."', '".$description."', '".$picture."')";
			$db->queryAddOne($sql);
		}
		return $res;
	}
	public static function deleteOne($id)
	{
		$db = new DB();
		$sql = 'DELETE * FROM ' . static::$table . ' WHERE id=' . $id;
		$db->queryDeleteOne($sql);
	}
	public static function updateOne($id, $title, $description, $picture='')
	{
		if (!$title || !$description) {
			$res = 'Новость не может быть изменена, т.к. заполена не полностью';
		} else {
			$db = new DB();
			$sql = 'UPDATE ' . static::$table . ' SET title=' .$title. ', description=' .$description. ', picture=' .$picture. ' WHERE id=' .$id.;
			$db->queryUpdateOne($sql);
		}
		return $this->res;
	}
}