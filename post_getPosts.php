<html>
    <body>
        <table>
            <tr>
                <th>Anuncio ID</th>
                <th>Titulo</th>
                <th>Preço</th>
                <th>Assoalhadas</th>
                <th>Concelho</th>
                <th>Distrito</th>
                <th>Freguesia</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <?php
                if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
                    ?>
                    <th>Eliminar</th><?php } ?>
            </tr>
            <?php
            include_once ("db.php");
            $fields = ["idAnuncio", "titulo", "preco", "assoalhadas", "concelho", "distrito", "freguesia", "latitude", "longitude"];
            $query = "SELECT * FROM anuncios";
            $result = query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($fields as $field) {
                        echo "<td>" . $row[$field] . "</td>";
                    }
                    if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
                        echo "<td><button>x</button></td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </body>
</html>