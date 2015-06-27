<html>
    <body>
        <section id="content">
            <?php
            include_once("db.php");
            $query = "INSERT INTO users" . " VALUES (NULL,'" . $_POST['user'] . "','" . $_POST['pass'] . "','" . $_POST['email'] . "','" . $_POST['tlf'] . "','" . $_POST['tlm'] . "','" . $_POST['perms'] . "');";
            if (!query($query)) {
                echo "fail";
            } else {
                echo("Adicionado com sucesso!<br/>");
            }
            ?>
            <input type = "button" value = "Fechar" onClick = "self.close()"> </section>
    </body>
</html>

