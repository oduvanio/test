<!DOCTYPE html>
<html>
<head>
	<title><?php echo $items->title; ?></title>
</head>
<body>
	<?php if($items->picture): ?>
		<img src="images/<?php echo $items->picture; ?>" style="float: left; margin-right: 10px;width: 500px; height: auto;">
	<?php endif; ?>
	<h2><?php echo $items->title; ?></h2>
	<p><?php echo $items->description; ?></p>
	<a href="index.php">Перейти на главную</a>
</body>
</html>