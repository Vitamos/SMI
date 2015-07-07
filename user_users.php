<?php
session_start();
include_once('db.php');
?>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
        <title>imoISEL - SMI 2015</title>
    </head>
    <body> 
        <header>
            <a href="index2.php"><img src="icon.png" alt="icon" id='logo'></a>
            <section id='stuff'>
                <?php
                include('login.php');
                ?>
            </section>
        </header>                    
        <?php
        include_once('menu.php');
        if (isset($_POST['delete'])) {
            $delInts = "DELETE FROM users_interesses WHERE userID=" . $_POST['id'];
            query($delInts);
            $delquery = "DELETE FROM users WHERE idUser =" . $_POST['id'];
            query($delquery);
            ?> 
            <script>
                alert("Removido com sucesso!");
            </script> <?php }
        ?>
        <section id = 'content'>
            <h1>Utilizadores</h1>
            <hr>
            <button onclick='window.open("user_register.php", "", "width=640, height=480")' >   <h3>  Adicionar Utilizador</h3></button>
            <section id="result">
                <?php include_once ('user_getUsers.php'); ?>
            </section>
        </section>
    </body>
</html>