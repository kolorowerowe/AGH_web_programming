<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
	<title>Dodaj post</title>

	<script type="text/javascript" src="timeAndFiles.js"></script>
</head>
<body onload="setTime()">
<?php
include 'menu.php';
echo "<hr>";
?>


	<h2>Dodaj nowy wpis do istniejącego posta</h2>
	<form method='post' action="wpis.php" enctype="multipart/form-data">
	<p>Nazwa użytkownika
	<br/>
	<input type="text" name="nazwa_uzytkownika" required  />
	<p/>
	<p>
	Podaj hasło:
	<br/>
	<input type="password" name="haslo" required />
	</p><p>
	Wpis:
	<br/>
	<textarea type="text" rows="10" cols="100" name="opis"> </textarea>
	</p><p>
	Data <br/>
	<input type="text" name="data" id="data" onchange="validateTime()" value="<?php echo date("Y-m-d"); ?>" 
required />
	</p>
	<p>
	Godzina <br/>
	<input type="text" name="hour" id="hour" onchange="validateTime()" value="<?php echo date("H:i"); 
?>"required />
	</p><p>
	Załączniki: <br/>
	<input type="file" name="file1" id="file1" onchange="addFile()"/>

	</p><p>
	<input type="submit" value="Dodaj wpis!" />
	<input type="reset" value="Wyczyść"/>
	</p>	

</form>
</body>
</html>
