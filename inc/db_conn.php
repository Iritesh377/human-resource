<?php
session_start();
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "human_resource";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
