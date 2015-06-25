
<?php
include_once('db.php');

if (isset($_POST['user'])) {
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $error = "Username or Password is invalid";
    } else {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if (login($user, $pass)) {
            $_SESSION['user'] = $user;
            $_SESSION['id'] = getId($user);
            $_SESSION['perms'] = getPerms($user);
            session_write_close();
        }
    }
}

if (!isset($_SESSION['user'])) {
    ?>
    <form method = "post" action = "">
        Username: <input type = "text" name = "user"/><br/>
        Password: <input type = "password" name = "pass"/><br/>
        <input type = "submit"/>
    </form>
    <form method="POST" target="_blank" action="user/register.php">
        <input type="submit" value="Registar">
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


