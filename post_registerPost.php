<form method="POST" target='_blank' action='post_addPost.php' onsubmit='showPage("result", "post_getPosts.php")'';
        self.close();'>
    Titulo: <input type="text" name="titulo"><br/>
    Descricao: <input type="text" name="descricao"><br/>
    Preço: <input type="text" name="preco"><br/>
    Assoalhadas: <input type="text" name="assoalhadas"><br/>
    Concelho: <input type="text" name="concelho"><br/>
    Distrito: <input type="text" name="distrito"><br/>
    Freguesia: <input type="text" name="freguesia"><br/>
    Latitude: <input type="text" name="latitude"><br/>
    Longitude: <input type="text" name="longitude"><br/>
    <?php
    session_start();
    include_once("db.php");
    $result = query("SELECT * from categorias");
    echo "Categorias: ";
    while ($row = $result->fetch_assoc()) {
        echo "<input type=\"checkbox\" name=\"cats[]\" value='" . $row['idCat'] . "'/>" . $row['nome'];
    }
    ?>
    <input type='submit'>
</form> 