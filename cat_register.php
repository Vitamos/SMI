<?php
include_once 'db.php';
if (isset($_POST['submit'])) {
    query("INSERT INTO categorias VALUES(NULL, '" . $_POST['nome'] . "','" . $_POST['primario'] . "');");
}
?>
<form action="" method="POST">
    Nome <input type="text" name="nome"></br>
    <?php
    session_start();
    if ($_SESSION['perms'] == 1) {
        ?>
        Primario<input type="radio" name="primario" value="1">
        Secundario<input type="radio" name="primario" value="0">
    <?php } ?>
    <input type="submit" name="submit">
</form>

