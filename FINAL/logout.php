<?php session_start(); 
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
$_SESSION['message'] = 'Вы успешно вышли из системы';
header("Location: index.php")

?>
