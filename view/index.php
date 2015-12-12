<!DOCTYPE html>
<html>
<head>
	<title>Новости</title>
</head>
<body>
	<?php foreach($news as $news_one): ?>
		<?php if($news_one['picture']): ?>
			<img src="images/<?php echo $news_one['picture'];?>" style="float: left; margin-right: 10px; width: 100px; height: auto;">
		<?php endif; ?>
		<h2><?php echo $news_one['title']; ?></h2>
		<p><?php echo $news_one['description']; ?></p>
		<a href="news_one.php?id=<?php echo $news_one['id']; ?>">Страница новости</a>
		<hr>
	<?php endforeach; ?>
	<h3>Вы можете добавить новость с помощью формы: </h3>
	
</body>
</html>