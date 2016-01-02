<!DOCTYPE html>
<html>
<head>
	<title>Новости</title>
</head>
<body>
	<?php foreach ($items as $item): ?>
		<?php if($item->picture): ?>
			<img src="images/<?php echo $item->picture;?>" style="float: left; margin-right: 10px; width: 100px; height: auto;">
		<?php endif; ?>
		<h2><?php echo $item->title; ?></h2>
		<p><?php echo $item->description; ?></p>
		<a href="index.php?act=One&id=<?php echo $item->id; ?>">Страница новости</a>
		<hr>
	<?php endforeach; ?>
	<a href="index.php?ctrl=Admin&act=Add">Добавить новость</a>
</body>
</html>