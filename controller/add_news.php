<?php
require_once __DIR__ . '/../DB/DB.php';
require_once __DIR__ . '/../functions/image_upload.php';
include __DIR__ . '/../News/News.php';

if ($_POST['title'] && $_POST['description']) {
	$news = new News($_POST['title'], $_POST['description']);
}
if ($_FILES['image']['tmp_name']) {
	$news->img = $_FILES['image']['name'];
}
image_upload('image');
$addNews = new DB();
$addNews = $addNews->addNews($news->title, $news->text, $news->img);
header('Location: ../index.php');
