<?php
require_once __DIR__ . '/../functions/sql.php';

function newsOneDelete($id)
{
	$sql = "DELETE FROM news WHERE id='".$id."'";
	return sqlQuery($sql);
}