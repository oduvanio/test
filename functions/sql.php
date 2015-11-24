<?php
function sqlConnect() 
{
	$link = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($link, 'news_test');
	mysqli_set_charset($link, 'utf8');
	return $link;
}
function sqlExec($sql)
{
	$link = sqlConnect();
	$res=mysqli_query($link, $sql);
	if ($res) return true;
}
function sqlQuery($sql)
{
	$link = sqlConnect();
	$res=mysqli_query($link, $sql);
	$ret = [];
	while ($row = mysqli_fetch_assoc($res)) {
		$ret[] = $row;
	}
	return $ret;
}