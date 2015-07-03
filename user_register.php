<html>
    <head> 
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <h1>Registo de Utilizador</h1>
    <?php
    session_start();
    include_once 'db.php';
    if (isset($_POST['submit'])) {
        $query = "INSERT INTO users" . " VALUES (NULL,'" . $_POST['user'] . "','" . $_POST['pass'] . "','" . $_POST['email'] . "','" . $_POST['tlf'] . "','" . $_POST['tlm'] . "','" . $_POST['perms'] . "');";
        query($query);
        ?> <script>
            opener.showPage("result", "user_getUsers.php");
         alert("Adicionado com sucesso!");
            self.close();
        </script>
    <?php }
    ?>
    <body>
        <form method="POST" action="">
            Username: <input type="text" name="user"><br/>
            Password: <input type="text" name="pass"><br/>
            Email: <input type="text" name="email"><br/>
            Telefone: <input type="text" name="tlf"><br/>
            Telemovel: <input type="text" name="tlm"><br/>
            <?php
            if (isset($_SESSION['perms']) && $_SESSION['perms'] == 1) {
                echo "Permissao: <select name=\"perms\">";
                $result = query("SELECT * from niveis_utilizacao");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['idUtil'] . "'>" . $row['tipo'] . "</option>";
                }
                echo "</select>";
            } else {
                echo "<input type=\"hidden\" name=\"perms\" value=\"3\">";
            }
            ?>
            <input type='submit' name='submit'>
        </form>
    </body>
</html>