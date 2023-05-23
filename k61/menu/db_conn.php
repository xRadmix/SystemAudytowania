<?php
#PODAJEMY DANE DO WYKONANIA POŁĄCZENIA Z BAZĄ DANYCH
$dbservername = "phpmyadmin54.lh.pl";
$dbusername = "serwer77843_wsbk61";
$dbpassword = "Serwer77840_wsb";
$dbname = "serwer77843_wsbk61";

#NAWIAZUJEMY POŁĄCZENIA
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

#SPRAWDZAMY CZY POŁĄCZENIE ZOSTAŁO NAWIĄZANE
if(!$conn){
    die("Połączenie nieudane".mysqli_connect_error());
}
?>