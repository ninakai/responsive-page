<?php
    session_start(["use_strict_mode" => true]);
    require('dbconnect.php');
    unset($_SESSION['message']);
    if (isset($_POST['username'])){
        $result = $conn->query("SELECT * FROM users WHERE email = '".$_POST['username']."'");

        if ($row = $result->fetch())
        {
            if (MD5($_POST["password"]) == $row['password']){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['message'] = 'Вы успешно вошли в систему';
                header("Location: index.php");
                die();
            }
            else {
                $_SESSION['message'] = 'Вы ввели неправильный пароль!';
                header("Location: login-form.php");
                die();
            }

        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный логин!';
            header("Location: login-form.php");
            die();
        }

    }
    if ($_GET['username'] == $result){
        session_unset();
        $_SESSION['message'] = 'Вы успешно вышли из системы';
        header("Location: index.php");
        die();
    }