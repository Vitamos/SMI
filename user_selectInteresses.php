<meta charset="UTF-8">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<script src="https://maps.googleapis.com/maps/api/js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="scripts.js"></script>
<form action="user_setInteresses.php" method="POST">
    <?php
    session_start();
    include_once 'db.php';
    $notselected = query("SELECT DISTINCT * FROM categorias WHERE idCat NOT IN (SELECT catID FROM users_interesses WHERE userID=" . $_SESSION['id'] .")");
    $selected = query("SELECT DISTINCT * FROM categorias WHERE idCat IN (SELECT catID FROM users_interesses WHERE userID=" . $_SESSION['id'] . ")");
    echo "<h1>Interesses</h1>";
    while ($row = $selected->fetch_assoc()) {
        echo "<input type=\"checkbox\" name=\"cats[]\" checked=\"true\" value='" . $row['idCat'] . "'/>" . $row['nome'];
        echo "</br>";
    }
    while ($row = $notselected->fetch_assoc()) {
        echo "<input type=\"checkbox\" name=\"cats[]\" value='" . $row['idCat'] . "'/>" . $row['nome'];
        echo "</br>";
    }
    ?>
    <input type="submit" name="submit" value="Guardar">
</form>


