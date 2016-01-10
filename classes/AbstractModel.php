<?php
abstract class AbstractModel
{
	protected static $table;
	protected $data = [];

	public function __set($k, $v)
	{
		$this->data[$k] = $v;
	}
	public function __get($k)
	{
		return $this->data[$k];
	}
	public function __isset($k)
	{
		return isset($this->data[$k]);
	}
	/*
		Получить имя таблицы
	*/
	public static function getTableName()
	{
		return static::$table;
	}
	/*
		Получить все записи из базы данных
	*/
	public static function findAll()
	{
		$class = get_called_class(); //возвращает имя класса, код которого сейчас будет использовать
		$table = static::getTableName();
		$sql = 'SELECT * FROM ' . $table;
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql);
	}
	/*
		Получить одну запись из базы данных по id
	*/
	public static function findOne($id)
	{
		$class = get_called_class();
		$table = static::getTableName();
		$sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';
		$db = new DB();
		$db->setClassName($class);
		return $db->query($sql, [':id' => $id])[0];
	}
	/*
		Метод, который будет вставлять в базу данных созданный нами объект
	*/
	protected function insert()
	{
		$cols = array_keys($this->data);
		$ins = [];
		$data = [];
		foreach ($cols as $col) {
			$ins[] = ':' . $col;
			$data[':' . $col] = $this->data[$col];
		}
		$sql = 'INSERT INTO ' . static::$table . '(' . implode(',', $cols) . ') VALUES (' . implode(',', $ins) . ')';
		$db = new DB();
		$db->execute($sql, $data);
		$this->id = $db->lastInsertId(); //последний вставленный элемент в базу
	}
	/*
		Поиск в таблице записей с заданым значением заданного поля.
	*/
	public static function findByColumn($column, $value)
	{
		$class = get_called_class();
		$table = static::getTableName();
		$sql = 'SELECT * FROM ' . $table . ' WHERE ' . $column . ' LIKE :value';
		$db = new DB();
		$db->setClassName($class);
		$res = $db->query($sql, [':value' => '%' . $value . '%']);
		if (!empty($res)) {
			return $res;
		}
		return false;
	}
	protected function update()
	{
		$cols = [];
		$data = [];
		foreach ($this->data as $k => $v) {
			$data[':' . $k] = $v;
			if ('id' == $k) {
				continue;
			}
			$cols[] = $k . '=:' . $k;
		}
		var_dump($data);die;
		$table = static::getTableName();
		$sql = 'UPDATE ' . $table . ' SET ' . implode(', ', $cols) . ' WHERE id = :id';
		$db = new DB();
		$db->execute($sql, $data);	
	}
	public function save()
	{
		if (!isset($this->id)) {
			$this->insert();
		} else {
			$this->update();
		}
	}
	public function delete()
	{
		$table = static::getTableName();
		$sql = 'DELETE FROM ' . $table . ' WHERE id = :id';
		$db = new DB();
		$db->execute($sql, [':id' => $this->id]);
	}

	/*
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
	}*/
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