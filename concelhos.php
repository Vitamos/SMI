<?php
include_once 'db.php';
$idD = $_GET['idD'];

$concelhos = query("SELECT * from concelhos WHERE idDistrito=" . $idD);
echo " <option selected=\"selected\" disabled=\"disabled\">Seleccionar</option>";
while ($row = $concelhos->fetch_assoc()) {
    echo "<option value=\"" . $row['idC'] . "\">" . $row['nome'] . "</option>";
}
