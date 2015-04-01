<?php
session_start();
require("functions_giohang.php");

$func = $_POST["func"];
$pid = $_POST["id"];
$q = $_POST["qty"];
addtocart($pid,$q);

?>