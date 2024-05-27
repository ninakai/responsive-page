<?php

try {
    $conn = new PDO("mysql:host=myproject;dbname=myproject;charset=utf8mb4", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
    die();
}