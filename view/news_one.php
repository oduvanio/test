<!DOCTYPE html>
<html>
<head>
	<title><?php echo $news_one[0]['title']; ?></title>
</head>
<body>
	<?php if($news_one[0]['picture']): ?>
		<img src="images/<?php echo $news_one[0]['picture']; ?>" style="float: left; margin-right: 10px;width: 500px; height: auto;">
	<?php endif; ?>
	<h2><?php echo $news_one[0]['title']; ?></h2>
	<p><?php echo $news_one[0]['description']; ?></p>
	<a href="index.php">Перейти на главную</a>
</body>
</html>