<html>
    <body>
        <section id="content">
            <?php
            session_start();
            include_once("db.php");
            $query = "INSERT INTO anuncios" . " VALUES (NULL,'" . $_POST['titulo'] . "','" . $_POST['descricao'] . "','" . $_POST['preco'] .
                    "','" . $_POST['assoalhadas'] . "','" . $_POST['concelho'] . "','" . $_POST['distrito'] . "','" . $_POST['freguesia'] . "','" . $_POST['latitude'] . "','" . $_POST['longitude'] . "','" . str_replace(' ', '', $_POST['titulo']) . "','" . $_SESSION['id'] . "');";
            //FALTA QUERY PARA ADICIONAR CATEGORIAS
            if (!query($query)) {
                echo "fail";
                echo $query;
            } else {
                echo("Adicionado com sucesso!<br/>");
            }
            ?>
            <input type = "button" value = "Fechar" onClick = "self.close()"> </section>
    </body>
</html>