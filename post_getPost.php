<html>
    <head>               
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        include_once ("db.php");
        if (isset($_POST['submit'])) {
            $delCats = "DELETE FROM anuncios_categorias WHERE anuncioID=" . $_POST['id'];
            query($delCats);
            $delquery = "DELETE FROM anuncios WHERE idAnuncio =" . $_POST['id'];
            query($delquery);
            $dir = 'posts\\' . $_POST['id'];
            //echo $dir;
            Delete($dir);
            ?> 
            <script>
               alert("Removido com sucesso!");
                opener.showPage("result", "post_getPosts.php");
                self.close();
            </script> <?php
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
            if (isset($_SESSION['perms']) and $_SESSION['perms'] <= 2) {
                ?> <li><form action="" method='POST'>
                    <input type='hidden' name='id' value='<?php echo $row['idAnuncio'] ?>'>
                    <input type='submit' name ='submit' value='Eliminar' />
                </form> <?php
            }
            echo "</ul>";
        }
        ?>
        <section id="map"></section>
        <script>            window.onload = initialize(<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>);</script>
    </body>
</html>


