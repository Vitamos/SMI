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
            <a href="index2.php"><img src="icon.png" alt="icon" id='logo'></a>
            <section id='stuff'>
                <?php
                session_start();
                include_once('db.php');
                include('login.php');
                ?>
            </section>
        </header>                    
        <?php include('menu.php'); ?>
        <section id = 'content'>
            <h1>Anuncios</h1>
            <hr>
            <button onclick='window.open("post_registerPost.php", "", "width=640", "height=480")' >   <h3>  Adicionar Anuncio</h3></button>
            <hr>
            <h3>Pesquisar Anuncio</h3>
            <hr>
            <section id="result"> 
                <?php include_once ('post_getPosts.php'); ?>
            </section>
        </section>
    </body>
</html>