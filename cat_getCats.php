<h3>Lista de Categorias</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tipo</th>
        <?php
        if (!isset($_SESSION)) {
            
        }
        if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
            ?>
            <th>Eliminar</th><?php } ?>
    </tr>
    <?php
    include_once ("db.php");
    if (!isset($_SESSION['perms'])) {
        session_start();
    }
    $fields = ["idCat", "nome", "primario"];
    $query = "SELECT * FROM categorias";
    $result = query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<td>" . $row[$field] . "</td>";
            }
            if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
                ?>
                <td>
                    <form action="cat_cats.php" method='POST'>
                        <input type='hidden' name='id' value='<?php echo $row['idCat'] ?>'>
                        <input type='submit' name ='delete' value='Eliminar' />
                    </form> 
                </td>
                <?php
            }
            echo "</tr>";
        }
    } else {
        echo "<tr>0 results</tr>";
    }
    ?>
</table>
