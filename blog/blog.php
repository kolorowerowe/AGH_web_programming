
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
        <title> BLOG </title>

</head>
<body>



<?php
//wyswietlenie menu
include 'menu.php';
echo "<hr>";
?>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="shoutboxScript.js"></script>
<form id="form1" method="post">
    <input type="checkbox" id="checkbox" checked onclick=toggleShoutbox()>
    <label>Aktywuj shoutboxa</label>
<div id="toClose">
    <br/>
    <textarea id="area" cols=60 rows=8 readonly>Pobieranie zawartosci</textarea>
    <br/>
    Imie:
    <br/>
    <input type="text" id="name" name="name" >
    <br/>
    Wiadomosc:
    <br/>
    <input type="text" id="message" name="message">
    <br/>
    <input type="submit" id="submit" name="sumbit" value="wyslij" onclick=sendMessage()>
</div>
</form>

<?php
echo "<hr>";
if (isset($_GET["nazwa"])) {
   $bname = $_GET{"nazwa"};
    $dir = opendir($bname);

    if ($dir) {
	echo "<h2>".$bname."</h2><br>"; 
	$filesList = scandir($bname);
        for ($i = 2; $i < sizeof($filesList); $i++) { //start petli
            $fileBaseName = explode(".", $filesList[$i])[0];
            $fileExtension = explode(".", $filesList[$i])[1];
            //jesli dlugosc to 16 znakow i jest plikiem (nie folderem)
            if (strlen($fileBaseName) == 16 && is_file($bname . "/" . $filesList[$i])) {
                //wyswietlenie wpisu
                $currentFile = fopen($bname . "/" . $filesList[$i], "r");
                if ($currentFile != false) {
		    echo "<hr>";
		    echo "Data: " . fgets($currentFile) . "<br>";
                    echo "Godzina: " . fgets($currentFile) . "<br>";
                    echo "Wpis: <strong>" . fgets($currentFile) . "</strong><br>";

  		    for ($k = 0; $k < 3; $k++) {
                          for ($j = 2; $j < sizeof($filesList); $j++) {
                              $attachmentBaseName = explode(".", $filesList[$j])[0];
                              $attachmentExtension = explode(".", $filesList[$j])[1];
                              if (strcmp($attachmentBaseName, $fileBaseName . $k) == 0) {
                                  echo '<a href="' . $bname . "/" . $filesList[$j] . '">Plik ' . ($k) . '</a>';
                                  echo "<br>";
                              }
                          }
                      }

                      echo "<br>";
		      
		      // lista komentarzy
                    echo "KOMENTARZE:<br>";
                    $commentList = @scandir($bname . "/" . $fileBaseName . ".k");
                    if ($commentList != false) {
                        $listSize = sizeof($commentList) - 2;
                        //echo "<br>".$listSize;
                        for ($l = 0; $l < $listSize; $l++) {
                            $commentFile = fopen($bname . "/" . $fileBaseName . ".k/" . $l . ".txt", "r");
                            echo fgets($commentFile) . "<br>";
                            echo fgets($commentFile) . "<br>";
                            echo fgets($commentFile) . "<br>";
                            echo fgets($commentFile) . "<br><br>";
 
                       }
                    }
                    else {
                        echo "Nie ma jeszcze zadnych komentarzy :( <br><br>";
                    }
                    // form dodawania komentarza
                    echo "Dodaj nowy komentarz:<br>";
                    echo '<form action="koment.php" method="post">
                            Rodzaj komentarza: <br><select name="choice">
                                <option>Pozytywny</option>
                                <option>Neutralny</option>
                                <option>Negatywny</option>
                            </select><br>
                            <textarea name="comment"></textarea><br>
                            Kto: <br><input type="text" name="signature">
                            <!--niewidoczne pola z dodatkowymi danymi-->
                            <input type="text" value="' . $bname . '" name="nazwa" hidden="hidden">
                            <input type="text" value="' . $fileBaseName . '" name="wpis" hidden="hidden">
                            <input type="submit" value="Skomentuj">
                            <input type="reset" value="Reset">
                        </form>';
		
		}
		else {
	            echo "Nie dodano jeszcze wpisu do bloga!"; 
		}

	    }
	}//koniec petli for

    }
    else {
	echo "Nie ma katalogu o danej nazwie";
    }

}
else {
    echo "Nie podano nazwy, wybierz jedna z opcji powyzej :)";
}

?>

</body>
</html>
