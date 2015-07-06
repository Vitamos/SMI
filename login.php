<?php
include_once('db.php');
if (isset($_POST['user'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "ERRO : username ou password invalida";
        echo $error;
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "SELECT * FROM users";
        $result = query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['username'] == $user && $row['password'] == $pass) {
                    $_SESSION['user'] = $user;
                    $_SESSION['id'] = $row['idUser'];
                    $_SESSION['perms'] = $row['permissao'];
                    session_write_close();
                }
            }
        } else {
            $error = "ERRO : username ou password invalida";
            echo $error;
        }
    }
}
if (!isset($_SESSION['user'])) {
    ?>
    <button onclick='window.open("user_register.php", "", "width=640, height=480")'>Registar</button>
    <form method = "post" action = "">
        Username: <input type = "text" name = "user"/><br/>
        Password: <input type = "password" name = "pass"/><br/>
        <input type = "submit"/>
    </form>

    <?php
} else {
    echo 'Bem vindo ' . $_SESSION['user'];
    ?>
    </br>
    <button onclick='window.open("user_selectInteresses.php", "", "width=320, height=240")' >Seleccionar Interesses</button>
    <form method="post" action="logout.php">
        <input type="submit" value="Logout"/>
    </form>
    <?php
}
