<html>
    <head>
        <link rel="stylesheet" type="text/css" href="base/style2.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script>
        function showPage(page) {
            if (page === "") {
                document.getElementById("content").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        document.getElementById("content").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET",page+'.php',true);
                xmlhttp.send();
            }
        }
        </script>
        <header>
            <img src="icon.png" alt="icon" id='logo'>
            <section id='head'>header</section>
        </header>
        <nav>
            <ul>
                <li><a onclick='showPage("um")'>um</a></li>
                <li><a onclick='showPage("dois")'>dois</a></li>
                <li><a onclick='showPage("")'>tres</a></li>
            </ul>
        </nav>
        <section id='content'>
            conteudo
        </section>
        <footer>
            footer
        </footer>        
    </body>
</html>