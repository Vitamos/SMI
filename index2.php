<?php session_start();
include_once('db.php'); ?>
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
            <a href=""><img src="icon.png" alt="icon" id='logo'></a>
            <section id='stuff'>
                <?php
                    include('login.php');
                ?>
            </section>
        </header>                    
        <?php include('menu.php'); ?>
        <section id = 'content'>
            <h1>Bem vindo ao imoISEL</h1>
            <h3>Encontre aqui a sua casa de sonho e o 20 no trabalho de SMI! </h3>
        </section>
    </body>
</html>