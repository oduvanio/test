<?php
require_once __DIR__ . '/../functions/sql.php';

function newsGetOne($id)
{
	$sql = "SELECT * FROM news WHERE id='".$id."'";
	return sqlQuery($sql);
}