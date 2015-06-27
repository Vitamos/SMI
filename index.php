<html>
    <head>
        <meta charset="UTF-8">
        <title>imoISEL - SMI 2015</title>
    </head>
    <body>
        
        <?php
        if (!file_exists('conf.xml')){
            include('first.php');
        }
        else{
            include('index2.php');
        }
        ?>
    </body>
</html>
