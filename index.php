<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        if (!file_exists('base/conf.xml')){
            include('base/first.php');
        }
        else{
            include('index2.php');
        }
        ?>
    </body>
</html>
