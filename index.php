<?php
    include 'elems/init.php';
    
    $uri = trim($_SERVER['REQUEST_URI'],'/');

    if(empty($uri)){
        $uri = '/';
    }

    $query = "SELECT * FROM pages WHERE url = '$uri'";
    $result = mysqli_query($link,$query) or die(mysql_error($link));
    $page = mysqli_fetch_assoc($result);

    if(!$page){
        $query = "SELECT * FROM pages WHERE url = '404'";
        $result = mysqli_query($link,$query) or die(mysql_error($link));
        $page = mysqli_fetch_assoc($result);

        header('HTTP/1.0 404 not found');
    }
    $title = $page['title'];
    $content = $page['text'];
    include '/elems/layout.php';

