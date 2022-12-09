<?php
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/lb5/upload/';
$types = [
	'application/vnd.ms-excel',
	'application/csv',
	'text/xml',
	'application/xml'
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES)
{
	if (!file_exists($uploadDir))
	{
		mkdir($uploadDir);
	}
	$file = array_shift($_FILES);
	if (in_array($file['type'], $types))
	{
		if (move_uploaded_file($file['tmp_name'], $uploadDir . $file['name'])) //проверяет что файл является дейстивтельным для загрузки, параметры: ОТКУДА и КУДА
		{
			echo "<a href='/lb5/upload/{$file['name']}' download='{$file['name']}'>Сcылка на скачивание файла</a>";
		}
		else
		{
			echo 'Файл не был загружен';
		}
	}
	else
	{
		echo 'Неверный тип обрабатываемого файла';
	}
}
