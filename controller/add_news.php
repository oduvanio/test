<?php
require_once __DIR__ . '/../model/add.php';

echo $_POST['title'];
echo $_FILES['image']['tmp_name'];
echo $_POST['description'];
die;