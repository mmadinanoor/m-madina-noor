<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "tokoikanmadina";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

?>