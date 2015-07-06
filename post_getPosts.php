<h3>Lista de Anuncios</h3>
<table>
    <tr>
        <th>Anuncio ID</th>
        <th>Titulo</th>
        <th>Preço</th>
        <th>Assoalhadas</th>
        <th>Distrito</th>
        <th>Concelho</th>
        <th>Freguesia</th>
    </tr>
    <?php
    $fields = ["idAnuncio", "titulo", "preco", "assoalhadas"];
    $query = "SELECT * FROM anuncios";
    include_once ("db.php");
    $result = query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $distrito = query("SELECT nome FROM distritos WHERE idD=" . $row['distrito'])->fetch_assoc()['nome'];
            $concelho = query("SELECT nome FROM concelhos WHERE idC=" . $row['concelho'])->fetch_assoc()['nome'];
            $freguesia = query("SELECT nome FROM freguesias WHERE idF=" . $row['freguesia'])->fetch_assoc()['nome'];
            $query2 = "SELECT * FROM anuncios_categorias where idAnuncio=" . $row['idAnuncio'];
            $cats = query($query2);
            ?> <tr onclick='window.open("post_getPost.php?idAnuncio=<?php echo $row['idAnuncio']; ?>", "", "width=800", "height=600")'>
                <?php
                foreach ($fields as $field) {
                    echo "<td>" . $row[$field] . "</td>";
                }
                echo "<td>" . $distrito . "</td>";
                echo "<td>" . $concelho . "</td>";
                echo "<td>" . $freguesia . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
</table>
<section id="result"></section> 
