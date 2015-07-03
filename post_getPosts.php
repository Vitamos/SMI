<h3>Lista de Anuncios</h3>
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
    </tr>
    <?php
    $fields = ["idAnuncio", "titulo", "preco", "assoalhadas", "concelho", "distrito", "freguesia", "latitude", "longitude"];
    $query = "SELECT * FROM anuncios";
    include_once ("db.php");
    $result = query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $query2 = "SELECT * FROM anuncios_categorias where idAnuncio=" . $row['idAnuncio'];
            $cats = query($query2);
            ?> <tr onclick='window.open("post_getPost.php?idAnuncio=<?php echo $row['idAnuncio']; ?>", "", "width=800", "height=600")'>
                <?php
                foreach ($fields as $field) {
                    echo "<td>" . $row[$field] . "</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
</table>
<section id="result"></section> 
