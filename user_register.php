<html>
    <head> 
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
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
                opener.location.reload();
                alert("Registado com sucesso!");
                self.close();
        </script>
    <?php }
    ?>
    <body>
        <form method="POST" action="" onsubmit="return validUser(this)">
            Username (3 a 12 caracteres) : <input type="text" name="user" required><br/>
            Password (min 6 caracteres): <input type="text" name="pass" required><br/>
            Email: <input type="text" name="email" required><br/>
            Telefone: <input type="text" name="tlf" required><br/>
            Telemovel: <input type="text" name="tlm" required><br/>
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