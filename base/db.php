<?php

header('Content-Type: text/html; charset=utf-8');

$config = simplexml_load_file('base/conf.xml');
$host = $config->host;
$port = $config->port;
$db = $config->db;
$user = $config->user;
$pass = $config->pass;

//$connection = new mysqli($host, $user, $pass);

//mysqli_set_charset($connection,'utf8');

//mysqli_select_db($connection, $db);

function query($query) {
    return mysqli_query($connection, $query);
}

function login($user,$pass){
    //TO-DO
    return true;
}

function getId($user){
    //TO-DO
    return 10;
}

function getPerms($user){
    //TO-DO
    return 10;
}



