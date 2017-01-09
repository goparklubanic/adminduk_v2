<?php
require_once "../lib/aparatur.class.inc.php";
$apr = new aparatur();
$aprdata = $apr->deleng($_GET['id']);
echo '{"aparatur":'. json_encode($aprdata) .'}'; 
?>
