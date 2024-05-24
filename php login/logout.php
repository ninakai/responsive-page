<?php session_start(); 
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
$_SESSION['message'] = 'Вы успешно вышли из сиситемы';
header("Location: index.php")

?>
