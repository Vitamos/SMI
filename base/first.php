<html>
    <body>
     <?php
     if (isset($_POST['db'])){
        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;
        $data = ["db","host","port","user","pass"];
        $conf = $xml->createElement("conf");
        foreach($data as $d){
            $elem = $xml->createElement($d);
            $text = $xml->createTextNode($_POST[$d]);
            $elem->appendChild($text);
            $conf->appendChild($elem);          
        }
        $xml->appendChild($conf);
        $xml->normalizeDocument();
        $xml->save('base/conf.xml');
        header('Location: index.php');
        exit();
    }
        ?>
        <h1>Bem vindo ao CMS</h1>
        <h2>Crie uma base de dados no SQL e introduza aqui os dados de acesso</h2>
        <form method="post" action="">
            DB: <input type="text" name="db"><br/>
            Host: <input type="text" name="host"><br/>
            Port: <input type="text" name="port"><br/>
            Username: <input type="text" name="user"><br/>
            Password: <input type="text" name="pass"><br/>
            <input type="submit">
        </form>
    </body>
</html>

