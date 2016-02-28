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
		<h2><?php echo $item->title;?></h2>
		<p><?php echo $item->description; ?></p>
		<a href="index.php?act=One">Страница новости</a>
		<a href="index.php?ctrl=Admin&act=Update&id=<?php echo $item->id;?>">Обновить новость</a>
		<a href="index.php?ctrl=Admin&act=Delete&id=<?php echo $item->id;?>">Удалить новость</a>
		<hr>
	<?php endforeach; ?>
	<a href="index.php?ctrl=Admin&act=Add">Добавить новость</a>
</body>
</html>