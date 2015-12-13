<form action="controller/add_news.php" method="post" enctype="multipart/form-data">
	<label for="title">Заголовок</label>
	<input type="text" id="title" name="title">
	<hr>
	<label for="image">Файл картинки</label>
	<input type="file" id="image" name="image">
	<hr>
	<label for="description">Описание новости</label>
	<input type="text" id="description" name="description">
	<hr>
	<input type="submit">
</form>