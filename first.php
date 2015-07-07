<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <meta charset="UTF-8">
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="scripts.js"></script>
        <title>imoISEL - SMI 2015</title>
    </head>
    <body>
        <?php
        
        if (isset($_POST['submit'])) {
            set_time_limit(0);
            $xml = new DOMDocument();
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $data = ["db", "host", "user", "pass"];
            $conf = $xml->createElement("conf");
            foreach ($data as $d) {
                $elem = $xml->createElement($d);
                $text = $xml->createTextNode($_POST[$d]);
                $elem->appendChild($text);
                $conf->appendChild($elem);
            }
            $xml->appendChild($conf);
            $xml->normalizeDocument();
            $xml->save('conf.xml');
            include_once 'db.php';
            start();
            header('Location: index.php');
            exit();
        }
        ?>
        <h1>Bem vindo ao imoISEL</h1>
        <h2>Crie uma base de dados no SQL e introduza aqui os dados de acesso</h2>
        <h3>A primeira conta de administrador é (admin,admin).</h3>
        <h3>Deve começar por utilizar essa para criar uma nova com os dados desejados e apagar a inicial</h3>
        <form method="post" action="">
            DB: <input type="text" name="db"><br/>
            Host: <input type="text" name="host"><br/>
            Username: <input type="text" name="user"><br/>
            Password: <input type="text" name="pass"><br/>
            <input type="submit" name="submit">
        </form>
    </body>
</html>
