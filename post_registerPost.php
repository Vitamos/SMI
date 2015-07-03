<html>
    <head> 
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <?php
    include_once 'db.php';
    session_start();
    if (isset($_POST['submit'])) {
        $query = "INSERT INTO anuncios" . " VALUES (NULL,'" . $_POST['titulo'] . "','" . $_POST['descricao'] . "','" . $_POST['preco'] .
                "','" . $_POST['assoalhadas'] . "','" . $_POST['concelho'] . "','" . $_POST['distrito'] . "','" . $_POST['freguesia'] . "','" . $_POST['latitude'] . "','" . $_POST['longitude'] . "','" . $_SESSION['id'] . "');";
        query($query);
        $id = getID();
        foreach ($_POST['cats'] as $cat) {
            $query = "INSERT INTO anuncios_categorias VALUES ('" . $id . "','" . $cat . "');";
            query($query);
        }
        $zip = new ZipArchive;
        $res = $zip->open($_FILES['media']['tmp_name']);
        if ($res === TRUE) {
            $zip->extractTo(__DIR__ .'\posts\\' . $id);
            $zip->close();
        }
        ?> <script>
            alert("Adicionado com sucesso!");
            opener.showPage("result", "post_getPosts.php");
            self.close();
        </script>
    <?php }
    ?>
    <body>
        <h1>Adicionar Anuncio</h1>
        <form action='' method="POST" enctype="multipart/form-data">
            Titulo: <input type="text" name="titulo"><br/>
            Descricao: <input type="text" name="descricao"><br/>
            Preço: <input type="text" name="preco"><br/>
            Assoalhadas: <input type="text" name="assoalhadas"><br/>
            Concelho: <input type="text" name="concelho"><br/>
            Distrito: <input type="text" name="distrito"><br/>
            Freguesia: <input type="text" name="freguesia"><br/>
            Latitude: <input type="text" name="latitude"><br/>
            Longitude: <input type="text" name="longitude"><br/>
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