<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        <?php
        session_start();
        ?>
        <header>
            <img src="icon.png" alt="icon" id='logo'>
            <section id='stuff'>
                <?php
                include_once('login.php');
                ?>
            </section>
        </header>                    
        <nav>
            <ul>
                <li><a onclick='showPage("content", "home.php")'>Home</a></li>
                <li><a onclick='showPage("content", "user_getUsers.php")'>Ver Anuncios</a></li>
                <?php
                if (isset($_SESSION['perms'])) {
                    $permission = $_SESSION['perms'];
                    if ($permission <= 2) {
                        echo("<li><a onclick = 'showPage(\"content\", \"post_posts.php\")'>Gerir Anuncios</a></li>");
                    }
                    if ($permission <= 1) {
                        echo("<li><a onclick = 'showPage(\"content\", \"user_users.php\")'>Gerir Utilizadores</a></li>");
                    }
                }
                ?>
            </ul>
        </nav>      
        <section id = 'content'>
            <?php include_once('home.php'); ?>
        </section>
    </body>
</html>