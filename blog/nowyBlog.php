
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
        <title>Nowy Blog</title>
</head>


<body>
<?php
include 'menu.php';
echo "<hr>";
?>

<h2>Stworzenie nowego blogu </h2>
<form action="nowy.php" method="post">
	<p>Nazwa blogu <br/>
	<input type="text" name = "nazwa_bloga" required </p>
        
	<p>Nazwa użytkownika </br>
	<input type="text" name = "nazwa_uzytkownika" required ></p>
        
	<p>Hasło użytkownika<br/>
	<input type="password" name = "haslo" required ></p>
	<p>Opis blogu<br/>
	<textarea name="opis" cols="40" rows="5"></textarea></p>
	
	<p>
	<input type="submit" value="Załóż nowy blog!">
	<input type="reset" value="Wyczyść"></p>
</form>
</body>
</html>
