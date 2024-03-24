<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $namaalbum = $_POST['namaalbum'];
    $deskripsialbum = $_POST['deskripsialbum'];
    $tanggal = date('Y-m-d');
    $UserId = $_SESSION['UserId'];

    $sql = mysqli_query($koneksi, "INSERT INTO gallery_album VALUES ('', '$namaalbum', '$deskripsialbum', '$tanggal', '$UserId')");

    echo "<script>
    location.href='../album.php';
    </script>";
}


if(isset($_POST['edit'])){
    $AlbumId = $_POST['AlbumId'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsialbum = $_POST['deskripsialbum'];
    $tanggal = date('Y-m-d');
    $UserId = $_SESSION['UserId'];

    $sql = mysqli_query($koneksi, "UPDATE gallery_album SET NamaAlbum='$namaalbum', Deskripsi='$deskripsialbum', TanggalDibuat='$tanggal' WHERE AlbumId='$AlbumId' ");

    echo "<script>
    location.href='../album.php';
    </script>";
}

if(isset($_POST['hapus'])){
    $AlbumId = $_POST['AlbumId'];

    $sql = mysqli_query($koneksi, "DELETE FROM gallery_album WHERE AlbumId='$AlbumId'");

    if($sql){
        echo "<script>
        alert ('Data berhasil dihapus!');
        location.href='../album.php';
        </script>";
    } else {
        echo "<script>
        alert ('Terjadi kesalahan saat menghapus data! Pastikan untuk menghapus semua foto yang terkait sebelum menghapus album.');
        location.href='../album.php';
        </script>";
    }
}

?>