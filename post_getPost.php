<html>
    <body>
        <?php
        include_once ("db.php");
        if (!isset($_SESSION['perms'])) {
            session_start();
        }
        $fields = ["idAnuncio", "titulo", "preco", "assoalhadas", "concelho", "distrito", "freguesia", "latitude", "longitude"];
        $query = "SELECT * FROM anuncios WHERE idAnuncio='" . $_GET['idAnuncio'] . "';";
        $result = query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            echo "<h3>" . $row['titulo'] . "</h3>";
            echo "<ul>";
            foreach ($fields as $field) {
                echo "<li>" . $row[$field] . "</li>";
            }
            if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
                echo "<li><button>Eliminar Anuncio</button></li>";
            }
            echo "</ul>";
        }
        ?>
        <button onclick='showPage("result", "post_getPosts.php")'>Back</button>
    </body>
</html>


