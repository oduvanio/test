<?php
class AdminController
{
	public function actionAll()
	{
		$items = News::getAll();
		include __DIR__ . '/../view/news/newsAll.php';
	}
	public function actionOne()
	{
		$id = $_GET['id'];
		$items = News::getOne($id);
		include __DIR__ . '/../view/news/newsOne.php';
	}
	public function actionAdd()
	{
		include __DIR__ . '/../view/form_add_news.php';
	}
	public function addOne()
	{
		$title = $_POST['title'];
		$description = $_POST['description'];
		$picture = $_POST['image'];
		News::addOne($title, $description, $picture);
		$this->actionAll();
	}
}