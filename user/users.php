<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <form method="POST" target='_blank' action='actions/addUser.php'>
        Username: <input type="text" name="user">
        Password: <input type="text" name="pass">
        Email: <input type="text" name="email">
        Telefone: <input type="text" name="tlf">
        Telemovel: <input type="text" name="tlm">
        Permissao: <input type="text" name="perms">
        <input type='submit'>
    </form>
    <section id="result">teste</section>
        <?php include_once ('getUsers.php'); ?>

</html>

