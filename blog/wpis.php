<?php

include 'menu.php';
echo "<hr>";


$uzytk = false;
$plik = fopen("blog_uzytkownik.txt", "r");
    while (!feof($plik)) {
        $fileLine = fgets($plik);
        $fileLine = rtrim($fileLine, "\r\n"); // usuniecie spacji
   	
        $uname = explode("-->", $fileLine)[1]; //wyciecie nazwy uzytkownika

       if ($uname == $_POST["nazwa_uzytkownika"]) {
	
            $bname = explode("-->", $fileLine)[0]; //wyciecie nazwy blogu
            $info = fopen($bname . "/info.txt", "r");
		fgets($info);
            $jakiesHaslo = fgets($info);

            $jakiesHaslo = rtrim($jakiesHaslo, "\r\n");
           if ($jakiesHaslo == md5($_POST["haslo"])) {
		echo "Zalogowano :) <br/>";
               	$uzytk = true;
		 $RRRRMMDD = explode("-", $_POST["data"]);
                $GGmm = explode(":", $_POST["hour"]);

                $SS = date('s');
                $fileDateHour = $RRRRMMDD[0] . $RRRRMMDD[1] . $RRRRMMDD[2] . $GGmm[0] . $GGmm[1] . $SS;

                $i = 0;
                while (file_exists($fileDateHour . $i . "txt")) {
                    $i++;
                }
                if ($i < 10) {
                    $i = "0" . $i;
                }

                $RRRRMMDDGGmmSSUU = fopen($bname . "/" . $fileDateHour . $i . ".txt", "w");
                fwrite($RRRRMMDDGGmmSSUU, $_POST["data"] . "\r\n" . $_POST["hour"] . "\r\n" . $_POST["opis"]);
                fclose($RRRRMMDDGGmmSSUU);
                
		//echo "PLIKOW: ".sizeof($_FILES)."<br/>";
                for ($j = 0; $j < sizeof($_FILES); $j++) {
                    if (isset($_FILES["file" . ($j + 1)]["name"])) {
			$uploaddir = $bname;
                        $fileName = $_FILES["file" . ($j + 1)]["name"];
                        $extension = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
                        $uploadfile = $uploaddir . "/" . $fileDateHour . $i . ($j+1) . "." . $extension;
//                                echo "<br/>DH: ".$uploadfile."<br/>";

	
                        move_uploaded_file($_FILES["file" . ($j + 1)]["tmp_name"], $uploadfile);
                    }
			else {
				echo "NIE MA PLIKU";
			}
                }

		echo "Dodano wpis :) <br/>";
            } else {
                echo "Zle haslo <br/>";
            }
            break;
        }
    }
    fclose($plik);
if(!$uzytk){
	echo "Nie znaleziono użytkownika";
}
?>
