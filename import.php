<?php
include_once 'db.php';
$file = simplexml_load_file($_POST['data']);
$usercount = 0;
$postcount = 0;
foreach ($file->user as $user) {
    $query = "INSERT INTO users" . " VALUES (NULL,'" . $user->username . "','" . $user->password . "','" . $user->email . "','" . $user->telefone . "','" . $user->telemovel . "','" . $user->permissao . "');";
    echo "<br>";
    echo $query;
    if (query($query)) {
        $usercount++;
    }
}
echo "Adicionados " . $usercount . "utilizadores";
?>
<h3>Adicionar media (zip)</h3>
<form method="POST" action="importmedia.php" enctype="multipart/form-data"> 
    <?php
    foreach ($file->post as $post) {
        $query = "INSERT INTO anuncios" . " VALUES (NULL,'" . $post->titulo . "','" . $post->descricao . "','" . $post->preco .
                "','" . $post->assoalhadas . "','" . $post->concelho . "','" . $post->distrito . "','" . $post->freguesia . "','" . $post->latitude . "','" . $post->longitude . "','" . $post->autor . "');";
        if (query($query)) {
            $postcount++;
            $id = getID();
        }
        ?>
        <input type="hidden" name="posts" value="<?php echo $id; ?>">
        <?php
        foreach ($file->post->categorias->cat as $cat) {
            $query = "INSERT INTO anuncios_categorias VALUES ('" . $id . "','" . $cat . "');";
            query($query);
        }

        echo $post->titulo;
        ?> <input type="file" name="files[]"></br> 
        <?php
    }
    ?>
    <input type="hidden" name="postcount" value="<?php echo $postcount; ?>">
    <input type="submit" name="submit">
</form>