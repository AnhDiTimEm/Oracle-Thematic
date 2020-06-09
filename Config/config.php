<?php
    $user = 'root';
    $pass = '123456';
    $link = oci_connect($user, $pass, 'http://localhost/Oracle-Thematic/');
    if (!$link)
    {
        $error = oci_error();
        echo $error['message'];
        exit();
    }
?>