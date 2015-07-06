<?php
include_once 'db.php';
$idD = $_GET['idD'];
$idC = $_GET['idC'];

$freguesias = query("SELECT * from freguesias WHERE idDistrito=" . $idD . " AND idConcelho=" . $idC);
echo " <option selected=\"selected\" disabled=\"disabled\">Seleccionar</option>";
while ($row = $freguesias->fetch_assoc()) {
    echo "<option value=\"" . $row['idF'] . "\">" . $row['nome'] . "</option>";
}
