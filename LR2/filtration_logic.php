<?php
    $connect = new PDO("mysql:host=localhost; dbname=records;charset=utf8", username:"root", password:"");//mysqli_connect('localhost', 'root', '', 'records');

	if(!$connect)
	{
		die('ERROR');
	}

    $sql_request = "SELECT records.id, records.img_path, records.full_name, competitions.competition_name, records.description, records.record_date FROM `records` JOIN `competitions` ON records.id_competition = competitions.id";
    
    $one = false;

    $IdFilter = [];
    
    if(!key_exists('clear', $_GET)) //смотри определено или нет
    { 
       if($_GET['id_sort'] != '' OR $_GET['name_sort'] != '' OR $_GET['sport_sort2'] !='')
       {
            $sql_request .= " WHERE";

            if($_GET['id_sort'])
            {
                if($one)
                {
                    $sql_request .= " AND";
                }
                $sql_request .= " records.id = :IdF";
                $IdFilter['IdF'] = htmlspecialchars($_GET['id_sort']);
                $one = true;
            }

            if($_GET['name_sort'])
            {
                if($one)
                {
                    $sql_request .= " AND";
                }
                $sql_request .= " records.full_name = :NameF";
                $IdFilter['NameF'] = htmlspecialchars($_GET['name_sort']);
                $one = true;
            }

            if($_GET['sport_sort2'])
            {
                if($one)
                {
                    $sql_request .= " AND";
                }
                $sql_request .= " competitions.competition_name = :SportF";
                $IdFilter['SportF'] = htmlspecialchars($_GET['sport_sort2']);
                $one = true;
            }
       }
    }

    $sql_request .= " ORDER BY records.id"; 
    //echo $sql_request;
    $data = $connect->prepare($sql_request);
    $data->execute($IdFilter);
?>