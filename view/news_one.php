<!DOCTYPE html>
<html>
<head>
	<title><?php echo $news_one[0]['title']; ?></title>
</head>
<body>
	<img src="<?php echo $news_one[0]['img']; ?>" style="float: left; margin-right: 10px;">
	<h2><?php echo $news_one[0]['title']; ?></h2>
	<p><?php echo $news_one[0]['description']; ?></p>
	<a href="../index.php">Перейти на главную</a>
</body>
</html>