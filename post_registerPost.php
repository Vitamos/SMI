<html>
    <head> 
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body>

        <?php
        include_once 'db.php';
        session_start();
        if (isset($_POST['submit'])) {
            $query = "INSERT INTO anuncios" . " VALUES (NULL,'" . $_POST['titulo'] . "','" . $_POST['descricao'] . "','" . $_POST['preco'] .
                    "','" . $_POST['assoalhadas'] . "','" . $_POST['concelho'] . "','" . $_POST['distrito'] . "','" . $_POST['freguesia'] . "','" . $_POST['latitude'] . "','" . $_POST['longitude'] . "','" . $_SESSION['id'] . "','" . $_SESSION['id'] . "');";
            query($query);
            echo($query);
            echo "</br>";
            $id = getID();
            foreach ($_POST['cats'] as $cat) {
                $query = "INSERT INTO anuncios_categorias VALUES ('" . $id . "','" . $cat . "');";
                echo($query);
                echo "</br>";
                query($query);
            }
            if ($_FILES['media']['tmp_name'] != "") {
                $zip = new ZipArchive;
                $res = $zip->open($_FILES['media']['tmp_name']);
                if ($res === TRUE) {
                    $zip->extractTo(__DIR__ . '\posts\\' . $id);
                    $zip->close();
                }
            }
            ?> <script>
                    alert("Adicionado com sucesso!");
                    opener.showPage("result", "post_getPosts.php");
                    self.close();
            </script>
        <?php }
        ?>
        <h1>Adicionar Anuncio</h1>
        <form action='' method="POST" enctype="multipart/form-data" onsubmit="return validPost(this)">
            Titulo: <input type="text" name="titulo" required><br/>
            Descricao: <input type="text" name="descricao" required><br/>
            Preço: <input type="text" name="preco" required><br/>
            Assoalhadas: <input type="text" name="assoalhadas" required><br/>
            Distrito: <select name="distrito" id="distrito" onchange='changeDistrito();' required>
                <option selected="selected" disabled="disabled">Seleccionar</option>
                <?php
                $distritos = query("SELECT * from distritos");
                while ($row = $distritos->fetch_assoc()) {
                    echo "<option value=\"" . $row['idD'] . "\">" . $row['nome'] . "</option>";
                }
                ?>
            </select></br>
            Concelho: <select name="concelho" id="concelho" onchange='changeConcelho();' required></select></br>
            Freguesia: <select name="freguesia" id="freguesia" required></select></br>
            Latitude: <input type="text" name="latitude" required><br/>
            Longitude: <input type="text" name="longitude" required><br/>
            Media (zip) : <input type="file" name="media"><br/>
            <?php
            $result = query("SELECT * from categorias");
            echo "Categorias: ";
            while ($row = $result->fetch_assoc()) {
                echo "<input type=\"checkbox\" name=\"cats[]\" value='" . $row['idCat'] . "'/>" . $row['nome'];
            }
            ?>
            <input type='submit' value="submit"  name='submit'>
        </form>  
    </body>
</html>