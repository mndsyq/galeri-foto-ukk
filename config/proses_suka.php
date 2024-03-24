<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['UserId'])) {
    echo "<script>alert('Anda belum login. Silakan login terlebih dahulu.'); window.location = '../masuk.php';</script>";
    exit; 
}

$FotoId = $_GET['FotoId'];
$UserId = $_SESSION['UserId'];

$ceksuka = mysqli_query($koneksi, "SELECT * FROM gallery_likefoto WHERE FotoId='$FotoId' AND UserId ='$UserId' ");

if(mysqli_num_rows($ceksuka) == 1){
    while ($row = mysqli_fetch_array($ceksuka)){
        $LikeId = $row['LikeId'];
        $query = mysqli_query($koneksi, "DELETE FROM gallery_likefoto WHERE LikeId='$LikeId' ");
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }
}else{
    $tanggallike = date('Y-m-d');
    $query = mysqli_query($koneksi, "INSERT INTO gallery_likefoto VALUES('', '$FotoId', '$UserId', '$tanggallike') ");
    
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

?>