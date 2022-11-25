<?php 
    session_start();
    require_once 'connect.php';

    $login = htmlspecialchars($_POST['login']);
    $password = ($_POST['password']);
    //$password = md5($password);//password_hash($password, PASSWORD_DEFAULT);
    

    $sql_request = "SELECT * FROM `users` WHERE users.login = ?";
    $user_check = $connect->prepare($sql_request);

    $user_check->execute([$login]);
    //$count = $user_check->rowCount();
    $result = $user_check->fetch(PDO::FETCH_ASSOC);
    

    if(password_verify($password, $result['password']))//($count > 0)
    {
        $_SESSION['user'] = [
            "email" => $login
        ];
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../Authorization.php');
    }

?>