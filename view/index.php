<!DOCTYPE html>
<html>
<head>
	<title>Новости</title>
</head>
<body>
	<?php foreach($news as $news_one): echo realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $news_one['picture']);?>
		<img src="<?php echo realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $news_one['picture']);?>" style="float: left; margin-right: 10px;">
		<h2><?php echo $news_one['title']; ?></h2>
		<p><?php echo $news_one['description']; ?></p>
		<a href="controller/article.php?id=<?php echo $news_one['id']; ?>">Страница новости</a>
		<hr>
	<?php endforeach; ?>
</body>
</html>