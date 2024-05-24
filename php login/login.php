<?php
session_start();

unset($_SESSION['error']);

$validUsername = 'admin';
$validPassword = 'password';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['username'] = $username;
        $_SESSION['message'] = 'Вы успешно вошли в систему';
        header('Location: /index.php');
        die();
    } else {
        $_SESSION['error'] = 'Неверный логин или пароль. Попробуйте еще раз.';
        header('Location: /login_form.php');
        die();
    }
} else {
    header('Location: /index.php');
    die();
}
?>
