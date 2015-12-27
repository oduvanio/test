<?php
require_once __DIR__ . '/../DB/DB.php';

$news = new DB();
$news = $news->queryGetAll();