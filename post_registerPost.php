<form method="POST" target='_blank' action='user_addUser.php' onsubmit='showPage("result", "user_getUsers.php");
        self.close();'>
    Titulo: <input type="text" name="user"><br/>
    Descricao: <input type="text" name="pass"><br/>
    Preço: <input type="text" name="email"><br/>
    Assoalhadas: <input type="text" name="tlf"><br/>
    Concelho: <input type="text" name="tlm"><br/>
    Distrito: <input type="text" name="tlm"><br/>
    Freguesia: <input type="text" name="tlm"><br/>
    Latitude: <input type="text" name="tlm"><br/>
    Longitude: <input type="text" name="tlm"><br/>
    <?php
    session_start();
    
    ?>
    <input type='submit'>
</form> 