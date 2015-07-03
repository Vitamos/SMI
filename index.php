<html>
    <head>

    </head>
    <body>
        <?php

        if (!file_exists('conf.xml')) {
            header('Location: first.php');
            
        } else {
          header('Location: index2.php');
        }    
        ?>
    </body>
</html>
