<?php

class CRUD{
    public $current_row = '';

    public function select_row($current_id)
    {
        require('connect.php');
        $query = 'SELECT * FROM `records` where `id` = :current_id';
        $result = $connect->prepare($query);
        $result->execute([
            ':current_id' => $current_id,
        ]);
        $this->current_row = $result->fetch(PDO::FETCH_ASSOC);

    }
    public static function create_row()
    {
        require_once('connect.php');
        move_uploaded_file($_FILES['img_path']['tmp_name'], 'records_images/'.$_FILES['img_path']['name']);
    
        print_r($_FILES);
    
        $image_path = $_FILES['img_path']['name'];
        $full_name = $_POST['full_name'];
        $sport = $_POST['sport'];
        $desc = $_POST['description'];
        $date = $_POST['date'];
    
        if($sport == 'Football')
        {
            $sport = 1;
        }
        if($sport == 'Basketball')
        {
            $sport == 2;
        }
        if($sport == 'Athletics')
        {
            $sport == 3;
        }
        if($sport == 'Swimming')
        {
            $sport == 4;
        }
        if($sport == 'Formula 1')
        {
            $sport = 5;
        }  
    
        try
        {
            $query = "INSERT INTO records (img_path, full_name, id_competition, `description`, record_date) VALUES (:img_path, :full_name, :id_competitions, :description1, :record_date)";
            $result = $connect->prepare($query);
            $result->execute([ 
                ':img_path' => $image_path,
                ':full_name' => $full_name,
                ':id_competitions' => $sport,
                ':description1' => $desc,
                ':record_date' => $date,
            ]);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        header("Location: DB_Page.php");
    }

    public function update_row($current_id)
    {
        if($_FILES['img_path']['tmp_name'] == '')
        {
            $myfile = $this->current_row['img_path'];
        }
        else
        {
            move_uploaded_file($_FILES['img_path']['tmp_name'], 'records_images/'.$_FILES['img_path']['name']);
            $myfile = $_FILES['img_path']['name'];
        }
        require 'connect.php';
        $query = 'UPDATE `records` SET `img_path` = :img_path, `full_name` = :name1, `id_competition` = :idcomp, `description` = :descr, `record_date` = :date1 WHERE `id` = :current_id';

        echo $_POST['sport'];
        switch ($_POST['sport'])
        {
            case 'Football':
                $_POST['sport'] = 1;
                break;
            case 'Basketball':
                $_POST['sport'] = 2;
                break;
            case 'Athlitics':
                $_POST['sport'] = 3;
                break;
            case 'Swimming':
                $_POST['sport'] = 4;
                break;
            case 'Formula 1':
                $_POST['sport'] = 5;
                break;
            default:
                $_POST['sport'] = 6;

        }
        echo $_POST['sport'];

        $result = $connect->prepare($query);
        $result->execute([
            ':current_id' => $current_id,
            ':img_path' => $myfile,//$_FILES['img_path']['name'],
            ':name1' => $_POST['full_name'],
            ':idcomp' => $_POST['sport'],
            ':descr' => $_POST['description'],
            ':date1' => $_POST['date']

        ]);
    }

    public function delete_row($current_id)
    {
        require('connect.php');
        $query = "DELETE from `records` WHERE `id` = :id";
        $result = $connect->prepare($query);
        $result->execute([ 
            ':id' => $current_id,
        ]);
    }
}

?>