<html>
    <head>
        <link rel="stylesheet" type="text/css" href="base/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="actions/scripts.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        <?php
        session_start();
        ?>
        <script>

        </script>
        <header>
            <img src="icon.png" alt="icon" id='logo'>
            <section id='stuff'>
                <?php
                include_once('menus/login.php');
                ?>
            </section>
        </header>
        <nav>
            <ul>
                <li><a onclick='showPage("content", "dois.php")'>Home</a></li>
                <li><a onclick='showPage("content", "dois.php")'>Ver Anuncios</a></li>
                <?php
                if (isset($_SESSION['perms'])) {
                    $permission = $_SESSION['perms'];
                    if ($permission <= 1) {
                        echo("<li><a onclick = 'showPage('content', 'dois.php')'>Gerir Anuncios</a></li>");
                    }
                    if ($permission == 0) {
                        echo("<li><a onclick = 'showPage('content'', 'menus/users.php'')'>Gerir Utilizadores</a></li>");
                    }
                }
                ?>
            </ul>
        </nav>
        <section id = 'content'>
            asdfasdfasdfasdfasdfasdfsadfasdf
        </section>
 
    </body>
</html>