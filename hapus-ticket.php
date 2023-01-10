<?php
$servername = "localhost";
$database = "u413680255_futsal";
$username = "u413680255_onedanfc";
$password = "*9sHYB#Jszh";

$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "koneksi berhasil";
$hapus="TRUNCATE table tickets";
$eksekusi= mysqli_query($conn, $hapus);
if(!$eksekusi){
    echo"tabel ticket gagal di hapus";
}else{
    echo"tabel ticket berhasil di hapus";
}
mysqli_close($conn);
?>