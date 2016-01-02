<?php
class View
	implements Iterator
{
	protected $data = [];
	public function current()
	{

	}
	public function next()
	{

	}
	public function key()
	{

	}
	public function valid()
	{

	}
	public function rewind()
	{

	}
	public function render($template)
	{

		foreach ($this->data as $key=>$val) {
			$$key = $val;
		}
		ob_start();
		include __DIR__ . '/../view/' . $template;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	public function display($template)
	{
		echo $this->render($template);
	}
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}
	public function __get($key)
	{
		return $this->data[$key];
	}
}