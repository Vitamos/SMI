<?php
if (isset($_POST['user'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "ERRO : username ou password invalida";
        echo $error;
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if (!login($user, $pass)) {
            $error = "ERRO : username ou password invalida";
            echo $error;
        }
    }
}

if (!isset($_SESSION['user'])) {
    ?>
    <button  onclick='window.open("user_register.php", "", "width=640", "height=480")' >Registar</button>
    <form method = "post" action = "">
        Username: <input type = "text" name = "user"/><br/>
        Password: <input type = "password" name = "pass"/><br/>
        <input type = "submit"/>
    </form>

    <?php
} else {
    echo 'Bem vindo ' . $_SESSION['user'];
    ?>
    <form method="post" action="logout.php">
        <input type="submit" value="Logout"/>
    </form>
    <button  onclick='window.open("user_selectInteresses.php", "", "width=640", "height=480")' >Seleccionar Interesses</button>
<?php }
?>


