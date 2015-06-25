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
                <th>Eliminar</th>
            </tr>
            <?php
            include_once ("db.php");
            $fields = ["idUser", "username", "email", "telefone", "telemovel", "permissao"];
            $query = "SELECT * FROM users";
            $result = query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($fields as $field) {
                        echo "<td>" . $row[$field] . "</td>";
                    }
                    echo "<td><button>x</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>

        </table>
    </body>
</html>

