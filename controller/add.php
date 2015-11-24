<?php
require_once __DIR__ . '/../functions/sql.php';

function addNews($title, $description, $picture = '')
{
	if (!$title || !$description) {
		$res = 'Новость не может быть добавлена, т.к. заполена не полностью';
	} else {
		$sql = "INSERT INTO news VALUES ('".$title."', '".$description."', '".$picture."')";
		echo $sql;
		die;
		$res = sqlExec($sql);
	}
	return $res;
}
addNews('Самолет', 'Летел из шарм-эль-шейха');