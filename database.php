<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "pareanom";

$connect = new mysqli($hostname, $username, $password, $database);

if ($connect->connect_error) {
    die('Maaf koneksi gagal: ' . $connect->connect_error);
}

//! Mengubah format tanggal
function formatTanggal($date) 
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d-m-Y');
}