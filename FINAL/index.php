<?php
session_start();

require "dbconnect.php";


switch ($_GET['page']){
    case 'login_form':
        include "login_form.php";
        break;
    case 'upload_form':
        include "upload_form.php";
        break;
    default:
        require 'header.php';
        require "main.php";
        break;
}
