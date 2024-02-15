<?php
include_once 'db.php';
    $ip_address  = $_SERVER['REMOTE_ADDR'];
    $page_url =  $_SERVER['REQUEST_URI'];
    $user_agent =  $_SERVER['HTTP_USER_AGENT'];
    $view_date = gmdate("Y-m-d H:i:s");

    $sql = "SELECT * FROM users WHERE ip_address = '$ip_address' AND page_url = '$page_url' AND user_agent = '$user_agent'";
    $result = $conn->query($sql);
    $row = $result->fetch();

    if( $row) {
        $id = $row['id'];
        $views_count = ++$row['views_count'];
        $sql = "UPDATE Users SET views_count = '$views_count', view_date = '$view_date' WHERE id = '$id'";
        $conn->exec($sql);
    } else {
        $views_count = 1;
        $sql = "INSERT INTO users (ip_address, page_url, user_agent, view_date, views_count) VALUES ('$ip_address', '$page_url', '$user_agent','$view_date','$views_count')";
        $conn->exec($sql);
    }

    $_SESSION['data'] = compact('ip_address', 'page_url', 'user_agent', 'view_date', 'views_count');
