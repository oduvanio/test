<?php
require_once __DIR__ . '/../DB/DB.php';

$news_one = new DB();
$news_one = $news_one->newsGetOne($_GET['id']);