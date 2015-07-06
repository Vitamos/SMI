<meta charset="UTF-8">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<script src="https://maps.googleapis.com/maps/api/js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="scripts.js"></script>
<title>imoISEL - SMI 2015</title>
<?php
session_start();
include_once 'db.php';
if (isset($_POST['submit'])) {
    query("INSERT INTO categorias VALUES(NULL, '" . $_POST['nome'] . "','" . $_POST['primario'] . "');");
}
?>
<form action="" method="POST">
    Nome <input type="text" name="nome"></br>
    <?php
    if ($_SESSION['perms'] == 1) {
        ?>
        Primario<input type="radio" name="primario" value="1" checked>
        Secundario<input type="radio" name="primario" value="0">
    <?php } else {
        ?>
        <input type="hidden" name="primario" value="0">
    <?php } ?>
    <input type="submit" name="submit">
</form>

