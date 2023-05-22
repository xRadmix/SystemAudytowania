<?php
#PODAJEMY DANE DO WYKONANIA POŁĄCZENIA Z BAZĄ DANYCH
$dbservername = "phpmyadmin54.lh.pl";
$dbusername = "serwer77840_wsb";
$dbpassword = "wsb123";
$dbname = "serwer77840_wsb";

#NAWIAZUJEMY POŁĄCZENIA
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

#SPRAWDZAMY CZY POŁĄCZENIE ZOSTAŁO NAWIĄZANE
if(!$conn){
    die("Połączenie nieudane".mysqli_connect_error());
}
?>