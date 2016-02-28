<?php
class AdminController
{
	public function actionAll()
	{
		$items = News::findAll();
		include __DIR__ . '/../view/news/newsAll.php';
	}
	public function actionOne()
	{
		$id = $_GET['id'];
		$items = News::findOne($id);
		include __DIR__ . '/../view/news/newsOne.php';
	}
	public function actionAdd()
	{
		if (!isset($_POST['title']) || !isset($_POST['description']) || $_POST['title'] === '' || $_POST['description'] === '') {
			include __DIR__ . '/../view/form_add_news.php';
		} else {
			$title = $_POST['title'];
			$description = $_POST['description'];
			$picture = !empty($_FILES) ? News::imageUpload('image') : '';
			$news = new News();
			$news->title = $title;
			$news->description = $description;
			$news->picture = $picture;
			$news->save();
			$this->actionAll();
		}
	}
	public function actionUpdate()
	{
		if (isset($_POST['title']) || isset($_POST['description']) || !empty($_FILES)) {
			if (isset($_POST['title']) && $_POST['title'] !== '') {
				$this->title = $_POST['title'];
			}
			if (isset($_POST['description']) && $_POST['description'] !== '') {
				$this->description = $_POST['description'];
			}
			if ($_FILES['image']['name'] !== '') {
				$picture = News::imageUpload('image');
				$this->picture = $picture;
			}
			$this->id = $_GET['id'];
			$news = new News();
			$news->save();
		} else {
			include __DIR__ . '/../view/form_update_news.php';
			exit;
		}
		$this->actionAll();
	}
	public function actionDelete()
	{
		$news = new News();
		$news->delete();
		$this->actionAll();
	}
}