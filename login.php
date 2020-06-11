<?php
 session_start();
     
    if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');
        exit();
    }
require_once "connect.php";
//otwieramy połącznie z bazą danych
$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
//sprawdzamy czy jest polaczeie
if($polaczenie->connect_errno!=0){
echo "Blad polaczenia";
}
else{
	//udalo sie polaczyc, sprawdzamy czy podane dane sa w bazie
	$login=$_POST['login'];
$haslo=$_POST['haslo'];

//tutaj jeszcze sprawdzalam czy faktycznie sie polaczy
//echo "ok";
$sql="SELECT * FROM users WHERE Login='$login' AND password='$haslo'"; 
if($wynik=$polaczenie->query($sql))
{
	$ilosc=$wynik->num_rows; //sprawdzamy ile wyników pasuje do podanego hasła i loginu
	//jeśli jakiś pasuje, to udało się zalogować
	if($ilosc>0){
		 $_SESSION['zalogowany'] = true;
                 
                $wiersz = $wynik->fetch_assoc();
                $_SESSION['Login'] = $wiersz['Login'];
                $_SESSION['password'] = $wiersz['password'];
                $_SESSION['rank'] = $wiersz['rank'];
               
                 
                unset($_SESSION['blad']);
                $wynik->free_result();
		header('Location: main.php');
	}
	else{
		//echo "Blad";
		header('Location: index.php');
	}
}
$polaczenie->close(); //zamykamy polaczenie
}

//tutaj sprawdzałam czy faktycznie dane wpisane przez użytkownika są dobrze wpisane powyżej w metodzie 
//echo $login."<br/>";
//echo $haslo."<br/>";


?>