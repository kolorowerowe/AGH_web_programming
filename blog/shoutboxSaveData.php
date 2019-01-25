<?php
$message=$_POST["name"].": ".$_POST["message"]."\n";
$linecount = 0;
$file = fopen("shoutbox", "r");
while(!feof($file)){
    $line = fgets($file);
    $linecount++;
}
fclose($file);
if ($linecount>10){
	shell_exec("sed -i '1d' shoutbox");
}
$file=fopen("shoutbox","a");
fwrite($file,$message);
fclose($file);
