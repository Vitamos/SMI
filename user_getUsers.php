<html>
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Telemovel</th>
                <th>Permissao</th>
                <?php
                if (isset($_SESSION['perms']) and $_SESSION['perms'] == 1) {
                    ?>
                    <th>Eliminar</th><?php } ?>
            </tr>
            <?php
            include_once ("db.php");
            $fields = ["idUser", "username", "email", "telefone", "telemovel", "permissao"];
            $query = "SELECT * FROM users";
            $result = query($query);
            if ($result->num_rows > 0) {
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
                echo "<tr>0 results</tr>";
            }
            ?>
        </table>
    </body>
</html>

