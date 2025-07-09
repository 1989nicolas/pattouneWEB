<?php require_once("./structure/debut_doc.php");
//readfile("todolist.txt");

$fichier = fopen("todolist.txt", "r");
while (!feof($fichier)) {
    echo fgets($fichier) . "<br>";
}
fclose($fichier);
echo"<br>";
$fichier = fopen("DoneList.txt", "r");
while (!feof($fichier)) {
    echo fgets($fichier) . "<br>";
}
fclose($fichier);
echo"<br>";
require_once("./structure/fin_doc.php");
