<form method="POST" target='_blank' action='user_addUser.php' onsubmit='showPage("result", "user_getUsers.php");
        self.close();'>
    Username: <input type="text" name="user"><br/>
    Password: <input type="text" name="pass"><br/>
    Email: <input type="text" name="email"><br/>
    Telefone: <input type="text" name="tlf"><br/>
    Telemovel: <input type="text" name="tlm"><br/>
    <?php
    session_start();
    include_once ("db.php");
    if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
        echo "Permissao: <select name=\"perms\">";
        $result = query("SELECT * from niveis_utilizacao");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['idUtil'] . "'>" . $row['tipo'] . "</option>";
        }
        echo "</select>";
    }
    ?>
    <input type='submit'>
</form>

