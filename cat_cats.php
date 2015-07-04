<?php
session_start();
include_once('db.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
        <title>imoISEL - SMI 2015</title>
    </head>
    <body> 
        <header>
            <a><img src="icon.png" alt="icon" id='logo'></a>
            <section id='stuff'>
                <?php
                    include('login.php');
                ?>
            </section>
        </header>                    
        <?php
        include_once('menu.php');
        if (isset($_POST['delete'])) {
            $delquery = "DELETE FROM categorias WHERE idCat =" . $_POST['id'];
            query($delquery);
            ?> 
            <script>
                alert("Removido com sucesso!");
            </script> <?php }
        ?>
        <section id = 'content'>
            <h1>Categorias</h1>
            <hr>
            <button onclick='window.open("cat_register.php", "", "width=640", "height=480")' >   <h3>  Adicionar Utilizador</h3></button>
            <hr>
            <h3>asdf</h3>
            <hr>
            <section id="result">
                <?php include_once ('cat_getCats.php'); ?>
            </section>
        </section>
    </body>
</html>