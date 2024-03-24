<?php
session_start();
include 'koneksi.php';

if(isset($_POST['edit'])){
    $UserId = $_POST['UserId'];
    $namapengguna = $_POST['namapengguna'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "UPDATE gallery_user SET Username='$namapengguna', Email='$email', NamaLengkap='$namalengkap', Alamat='$alamat' WHERE UserId='$UserId' ");

    echo "<script>
    alert ('Data berhasil diperbarui!');
    location.href='../profil_user.php';
    </script>";
}


?>