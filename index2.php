<html>
    <head>
        
        <meta charset="UTF-8">
        <title>asdf</title>
    </head>
    <body> 
        <?php
        ?>
        <header>
            <a href="index2.php"><img src="icon.png" alt="icon" id='logo'></a>
            <section id='stuff'>
                <?php
                include_once('login.php');
                ?>
            </section>
        </header>                    
        <nav>
            <ul>
                <li><a onclick='showPage("content", "home.php")'>Home</a></li>
                <li><a onclick='showPage("content", "post_getPosts.php")'>Ver Anuncios</a></li>
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