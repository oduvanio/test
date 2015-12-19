<?php
abstract class Article {
	public $title;
	public $text;
	public function __construct($title, $description)
	{
		$this->title = $title;
		$this->text = $description;
	}
}