<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $host = 'localhost';
    $user = 'root';
    $password = 'nfnmzyf40404';
    $dbName = 'test1';

    session_start();

    $link = mysqli_connect($host,$user,$password,$dbName);
    mysqli_query($link,"SET NAMES 'utf-8'");