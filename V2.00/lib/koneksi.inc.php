<?php
/*
$dbhost="localhost";
$dbname="banjar01_adminduk";
$dbuser="banjar01_zinga";
$dbpass="merta123";
try
{ 
$conn = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

catch(PDOException $pe)
{
die('Maaf, gangguan koneksi: ' .$pe->getMessage());
}
*/
$dbhost="localhost";
$dbname="singamerta";
$dbuser="zinga";
$dbpass="merta";

try
{ 
$conn = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

catch(PDOException $pe)
{
die('Maaf, gangguan koneksi: ' .$pe->getMessage());
}
 
?>
