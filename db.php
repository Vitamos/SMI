<?php

function query($query) {
    $config = simplexml_load_file('conf.xml');
    $host = $config->host;
    $port = $config->port;
    $db = $config->db;
    $user = $config->user;
    $pass = $config->pass;
    $connection = new mysqli($host, $user, $pass, $db);
    $result = $connection->query($query);
    $connection->close();
    return $result;
}

function login($username, $password) {
    $query = "SELECT * FROM users";
    $result = query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['username'] == $username && $row['password'] == $password) {
                $_SESSION['user'] = $username;
                $_SESSION['id'] = $row['idUser'];
                $_SESSION['perms'] = $row['permissao'];
                session_write_close();
                return true;
            }
        }
    }
    return false;
}
