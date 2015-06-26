
<?php
include_once('db.php');

if (isset($_POST['user'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "Username or Password is invalid";
        echo $error;
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if (!login($user, $pass)){
            $error = "Username or Password is invalid";
            echo $error;
        }

    }
}

if (!isset($_SESSION['user'])) {
    ?>
 <button onclick='showPage("content","user_register.php")'>Registar</button>
    <form method = "post" action = "">
        Username: <input type = "text" name = "user"/><br/>
        Password: <input type = "password" name = "pass"/><br/>
        <input type = "submit"/>
    </form>

    <?php
} else {
    echo 'Hello ' . $_SESSION['user'];
    ?>
    <form method="post" action="logout.php">
        <input type="submit" value="Logout"/>
    </form>
<?php }
?>


