<?php
require_once __DIR__ . '/functions/sql.php';

function newsGetAll()
{
	$sql = "SELECT * FROM news";
	return sqlQuery($sql);
}
$news = newsGetAll();
include __DIR__. '/view/index.php';
