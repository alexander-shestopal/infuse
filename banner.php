<?php
include_once 'Data/getData.php';
//
    match($_SESSION['data']['page_url']) {
        '/index1.php' => include_once 'Banners/banner_index1.php',
        '/index2.php' => include_once 'Banners/banner_index2.php',
    };
    $_SESSION['data'] = [];
