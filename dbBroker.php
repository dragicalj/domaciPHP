<?php
$host = "localhost";
$db = "domaciphp";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db, 3307);


if ($conn->connect_errno){
    exit("Nauspesna konekcija: greska> ".$conn->connect_error.", err kod>".$conn->connect_errno);
}

?>