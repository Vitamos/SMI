<?php

header('Content-Type: text/html; charset=utf-8');

$config = simplexml_load_file('conf.xml');
$host = $config->host;
$port = $config->port;
$db = $config->db;
$user = $config->user;
$pass = $config->pass;



function query($query) {
    global $host;
    global $user;
    global $pass;
    global $db;
    $connection = new mysqli($host, $user, $pass, $db);
    $result = $connection->query($query);
    $connection->close();
    return $result;
}

function login($user, $pass) {
    //TO-DO
    return true;
}

function getId($user) {
    //TO-DO
    return 10;
}

function getPerms($user) {
    //TO-DO
    return 0;
}
