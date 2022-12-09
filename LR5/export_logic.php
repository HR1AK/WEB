<?php
$data = [
    'id'=>[],
    'img_path'=>[],
    'full_name'=>[],
    'id_competition'=>[],
    'description'=>[],
    'record_date'=>[]
];


    if (count($_POST) > 0)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=records','root',''); //подключаем бд
        $slq = "SELECT records.id, records.img_path, records.full_name, records.id_competition, records.description, records.record_date FROM records"; //выбираем поля
        $result = $pdo -> query($slq);
        $my_csv_file = fopen('text2.csv', 'w');
        $count=0;
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            fputcsv($my_csv_file, $row);
        }

        $pdo = null;

        if($curl=curl_init()) //инициализация нового сеанса с URL
        {
            //устанавливает параметры сеанса
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/lb5/worker.php'); //загружаемый URL
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //Данные в результате запроса сохраняются в переменную
            curl_setopt($curl, CURLOPT_POST, true); //для выполнения обычного HTTP POST
            $file= new CURLFile('text2.csv','application/csv','text2.csv');
            $data1=array('file'=> $file);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);
            $res = curl_exec($curl); //Выполнить данный сеанс cURL
            curl_close($curl); //закрываем
        }
    }
?>