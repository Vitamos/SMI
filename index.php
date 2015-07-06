<html>
    <head>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <?php
        if (!file_exists('conf.xml')) {
            header('Location: first.php');
        } else {
            header('Location: index2.php');
        }
        exit;
        ?>
    </body>
</html>
