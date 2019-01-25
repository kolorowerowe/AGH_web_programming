<?php

include 'menu.php';
echo "<hr>";

$folder = $_POST['nazwa_bloga'];
$user = $_POST['nazwa_uzytkownika'];
$haslo = $_POST['haslo'];
$opis = $_POST['opis'];

if(!is_dir($folder)){
	$mkdr = mkdir($folder,0755);
	if(!mkdr){
		echo "Nie udało się stworzyć katalogu :(";
	}
	else {
		echo "Stworzono folder o nazwie ".$folder;	
		$fp = fopen("$folder/info.txt","w");
		$dane=trim($user)."\n";
		$dane.=md5(trim($haslo))."\n";
		$dane.=$opis;
	
		fputs($fp, $dane);
		fclose($fp);

		$plik2 = fopen("blog_uzytkownik.txt", "a");
       	 	fwrite($plik2, $folder . "-->" . $user . "\r\n");
        	fclose($plik2);
	}

}
else {
	echo "Folder już istnieje!"
;}


?>
