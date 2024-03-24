<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['UserId'])) {
    echo "<script>alert('Anda belum login. Silakan login terlebih dahulu.'); window.location = '../masuk.php';</script>";
    exit;
}

if(isset($_POST['kirimkomentar'])){
$FotoId = $_POST['FotoId'];
$UserId = $_SESSION['UserId'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO gallery_komentarfoto VALUES('', '$FotoId', '$UserId', '$isikomentar', '$tanggalkomentar')");

if($query){
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit; 
} else {
    echo "Terjadi kesalahan dalam memproses komentar.";
}
}

if(isset($_POST['hapuskomentar'])){
    // Memeriksa apakah pengguna sudah login
    if(isset($_SESSION['UserId'])){ // Gantilah 'user_id' dengan nama variabel sesuai kebutuhan Anda
        $KomentarId = $_POST['KomentarId'];
        $UserId = $_SESSION['UserId']; // Ambil ID pengguna dari sesi

        // Validasi apakah pengguna yang mencoba menghapus komentar adalah pemilik komentar
        $query = mysqli_query($koneksi, "SELECT * FROM gallery_komentarfoto WHERE KomentarId='$KomentarId' AND UserId='$UserId'");
        if(mysqli_num_rows($query) > 0){ // Jika ada baris yang cocok, izinkan penghapusan
            $sql = mysqli_query($koneksi, "DELETE FROM gallery_komentarfoto WHERE KomentarId='$KomentarId'");
            if($sql){
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit; 
            } else {
                echo "<script>
                alert ('Terjadi kesalahan saat menghapus data!');
                window.location.href = document.referrer;
                </script>";
            }
        } else {
            echo "<script>
            alert ('Anda tidak memiliki izin untuk menghapus komentar ini!');
            window.location.href = document.referrer;
            </script>";
        }
    } else {
        // Jika pengguna belum login, arahkan mereka ke halaman login
        header("Location: ../masuk.php"); // Gantilah 'login.php' dengan halaman login Anda
        exit;
    }
}
?>