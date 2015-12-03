<?php
require_once __DIR__ . '/../functions/sql.php';

function newsGetOne($id)
{
	$sql = "SELECT * FROM news WHERE id='".$id."'";
	return sqlQuery($sql);
}
$news_one = newsGetOne($_GET['id']);
include __DIR__. '/../view/news_one.php';