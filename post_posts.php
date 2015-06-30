<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <h1>Anuncios</h1>
    <hr>
    <button onclick='window.open("post_registerPost.php", "", "width=640", "height=480")' >   <h3>  Adicionar Anuncio</h3></button>
    <hr>
    <h3>Pesquisar Anuncio</h3>
    <hr>
    <h3>Ver Anuncios</h3>

    <section id="result"> <?php include_once ('post_getPosts.php'); ?></section>
</html>