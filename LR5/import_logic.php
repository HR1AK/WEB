<?php

    //удаление таблицы
    function drop_db($connect)
    {
        $sql = "DROP TABLE IF EXISTS NEW_TABLE";
        $connect->query($sql);
    }

    //Создание таблицы
    function create_db($connect)
    {
    $sql = "CREATE TABLE `NEW_TABLE` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `img_path` VARCHAR(127),
        `full_name` VARCHAR(127),
        `id_competitions` INT NOT NULL,
        `description1` VARCHAR(127),
        `record_date` VARCHAR(16),
        PRIMARY KEY (`id`)
    ) DEFAULT CHARSET=utf8;";
    $connect->query($sql);
    }

function insert_db($connect, $id, $img_path, $full_name, $id_competitions, $description1, $record_date)
{
    try
    {
        $id = intval($id); //возвращает целое число от переменной
        $id_competitions = intval($id_competitions);

        $query = "INSERT INTO NEW_TABLE (id, img_path, full_name, id_competitions, description1, record_date) VALUES (:id, :img_path, :full_name, :id_competitions, :description1, :record_date)";
        $result = $connect->prepare($query);
        $result->execute([
            ':id' => $id, 
            ':img_path' => $img_path,
            ':full_name' => $full_name,
            ':id_competitions' => $id_competitions,
            ':description1' => $description1,
            ':record_date' => $record_date,
        ]);
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}

//$_FILES - ассоциативный массив, который хранит название файлов, загруженных в текущий скрипт
if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
{
    $name = $_FILES["filename"]["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
    $fp = fopen($name, 'r'); //открываем файл для чтения
    $data = str_getcsv(fgets($fp));
    require_once('connect.php');
    drop_db($connect);
    create_db($connect);
    //var_dump($data);
    insert_db($connect, $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
    echo 'ФАЙЛ ОТПРАВЛЕН';
    fclose($fp);
}

?>