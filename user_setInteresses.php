<html> 

    <body>
        <?php
        include_once 'db.php';
        session_start();

        query("DELETE FROM users_interesses WHERE userID=" . $_SESSION['id']);
        foreach ($_POST['cats'] as $cat) {
            $query = "INSERT INTO users_interesses VALUES ('" . $_SESSION['id'] . "','" . $cat . "');";
            query($query);
        }
        ?>

        <script>
            alert("Interesses actualizados");
            self.close();
        </script>
    </body>
</html>

