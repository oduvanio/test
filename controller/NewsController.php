<?php
class NewsController
{
	public function actionAll()
	{
		$news = News::findAll();
		$view = new View();
		$view->items = $news;
		$view->display('news/newsAll.php');
	}
	public function actionOne()
	{
		$news = News::findOne($id);
		$view = new View();
		$view->items = $news;
		$view->display('news/newsOne.php');
	}
}