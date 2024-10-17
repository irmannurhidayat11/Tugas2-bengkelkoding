<?php
$host = 'localhost'; 
$user = 'root';      
$password = '';      
$database = 'todo_list';  

// Membuat koneksi ke MySQL
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
