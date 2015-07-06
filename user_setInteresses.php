<html> 
    <body>
        <?php
        session_start();
        include_once 'db.php';
        query("DELETE FROM users_interesses WHERE userID=" . $_SESSION['id']);
        if (isset($_POST['cats'])) {
            foreach ($_POST['cats'] as $cat) {
                $query = "INSERT INTO users_interesses VALUES ('" . $_SESSION['id'] . "','" . $cat . "');";
                query($query);
            }
        }
        ?>
        <script>
            alert("Interesses actualizados");
            self.close();
        </script>
    </body>
</html>

