<?php

$config = simplexml_load_file('conf.xml');
$host = $config->host;
$db = $config->db;
$user = $config->user;
$pass = $config->pass;
$connection = new mysqli($host, $user, $pass, $db);

function query($query) {
    global $connection;
    $result = $connection->query($query);
    return $result;
}

function getID() {
    global $connection;
    return mysqli_insert_id($connection);
}

function Delete($dirPath) {
    $dirPath = $dirPath;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
        $path->isDir() && !$path->isLink() ? rmdir($path->getPathname()) : unlink($path->getPathname());
    }
    rmdir($dirPath);
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
                return true;
            }
        }
    }
    return false;
}
