<nav>
    <ul>
        <li><a onclick='showPage("content", "post_getPosts.php")'>Ver Anuncios</a></li>
        <?php
        if (isset($_SESSION['perms'])) {
            $permission = $_SESSION['perms'];
            if ($permission <= 2) {
                echo("<li><a href='post_posts.php'>Gerir Anuncios</a></li>");
                echo("<li><a href='cat_cats.php'>Gerir Categorias</a></li>");
            }
            if ($permission <= 1) {
                echo("<li><a href='user_users.php'>Gerir Utilizadores</a></li>");
                echo("<li><a onclick='showPage(\"content\", \"importform.php\")'>Importar</a></li>");
            }
        }
        ?>
    </ul>
</nav>  