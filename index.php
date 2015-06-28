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

        <?php
        
        if (!file_exists('conf.xml')) {
            include('first.php');
        } else {
            include('index2.php');
        }
        ?>
    </body>
</html>
