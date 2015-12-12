<?php
require_once __DIR__ . '/../functions/sql.php';

function newsOneUpdate($id, $title, $description, $picture = '')
{
	
	if (!$title || !$description) {
		$res = 'Новость не может быть изменена, т.к. заполена не полностью';
	} else {
		$sql = "UPDATE news SET title='".$title."', description='".$description."', picture='".$picture."' WHERE id='".$id."'";
		return sqlQuery($sql);
	}
	return $res;
}