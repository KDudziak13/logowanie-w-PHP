<?php
 
    session_start();
     
   
 
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
</head>
 
<body>
<!--  login = zaloguj u Zelenta-->
   <form action="login.php" method="post">
   login: <br/> <input type="text" name="login"/><br/>
   haslo: <br/> <input type="password" name="haslo"/><br/>
   <input type="submit" value="Zaloguj sie"/>
</form>   
 
</body>
</html>

