<?php
function image_upload($field)
{
	if (empty($_FILES)) {
		return false;
	}
	if (0 != $_FILES[$field]['error']) {
		return false;
	}
	if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
		$res = move_uploaded_file($_FILES[$field]['tmp_name'], __DIR__ . '/../images/' . $_FILES[$field]['name']); //в какую папку положить необходимо указывать относительно существующего пути
	}
	if (!$res) {
		return false;
	} else {
		return $_FILES[$field]['name'];
	}
	return false;
}