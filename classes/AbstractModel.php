<?php
abstract class AbstractModel
{
	protected static $table;
	protected static $class;
	public static function getAll()
	{
		$db = new DB();
		$sql = 'SELECT * FROM ' . static::$table;
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
			return $res;
		} else {
			$db = new DB();
			$sql = "INSERT INTO " . static::$table . " (title, description, picture) VALUES ('".$title."', '".$description."', '".$picture."')";
			$db->queryAddOne($sql);
		}
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
			$sql = 'UPDATE ' . static::$table . ' SET title=' .$title. ', description=' .$description. ', picture=' .$picture. ' WHERE id=' .$id;
			$db->queryUpdateOne($sql);
		}
		return $this->res;
	}
	public static function imageUpload($field)
	{
		if (empty($_FILES)) {
			return false;
		}
		if (0 != $_FILES[$field]['error']) {
			return false;
		}
		if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
			$res = move_uploaded_file($_FILES[$field]['tmp_name'], __DIR__ . '/../images/' . $_FILES[$field]['name']); //в какую папку положить необходимо указывать относительно существующего пути
		}
		if (!$res) {
			return false;
		} else {
			return $_FILES[$field]['name'];
		}
		return false;
	}
}