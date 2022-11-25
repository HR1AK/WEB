<?php 
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $email_check = "SELECT * FROM `users` WHERE users.login = ?";
    $user_check = $connect->prepare($email_check);

    $user_check->execute([$email]);
    $count = $user_check->rowCount();

    if($count == 0 )
    {
        //continue
    }
    else
    {
        $_SESSION['message'] = 'Такой email уже занят';
        header('Location: ../Reg.php');
        die();
    }

    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['message'] = 'Введите валидный email';
        header('Location: ../Reg.php');
        die();
    }

    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if($password == '')
    {
        $_SESSION['message'] = 'Не введен пароль!';
        header('Location: ../Reg.php');
        die();
    }

    if(mb_strlen($password) < 6)
    {
        $_SESSION['message'] = 'Пароль должен содержать больше 5 символов!';
        header('Location: ../Reg.php');
        die();
    }

    if(preg_match('/[а-яА-я]+/', $password))
    {
        $_SESSION['message'] = 'В пароле не должно быть букв кириллицы!';
        header('Location: ../Reg.php');
        die();
    }

    if(!preg_match('/[A-Z]+/', $password))
    {
        $_SESSION['message'] = 'В пароле нет букв верхнего регистра!';
        header('Location: ../Reg.php');
        die();
    }

    if(!preg_match('/[a-z]+/', $password))
    {
        $_SESSION['message'] = 'В пароле нет букв нижнего регистра!';
        header('Location: ../Reg.php');
        die();
    }

    if(!preg_match('/[0-9]+/', $password))
    {
        $_SESSION['message'] = 'В пароле нет цифр!';
        header('Location: ../Reg.php');
        die();
    }

    if(!preg_match("/\s/", $password))
    {
        $_SESSION['message'] = 'Нет пробелов';
        header('Location: ../Reg.php');
        die();
    }

    if(!preg_match("/[!\\\@\"#\/[$\\-;%`~^:&?*()=+.,_<>{}|\\]]+/", $password))
    {
        $_SESSION['message'] = 'В пароле нет спецсимволов!';
        header('Location: ../Reg.php');
        die();
    }


    if($password_confirm == '')
    {
        $_SESSION['message'] = 'Нет повтора пароля!';
        header('Location: ../Reg.php');
        die();
    }
    
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $third_name = $_POST['third_name'];
    $date = $_POST['date'];
    $adress = $_POST['adress'];
    $gender = $_POST['gender'];
    $interests = $_POST['interests'];
    $vklink = $_POST['vklink'];
    $bloodgroup = $_POST['BloodGroup'];
    $rfactor = $_POST['rfactor'];


    if($password == $password_confirm)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $array = array($email, $password, $first_name, $second_name, $third_name, $date, $gender, $interests, $vklink, $bloodgroup, $rfactor, $adress);
       
        $sql_insert = "INSERT INTO `users` (`login`, `password`, `first_name`, `second_name`, `thirdName`, `date`, `gender`, `interests`, `vk_link`, `blood_group`, `rfactor`, `adrerss`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $data = $connect->prepare($sql_insert);
        $data->execute($array);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../Authorization.php');
    }
    else
    {
       $_SESSION['message'] = 'Пароли не совпадают';
       header('Location: ../Reg.php');
    }
?>