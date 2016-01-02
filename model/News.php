<?php
class News extends AbstractModel
{
	public $id;
	public $title;
	public $text;
	public $picture;
	protected static $table = 'news';
	protected static $class = 'News';
}