<?php
require_once __DIR__ . '/../DB/DB.php';
require_once __DIR__ . '/../functions/image_upload.php';

if ($_POST['title'] && $_POST['description']) {
	$title = $_POST['title'];
	$description = $_POST['description'];
}
if ($_FILES['image']['tmp_name']) {
	$img_name = $_FILES['image']['name'];
}
image_upload('image');
$addNews = new DB();
$addNews = $addNews->addNews($title, $description, $img_name);
header('Location: ../index.php');
