<?php

$dbhost="localhost";
$dbname="adminduk_3304082012";
$dbuser="adminduk_rejasa";
$dbpass="rejasa_3304082012";
/*
CREATE DATABASE adminduk_3304082012;
GRANT ALL ON adminduk_3304082012.* TO adminduk_rejasa@localhost IDENTIFIED BY 'rejasa_3304082012' WITH GRANT OPTION;
FLUSH PRIVILEGES;
*/


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
